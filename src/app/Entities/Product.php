<?php

/**
 * Class Product
 */
class Product extends Entity
{
    /**
     * @var int $id
     */
    public $id;
    /**
     * @var int $categoryId
     */
    public $categoryId;
    /**
     * @var mixed $name
     */
    public $name;
    /**
     * @var float $price
     */
    public $price;

    /**
     * Product constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = intval($data[0] ?? null);
        $this->categoryId = intval($data[1] ?? null);
        $this->name = $data[2] ?? null;
        $this->price = floatval($data[3] ?? null);
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        return !empty($this->id) && !empty($this->name) ? true : false;
    }
}