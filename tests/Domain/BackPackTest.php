<?php


namespace Domain;

use BagsKata\App\Domain\Backpack;
use BagsKata\App\Domain\Exceptions\BagFullException;
use BagsKata\App\Domain\Items\Maze;
use PHPUnit\Framework\TestCase;

class BackPackTest extends TestCase
{
    public function testCanCreateBackPack()
    {
        $backPack = new Backpack();
        $this->assertInstanceOf(Backpack::class, $backPack);
    }

    public function testCantHaveMoreThanEightItems()
    {
        $backPack = new Backpack();
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $this->expectException(BagFullException::class);
        $backPack->addItem(new Maze());
    }

    public function testCanHaveEightItems()
    {
        $backPack = new Backpack();
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Maze());
        $this->assertTrue(true);
    }
}
