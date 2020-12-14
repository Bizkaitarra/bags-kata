<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Silk extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Silk',
            new ItemCategory(ItemCategory::CLOTHES),
        );
    }
}
