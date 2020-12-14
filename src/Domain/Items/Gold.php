<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Gold extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Gold',
            new ItemCategory(ItemCategory::METALS)
        );
    }
}
