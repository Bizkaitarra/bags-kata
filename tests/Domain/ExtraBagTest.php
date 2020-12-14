<?php


namespace Domain;


use BagsKata\App\Domain\Exceptions\BagFullException;
use BagsKata\App\Domain\ExtraBag;
use BagsKata\App\Domain\ItemCategory;
use BagsKata\App\Domain\Items\Maze;
use PHPUnit\Framework\TestCase;

class ExtraBagTest extends TestCase
{
    public function testCanCreateBagWithoutCategory() {
        $extraBag = new ExtraBag('Test');
        $this->assertInstanceOf(ExtraBag::class, $extraBag);
    }

    public function testCanCreateBagWithCategory() {
        $extraBag = new ExtraBag('Test', new ItemCategory(ItemCategory::WEAPONS));
        $this->assertInstanceOf(ExtraBag::class, $extraBag);
    }

    public function testCantHaveMoreThanFourItems() {
        $extraBag = new ExtraBag('Test');
        $extraBag->addItem(new Maze());
        $extraBag->addItem(new Maze());
        $extraBag->addItem(new Maze());
        $extraBag->addItem(new Maze());
        $this->expectException(BagFullException::class);
        $extraBag->addItem(new Maze());
    }

    public function testCanHaveFourItems() {
        $extraBag = new ExtraBag('Test');
        $extraBag->addItem(new Maze());
        $extraBag->addItem(new Maze());
        $extraBag->addItem(new Maze());
        $extraBag->addItem(new Maze());
        $this->assertTrue(true);
    }

}