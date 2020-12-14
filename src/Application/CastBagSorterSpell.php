<?php

namespace BagsKata\App\Application;

use BagsKata\App\Domain\Exceptions\BagFullException;
use BagsKata\App\Domain\Exceptions\InventoryFullException;
use BagsKata\App\Domain\Exceptions\NotValidBagCategoryException;
use BagsKata\App\Domain\ExtraBag;
use BagsKata\App\Domain\Inventory;

class CastBagSorterSpell
{
    public function __invoke(Inventory $inventory):bool
    {
        $this->placeItemsInBags($inventory);
        $inventory->sortBags();
        return true;
    }


    private function addInCategoryBag(Inventory $inventory, $item): bool
    {
        try {
            $correctExtraBag = $inventory->categoryBag($item);
            if ($correctExtraBag instanceof ExtraBag && $correctExtraBag->canBeAdded($item)) {
                $correctExtraBag->addItem($item);
                return true;
            }
        } catch (\Exception $exception) {
            throw new \LogicException('Program should check that something can be placed before place it.');
        }
        return false;
    }

    /**
     * @param Inventory $inventory
     * @throws BagFullException
     * @throws InventoryFullException
     * @throws NotValidBagCategoryException
     */
    private function placeItemsInBags(Inventory $inventory): void
    {
        $magicalItemTemporalContainer = $inventory->getAllItems();
        $inventory->emptyBags();

        foreach ($magicalItemTemporalContainer as $item) {
            if (!$this->addInCategoryBag($inventory, $item)) {
                $inventory->addItem($item);
            }
        }
    }
}
