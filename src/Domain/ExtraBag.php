<?php


namespace BagsKata\App\Domain;

class ExtraBag extends Bag
{

    public function __construct(string $name, ?ItemCategory $category = null)
    {
        $this->capacity = 4;
        $this->name = $name;
        $this->category = $category;
    }

}