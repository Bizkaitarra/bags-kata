<?php


namespace Domain;

use BagsKata\App\Domain\Exceptions\NotValidCategoryException;
use BagsKata\App\Domain\ItemCategory;
use PHPUnit\Framework\TestCase;

class ItemCategoryTest extends TestCase
{
    public function testCanCreateCategoryOfAllValidTypes()
    {
        new ItemCategory(ItemCategory::WEAPONS);
        new ItemCategory(ItemCategory::HERBS);
        new ItemCategory(ItemCategory::METALS);
        new ItemCategory(ItemCategory::CLOTHES);
        $this->assertTrue(true);
    }

    public function testCantCreateCategoryOfNotValidType()
    {
        $this->expectException(NotValidCategoryException::class);
        new ItemCategory('test');
    }
}
