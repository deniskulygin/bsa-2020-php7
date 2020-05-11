<?php

namespace App\Task1;

interface TrackInterface
{
    /**
     * @return float
     */
    public function getLapLength(): float;
    
    /**
     * @return int
     */
    public function getLapsNumber(): int;
    
    /**
     * @param Car $car
     */
    public function add(Car $car): void;
    
    /**
     * @return array
     */
    public function all(): array;
    
    /**
     * @return Car
     */
    public function run(): Car;
}
