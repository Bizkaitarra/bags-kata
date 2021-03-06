<?php


namespace BagsKata\App\Domain\Exceptions;

class NotValidBagCategoryException extends \Exception
{
    public function __construct(string $categoryName)
    {
        parent::__construct(sprintf('%s is not a valid category for the bag', $categoryName));
    }
}