<?php

namespace App;

class Vehicle
{
    private string $name;
    private int $maxSpeed;
    private string $unit;

    public function __construct(string $name, int $maxSpeed, string $unit)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->unit = $unit;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }
}
