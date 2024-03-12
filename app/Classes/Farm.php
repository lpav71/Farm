<?php

namespace App\Classes;

/**
 * Класс - Ферма
 */
class Farm
{
    protected array $animals = [];

    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }
    public function getAnimals(): array
    {
        return $this->animals;
    }
    public function collectAllProduce(): int
    {
        $totalProduce = 0;

        foreach ($this->animals as $animal) {
            $totalProduce += $animal->collectProduce();
        }

        return $totalProduce;
    }
}
