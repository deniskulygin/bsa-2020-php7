<?php

namespace App\Task2;

interface BookInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;
    
    /**
     * @return int
     */
    public function getPrice(): int;
    
    /**
     * @return int
     */
    public function getPagesNumber(): int;
}
