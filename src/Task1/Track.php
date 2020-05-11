<?php

declare(strict_types=1);

namespace App\Task1;

/**
 * Class Track
 *
 * @package App\Task1
 */
class Track implements TrackInterface
{
    private const SEC_IN_AN_HOUR = 3600;
    
    /**
     * @var float
     */
    private $lapLength;
    
    /**
     * @var int
     */
    private $lapsNumber;
    
    /**
     * @var array
     */
    private $allCars;
    
    /**
     * @var array
     */
    private $carsResults;
    
    /**
     * Track constructor.
     *
     * @param float $lapLength
     * @param int   $lapsNumber
     */
    public function __construct(float $lapLength, int $lapsNumber)
    {
        $this->lapLength = $lapLength;
        $this->lapsNumber = $lapsNumber;
    }
    
    /**
     * @return float
     */
    public function getLapLength(): float
    {
        return $this->lapLength;
    }
    
    /**
     * @return int
     */
    public function getLapsNumber(): int
    {
        return $this->lapsNumber;
    }
    
    /**
     * @param Car $car
     */
    public function add(Car $car): void
    {
        $this->allCars[] = $car;
    }
    
    /**
     * @return array
     */
    public function all(): array
    {
        return $this->allCars;
    }
    
    /**
     * @return Car
     */
    public function run(): Car
    {
        foreach ($this->allCars as $car) {
            $time = $this->calculateTrackTime($car);
            
            $this->carsResults[] = [
                'car' => $car,
                'trackTime' => $time
            ];
        }
        
        $bestTime = \min(array_column($this->carsResults, 'trackTime'));
        
        return $this->getWinnerByBestTime($bestTime);
    }
    
    /**
     * @param Car $car
     *
     * @return float
     */
    private function calculateTrackTime(Car $car): float
    {
        $oneFuelDistance = $car->getFuelTankVolume() / $car->getFuelConsumption();
        
        $distance = $this->lapLength * $this->lapsNumber;
        
        $time = $distance / $car->getSpeed();
        
        $pitstopsNumber = ceil($distance / $oneFuelDistance);
        
        $pitstopsTime = $pitstopsNumber * $car->getPitStopTime() / self::SEC_IN_AN_HOUR;
        
        return $time + $pitstopsTime;
    }
    
    /**
     * @param float $bestTime
     *
     * @return Car
     */
    private function getWinnerByBestTime(float $bestTime): Car
    {
        $carKey = array_search($bestTime, array_column($this->carsResults, 'trackTime'));
        
        return $this->carsResults[$carKey]['car'];
    }
}
