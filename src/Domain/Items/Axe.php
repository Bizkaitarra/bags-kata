<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Axe extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Axe',
            new ItemCategory(ItemCategory::WEAPONS)
        );
    }
}
