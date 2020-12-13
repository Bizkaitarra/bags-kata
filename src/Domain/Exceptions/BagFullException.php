<?php


namespace BagsKata\App\Domain\Exceptions;


class BagFullException extends \Exception
{
    public function __construct(string $bagName, int $capacity, int $numerOfItemsInBag)
    {
        parent::__construct(
            sprintf('%s is full. There are %s items and the capacity is %s', $bagName, $numerOfItemsInBag, $capacity)
        );
    }
}