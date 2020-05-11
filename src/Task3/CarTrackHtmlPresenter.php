<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task1\Track;

/**
 * Class CarTrackHtmlPresenter
 *
 * @package App\Task3
 */
class CarTrackHtmlPresenter
{
    /**
     * @var string
     */
    private $output;
    
    /**
     * @param Track $track
     *
     * @return string
     */
    public function present(Track $track): string
    {
        foreach ($track->all() as $car) {
            $this->output .= '<li>' . '<h2>' . $car->getName() . '</h2>' . '</li>';
            $this->output .= '<li>' . '<img src="' . $car->getImage() . '" alt="'. $car->getName() . '">' .'</li>';
        }
        
        return '<ul class="timeline">' . $this->output . '</ul>';
    }
}
