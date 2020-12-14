<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class CherryBlossom extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Cherry Blossom',
            new ItemCategory(ItemCategory::HERBS)
        );
    }
}
