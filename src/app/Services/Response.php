<?php


/**
 * Class Response
 */
class Response
{
    /**
     * @var GroupRepositoryInterface
     */
    protected $groupRepository;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * Response constructor.
     * @param GroupRepositoryInterface $groupRepository
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        GroupRepositoryInterface $groupRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->groupRepository = $groupRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        $response = [];
        $parents = $this->groupRepository->findByParentId();

        if (empty($parents)) {
            return  $parents;
        }

        return $response;
    }

}