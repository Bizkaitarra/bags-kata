<?php


namespace BagsKata\App\Domain;

use BagsKata\App\Domain\Exceptions\BagFullException;
use BagsKata\App\Domain\Exceptions\InventoryFullException;

class Inventory
{
    private Backpack $backpack;
    private array $extraBagList;


    public function __construct(Backpack $backpack, array $extraBagList)
    {
        $this->backpack = $backpack;
        $this->extraBagList = $extraBagList;
    }


    /**
     * @param Item $item
     * @throws BagFullException
     * @throws Exceptions\NotValidBagCategoryException
     * @throws InventoryFullException
     */
    public function addItem(Item $item)
    {
        if ($this->backpack->canBeAdded($item)) {
            $this->backpack->addItem($item);
            return;
        }


        for ($i = 0; $i < count($this->extraBagList); $i++) {
            if ($this->extraBagList[$i] instanceof ExtraBag
                && $this->extraBagList[$i]->canBeAdded($item)
            ) {
                $this->extraBagList[$i]->addItem($item);
                return;
            }
        }
        throw new InventoryFullException();
    }

    public function getAllItems():array
    {
        $items = $this->backpack->items();
        foreach ($this->extraBagList as $bag) {
            $items = array_merge($items, $bag->items());
        }
        return $items;
    }


    public function categoryBag(Item $item):?ExtraBag
    {
        foreach ($this->extraBagList as $bag) {
            if ($bag instanceof ExtraBag && $bag->isFromCategory($item->category())) {
                return $bag;
            }
        }
        return null;
    }

    public function emptyBags()
    {
        $this->backpack->empty();
        foreach ($this->extraBagList as $bag) {
            if ($bag instanceof ExtraBag) {
                $bag->empty();
            }
        }
    }

    public function sortBags()
    {
        $this->backpack->sort();
        foreach ($this->extraBagList as $bag) {
            if ($bag instanceof ExtraBag) {
                $bag->sort();
            }
        }
    }

}
