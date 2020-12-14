<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Silver extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Silver',
            new ItemCategory(ItemCategory::METALS)
        );
    }
}
