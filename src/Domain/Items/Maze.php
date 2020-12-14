<?php


namespace BagsKata\App\Domain\Items;

use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;

class Maze extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Maze',
            new ItemCategory(ItemCategory::WEAPONS)
        );
    }
}
