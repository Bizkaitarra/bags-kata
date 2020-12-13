<?php


namespace BagsKata\App\Domain\Items;


use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Wool extends Item
{
    public function __construct()
    {
        parent::__construct(
            'WOOL',
            new ItemCategory(ItemCategory::CLOTHES),
        );
    }


}