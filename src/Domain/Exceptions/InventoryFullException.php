<?php


namespace BagsKata\App\Domain\Exceptions;

class InventoryFullException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Inventory is full');
    }
}