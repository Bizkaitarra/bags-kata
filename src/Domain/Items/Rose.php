<?php


namespace BagsKata\App\Domain\Items;


use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Rose extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Rose',
            new ItemCategory(ItemCategory::HERBS)
        );
    }
}