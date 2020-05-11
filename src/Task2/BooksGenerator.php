<?php

declare(strict_types=1);

namespace App\Task2;

/**
 * Class BooksGenerator
 *
 * @package App\Task2
 */
class BooksGenerator
{
    /**
     * @var int
     */
    private $minPagesNumber;
    
    /**
     * @var array
     */
    private $libraryBooks;
    
    /**
     * @var int
     */
    private $maxPrice;
    
    /**
     * @var array
     */
    private $storeBooks;
    
    /**
     * BooksGenerator constructor.
     *
     * @param int   $minPagesNumber
     * @param array $libraryBooks
     * @param int   $maxPrice
     * @param array $storeBooks
     */
    public function __construct(int $minPagesNumber, array $libraryBooks, int $maxPrice, array $storeBooks)
    {
        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->storeBooks = $storeBooks;
    }
    
    /**
     * @return \Generator
     */
    public function generate(): \Generator
    {
        foreach($this->libraryBooks as $libraryBook) {
            if($libraryBook->getPagesNumber() >= $this->minPagesNumber) {
                yield $libraryBook;
            }
        }
        
        foreach($this->storeBooks as $storeBook) {
            if($storeBook->getPrice() <= $this->maxPrice) {
                yield $storeBook;
            }
        }
    }
}
