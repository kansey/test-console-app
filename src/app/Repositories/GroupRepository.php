<?php

require 'src/app/Repositories/Repository.php';
require 'src/app/Interfaces/RepositoryInterface.php';
require 'src/app/Entities/Group.php';
require 'src/app/Interfaces/GroupRepositoryInterface.php';

/**
 * Class GroupRepository
 */
class GroupRepository extends Repository implements RepositoryInterface, GroupRepositoryInterface
{
    /**
     * @param array $data
     */
    public function load(array $data): void
    {
        array_map($this->fill(), $data);
    }

    /**
     * @return callable
     */
    protected function fill(): callable
    {
        return function ($item) {
            $entity = new Group($item);
            if ($entity->validate()) {
                array_push($this->collection, $entity);
            }
        };
    }

    /**
     * @param int $id
     * @return array
     */
    public function findByParentId(int $id = 0): array
    {
        return array_filter($this->collection, function (Group $entity) use ($id) {
            return $id === $entity->parentId;
        });
    }
}