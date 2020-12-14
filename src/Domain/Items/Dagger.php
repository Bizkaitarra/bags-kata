<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Dagger extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Dagger',
            new ItemCategory(ItemCategory::WEAPONS)
        );
    }
}
