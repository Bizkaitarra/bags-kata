<?php


namespace BagsKata\App\Domain;

use BagsKata\App\Domain\Exceptions\NotValidCategoryException;

class ItemCategory
{
    public CONST CLOTHES = 'CLOTHES';
    public CONST METALS = 'METALS';
    public CONST WEAPONS = 'WEAPONS';
    public CONST HERBS = 'HERBS';

    private string $name;


    /**
     * @param string $name
     * @throws NotValidCategoryException
     */
    public function __construct(string $name)
    {
        $this->assertValidName($name);
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws NotValidCategoryException
     */
    protected function assertValidName(string $name): void
    {
        if (!in_array($name, $this->getValidCategoryNames())) {
            throw new NotValidCategoryException($name);
        }
    }

    private function getValidCategoryNames(): array {
        return [
            self::CLOTHES, self::METALS, self::WEAPONS, self::HERBS
        ];
    }




}