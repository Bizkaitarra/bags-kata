<?php


namespace BagsKata\Tests\Application;

use BagsKata\App\Domain\ExtraBag;
use BagsKata\App\Domain\Inventory;
use BagsKata\App\Domain\Backpack;
use BagsKata\App\Application\CastBagSorterSpell;
use BagsKata\App\Domain\Item;
use BagsKata\App\Domain\ItemCategory;
use BagsKata\App\Domain\Items\Axe;
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
    public function testEmptyInventoryAndItemsShouldReturnTrue()
    {
        $inventory = new Inventory(new Backpack(), []);
        $spell = new CastBagSorterSpell();
        $this->assertTrue($spell->__invoke($inventory));
    }

    public function testNoExtraBagsInventoryShouldReturnTrueAndBagIsSorted()
    {
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

    public function testWhenThereIsExtraBagsEachItemShouldGoToTheCorrectCategoryBag()
    {
        $backPack = new Backpack();
        $backPack->addItem(new Rose());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Silver());
        $backPack->addItem(new Sword());
        $backPack->addItem(new Wool());
        $backPack->addItem(new Silk());
        $backPack->addItem(new Iron());
        $backPack->addItem(new Axe());

        $weaponCategory = new ItemCategory(ItemCategory::WEAPONS);
        $herbsCategory = new ItemCategory(ItemCategory::HERBS);
        $inventory = new Inventory(
            $backPack,
            [
                new ExtraBag('Weapons bag', $weaponCategory),
                new ExtraBag('Herbs bag', $herbsCategory),
            ]
        );
        $spell = new CastBagSorterSpell();
        $this->assertTrue($spell->__invoke($inventory));
        $this->compareExcectedOrder($backPack->items(), [
           Iron::class,
           Silk::class,
           Silver::class,
           Wool::class

        ]);

        $this->compareExcectedOrder($inventory->bag(0)->items(), [
           Axe::class,
           Maze::class,
           Sword::class,
        ]);

        $this->compareExcectedOrder($inventory->bag(1)->items(), [
            Rose::class
        ]);
    }

    public function testThereCanBeBagsWithoutCategory()
    {
        $backPack = new Backpack();
        $backPack->addItem(new Rose());
        $backPack->addItem(new Maze());
        $backPack->addItem(new Silver());
        $backPack->addItem(new Sword());
        $backPack->addItem(new Wool());
        $backPack->addItem(new Silk());
        $backPack->addItem(new Iron());
        $backPack->addItem(new Axe());

        $inventory = new Inventory(
            $backPack,
            [
                new ExtraBag('Miscellance bag', null),
            ]
        );
        $spell = new CastBagSorterSpell();
        $this->assertTrue($spell->__invoke($inventory));
        $this->assertCount(8, $backPack->items());
        $this->assertCount(0, $inventory->bag(0)->items());
    }


    private function compareExcectedOrder(array $expectedItems, array $realItems)
    {
        for ($i=0; $i<count($expectedItems); $i++) {
            $this->assertItemIs($expectedItems[$i], $i, $realItems[$i]);
        }
    }

    private function assertItemIs(Item $item, int $position, string $className)
    {
        $this->assertInstanceOf(
            $className,
            $item,
            sprintf(
                '%s excepted in position %s, %s resulted',
                $className,
                $position,
                get_class($item)
            )
        );
    }
}
