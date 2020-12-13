<?php


namespace BagsKata\App\Domain;

class ExtraBag extends Bag
{

    public function __construct(string $name, ItemCategory $category)
    {
        $this->capacity = 8;
        $this->name = 'BackPack';
        $this->category = $category;
    }

}