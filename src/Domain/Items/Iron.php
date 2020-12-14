<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Iron extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Iron',
            new ItemCategory(ItemCategory::METALS)
        );
    }
}
