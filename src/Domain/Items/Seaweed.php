<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Seaweed extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Seaweed',
            new ItemCategory(ItemCategory::HERBS)
        );
    }
}
