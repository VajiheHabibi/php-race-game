<?php

use App\Helpers\JsonReader;

require __DIR__ . '/../vendor/autoload.php';

try {
    $jsonReader = new JsonReader();
    $vehicles = $jsonReader->readJsonFile(__DIR__ . '/../data/vehicles.json');
        var_dump($vehicles);
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}