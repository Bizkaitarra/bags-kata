<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Sword extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Sword',
            new ItemCategory(ItemCategory::WEAPONS)
        );
    }
}
