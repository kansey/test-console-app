<?php

/**
 * Interface FileParserInterface
 */
interface RepositoryInterface
{
    /**
     * @param array $data
     */
    public function load(array $data): void;
}