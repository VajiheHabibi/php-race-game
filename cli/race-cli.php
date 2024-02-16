<?php

require __DIR__ . '/../vendor/autoload.php';
use App\Helpers\JsonReader;
use App\Vehicle;
use App\Race;

try {
    $jsonReader = new JsonReader();
    $vehicles = $jsonReader->readJsonFile(__DIR__ . '/../data/vehicles.json');

    // Display the list of vehicles
    $table = new cli\Table;
    $table->setHeaders(['Index', 'Vehicle Name', 'Max Speed', 'Unit']);

    foreach ($vehicles as $index => $vehicle) {
        $table->addRow([$index, $vehicle['name'], $vehicle['maxSpeed'], $vehicle['unit']]);
    }
    $table->display();


    cli\out("Player 1, select a vehicle (enter the index):");
    $player1VehicleIndex = cli\input();
    cli\out("Player 2, select a vehicle (enter the index):");
    $player2VehicleIndex = cli\input();

    $player1 = new Vehicle($vehicles[$player1VehicleIndex]['name'], $vehicles[$player1VehicleIndex]['maxSpeed'], $vehicles[$player1VehicleIndex]['unit']);
    $player2 = new Vehicle($vehicles[$player2VehicleIndex]['name'], $vehicles[$player2VehicleIndex]['maxSpeed'], $vehicles[$player2VehicleIndex]['unit']);


    $race = new Race($player1, $player2);
    $race->runRace();

} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}