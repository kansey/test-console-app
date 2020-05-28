<?php

require 'src/app/Entities/Entity.php';

/**
 * Class Group
 * Сущность Группы
 */
class Group extends Entity
{
    /**
     * @var int $id
     */
    public $id;

    /**
     * @var mixed $name
     */
    public $name;

    /**
     * @var int $parentId
     */
    public $parentId;

    /**
     * @var mixed $formatProduct
     */
    public $formatProduct;

    /**
     * @var bool $inheritance
     */
    public $inheritance;

    /**
     * Group constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = intval($data[0] ?? null);
        $this->name = $data[1] ?? null;
        $this->parentId = intval( $data[2] ?? null);
        $this->formatProduct = $data[3] ?? null;
        $this->inheritance = boolval($data[4] ?? null);
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        return !empty($this->id) && !empty($this->name) ? true : false;
    }
}