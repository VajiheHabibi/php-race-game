<?php

namespace App;

class Race
{
    private Vehicle $player1Vehicle;
    private Vehicle $player2Vehicle;

    public function __construct(Vehicle $player1Vehicle, Vehicle $player2Vehicle)
    {
        $this->player1Vehicle = $player1Vehicle;
        $this->player2Vehicle = $player2Vehicle;
    }

    public function runRace(): void
    {
        $player1Time = $this->calculateTime($this->player1Vehicle);
        $player2Time = $this->calculateTime($this->player2Vehicle);

        echo "Player 1 - {$this->player1Vehicle->getName()}: {$player1Time} seconds\n";
        echo "Player 2 - {$this->player2Vehicle->getName()}: {$player2Time} seconds\n";

        if ($player1Time < $player2Time) {
            echo "Player 1 wins!\n";
        } elseif ($player2Time < $player1Time) {
            echo "Player 2 wins!\n";
        } else {
            echo "It's a tie!\n";
        }
    }

    private function calculateTime(Vehicle $vehicle): float
    {
        return round(10000 / self::convertToKmH($vehicle->getMaxSpeed(),$vehicle->getUnit()),2);
    }

    public static function convertToKmH(float $speed, string $unit): float
    {
        switch (strtolower($unit)) {
            case 'km/h':
                return $speed;
            case 'kts':
            case 'knots':
                // Conversion factor: 1 knots = 1.852 km/h
                return $speed * 1.852;
            default:
                throw new \InvalidArgumentException("Invalid speed unit: $unit");
        }
    }
}