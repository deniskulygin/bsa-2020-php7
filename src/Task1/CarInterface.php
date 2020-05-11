<?php

namespace App\Task1;

interface CarInterface
{
    /**
     * @return int
     */
    public function getId(): int;
    
    /**
     * @return string
     */
    public function getImage(): string;
    
    /**
     * @return string
     */
    public function getName(): string;
    
    /**
     * @return int
     */
    public function getSpeed(): int;
    
    /**
     * @return int
     */
    public function getPitStopTime(): int;
    
    /**
     * @return float
     */
    public function getFuelConsumption(): float;
    
    /**
     * @return float
     */
    public function getFuelTankVolume(): float;
}
