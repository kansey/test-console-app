<?php

require 'src/app/Interfaces/FileParserInterface.php';

/**
 * Class FileParser
 * @package App\Services
 */
class FileParser implements FileParserInterface
{
    /**
     * @param string $csv
     * @param int $row
     * @return array
     */
    public function readFile(string $csv, int $row = 0): array
    {
        $import = [];

        if (file_exists($csv)) {
            if (($handle = fopen($csv, 'r')) !== false) {
                while (($data = fgetcsv($handle, 1000, ";")) !== false) {
                    if ($row) {
                        $data = array_map('trim', $data);
                        $import[] = $data;
                    }
                    $row++;
                }

                fclose($handle);
            }
        }

        return $import;
    }
}