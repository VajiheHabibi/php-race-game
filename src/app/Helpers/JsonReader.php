<?php

namespace App\Helpers;

class JsonReader
{
    /**
     * Read JSON data from a file and decode it into an associative array.
     *
     * @param string $filename The path to the JSON file.
     *
     * @return array|null The decoded JSON data as an associative array, or null on failure.
     */
    public function readJsonFile(string $filename): ?array
    {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException("File not found: $filename");
        }

        $jsonData = file_get_contents($filename);

        if ($jsonData === false) {
            throw new \RuntimeException("Failed to read JSON file: $filename");
        }

        $decodedData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Failed to decode JSON: " . json_last_error_msg());
        }

        return $decodedData;
    }
}