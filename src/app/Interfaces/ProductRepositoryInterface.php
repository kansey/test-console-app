<?php
/**
 * Interface FileParserInterface
 */
interface ProductRepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function findByCategoryId(int $id): array;
}