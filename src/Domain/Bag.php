<?php


namespace BagsKata\App\Domain;

use BagsKata\App\Domain\Exceptions\BagFullException;
use BagsKata\App\Domain\Exceptions\NotValidBagCategoryException;

abstract class Bag
{
    protected $name = '';
    protected $capacity = 0;
    protected array $items=[];
    protected ?ItemCategory $category = null;


    public function canBeAdded(Item $item)
    {
        return !$this->isFull() &&
            ($this->hasCorrectCategory($item));
    }

    /**
     * @param Item $item
     * @throws BagFullException
     * @throws NotValidBagCategoryException
     */
    public function addItem(Item $item)
    {
        if (!$this->canBeAdded($item)) {
            if ($this->isFull()) {
                throw new BagFullException($this->name, $this->capacity, $this->numerOfItemsInBag());
            }
            if (!$this->hasCorrectCategory($item)) {
                throw new NotValidBagCategoryException($item->category());
            }
        }
        $this->items[] = $item;
    }

    protected function numerOfItemsInBag(): int
    {
        return count($this->items);
    }

    protected function isFull(): bool
    {
        return $this->numerOfItemsInBag() >= $this->capacity;
    }

    public function hasCorrectCategory(Item $item): bool
    {
        return $this->category === null || $this->category->name() === $item->category()->name();
    }

    /**
     * @return array
     */
    public function items(): array
    {
        return $this->items;
    }

    public function empty()
    {
        $this->items = [];
    }

    public function sort()
    {
        usort($this->items, fn ($a, $b) => $a->name() <=> $b->name());
    }


    public function isFromCategory(ItemCategory $itemCategory): bool
    {
        if ($this->category === null) {
            return false;
        }
        return $this->category->name() === $itemCategory->name();
    }
}
