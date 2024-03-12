<?php

namespace App\Classes;

/**
 * Класс - Корова
 */
class Cow extends Animal
{

    public function collectProduce(): int
    {
        return rand(8, 12); // Случайное количество молока от 8 до 12 литров
    }
}
