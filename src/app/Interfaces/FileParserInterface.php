<?php

/**
 * Interface FileParserInterface
 */
interface FileParserInterface
{
    /**
     * @param string $csv
     * @param int $row
     * @return array
     */
    public function readFile(string $csv, int $row = 0): array;
}