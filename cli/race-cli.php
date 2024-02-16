<?php

require __DIR__ . '/../vendor/autoload.php';
use App\Helpers\JsonReader;

//try {
    $jsonReader = new JsonReader();
    $vehicles = $jsonReader->readJsonFile(__DIR__ . '/../data/vehicles.json');



    // Display the list of vehicles
    $table = new cli\Table;
    $table->setHeaders(['Index', 'Vehicle Name', 'Max Speed', 'Unit']);

    foreach ($vehicles as $index => $vehicle) {
        $table->addRow([$index, $vehicle['name'], $vehicle['maxSpeed'], $vehicle['unit']]);
    }
    $table->display();

    //select index
    //convert klm and use same unit
    //run match

/*} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}*/