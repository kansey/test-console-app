<?php

/**
 * Interface GroupRepositoryInterface
 */
interface GroupRepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function findByParentId(int $id = 0): array;
}