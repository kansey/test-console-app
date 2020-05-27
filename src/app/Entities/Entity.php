<?php

/**
 * Class Entity
 * @package App\Enitities
 */
abstract class Entity
{
    /**
     * @return bool
     */
    abstract public function validate(): bool;
}