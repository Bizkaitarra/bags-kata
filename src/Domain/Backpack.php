<?php


namespace BagsKata\App\Domain;

class Backpack extends Bag
{

    public function __construct()
    {
        $this->capacity = 8;
        $this->name = 'BackPack';
    }

}