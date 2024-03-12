<?php

namespace App\Classes;

/**
 * Класс - Курица
 */
class Chicken extends Animal
{

    public function collectProduce(): int
    {
        return rand(0, 1); // Случайное количество яиц от 0 до 1 штук
    }
}
