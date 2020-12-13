<?php


namespace BagsKata\App\Domain;

abstract class Item
{
    private string $name;
    private ItemCategory $category;

    protected function __construct(string $name, ItemCategory $category)
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function category(): ItemCategory
    {
        return $this->category;
    }




}