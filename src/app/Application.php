<?php

require 'src/app/Services/FileParser.php';
require 'src/app/Exceptions/NotFoundFileException.php';
require 'src/app/Repositories/GroupRepository.php';
require 'src/app/Repositories/ProductRepository.php';
require 'src/app/Services/Response.php';

/**
 * Class Application
 * @package App
 */
class Application
{
    /**
     * @var FileParser
     */
    protected $parser;

    /**
     * @var GroupRepository
     */
    protected $groupRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->parser = new FileParser();
        $this->groupRepository = new GroupRepository();
        $this->productRepository = new ProductRepository();
    }

    /**
     * @throws NotFoundFileException
     */
    public function run()
    {
        $dataGroups = $this->parser->readFile('group.csv');

        if (count($dataGroups) < 1) {
            throw new NotFoundFileException('Not found csv file for groups');
        }

        $dataProducts = $this->parser->readFile('products.csv');

        if (count($dataProducts) < 1) {
            throw new NotFoundFileException('Not found csv file for products');
        }

        $this->groupRepository->load($dataGroups);
        $this->productRepository->load($dataProducts);

        $this->sendResponse();
    }

    /**
     * Печать сгенерированной html-структуры
     */
    protected function sendResponse()
    {
        $response = new Response;
        $response($this->groupRepository, $this->productRepository);
    }
}

