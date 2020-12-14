<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Marigold extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Marigold',
            new ItemCategory(ItemCategory::HERBS)
        );
    }
}
