<?php


namespace BagsKata\Tests\Application;

use BagsKata\App\Domain\Inventory;
use BagsKata\App\Domain\Backpack;
use BagsKata\App\Application\CastBagSorterSpell;
use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\Items\Axe;
use BagsKata\App\Domain\Items\Gold;
use BagsKata\App\Domain\Items\Iron;
use BagsKata\App\Domain\Items\Maze;
use BagsKata\App\Domain\Items\Rose;
use BagsKata\App\Domain\Items\Silk;
use BagsKata\App\Domain\Items\Silver;
use BagsKata\App\Domain\Items\Sword;
use BagsKata\App\Domain\Items\Wool;
use PHPUnit\Framework\TestCase;

class CastBagSorterSpellTest extends TestCase
{
    public function testEmptyInventoryAndItemsShouldReturnTrue() {
        $inventory = new Inventory(new Backpack(), []);
        $spell = new CastBagSorterSpell();
        $this->assertTrue($spell->__invoke($inventory));
    }

    public function testNoExtraBagsInventoryShouldReturnTrueAndBagIsSorted() {
        $backPack = new Backpack();
        $backPack->addItem(new Rose());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Silver());
        $backPack->addItem(new Sword());
        $backPack->addItem(new Wool());
        $backPack->addItem(new Silk());
        $backPack->addItem(new Iron());
        $backPack->addItem(new Axe());

        $inventory = new Inventory($backPack, []);
        $spell = new CastBagSorterSpell();
        $this->assertTrue($spell->__invoke($inventory));
        $items = $backPack->items();
        $this->compareExcectedOrder($items, [
           Axe::class,
           Iron::class,
           Maze::class,
           Rose::class,
           Silk::class,
           Silver::class,
           Sword::class,
           Wool::class

        ]);
    }


    private function compareExcectedOrder(array $expectedItems, array $realItems) {
        for ($i=0;$i<count($expectedItems);$i++) {
            $this->assertItemIs($expectedItems[$i], $i, $realItems[$i]);
        }
    }

    private function assertItemIs(Item $item, int $position, string $className) {
        $this->assertInstanceOf($className, $item,
            sprintf('%s excepted in position %s, %s resulted',
                $className,
                $position,
                get_class($item)
            )
        );
    }
}