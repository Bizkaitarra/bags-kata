<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Leather extends Item
{
    public function __construct()
    {
        parent::__construct(
            'LEATHER',
            new ItemCategory(ItemCategory::CLOTHES)
        );
    }
}
