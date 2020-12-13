<?php


namespace BagsKata\App\Domain\Items;


use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Linen extends Item
{
    public function __construct()
    {
        parent::__construct(
            'LINEN',
            new ItemCategory(ItemCategory::CLOTHES),
        );
    }


}