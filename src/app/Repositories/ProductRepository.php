<?php

require 'src/app/Entities/Product.php';
require 'src/app/Interfaces/ProductRepositoryInterface.php';

/**
 * Class ProductRepository
 */
class ProductRepository extends Repository implements RepositoryInterface, ProductRepositoryInterface
{
    /**
     * @param array $data
     */
    public function load(array $data): void
    {
        array_map($this->fill(), $data);
    }

    /**
     * @param int $id
     * @return array
     */
    public function findByCategoryId(int $id): array
    {
        return array_filter($this->collection, function (Product $entity) use ($id) {
            return $entity->categoryId === $id;
        });
    }

    /**
     * @return callable
     */
    protected function fill(): callable
    {
        return function ($item) {
            $entity = new Product($item);
            if ($entity->validate()) {
                array_push($this->collection, $entity);
            }
        };
    }
}