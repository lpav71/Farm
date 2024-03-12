<?php

namespace App\Classes;

/**
 * Абстрактный класс животного
 */
abstract class Animal
{
    protected string $registrationNumber;

    public function __construct(string $registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    abstract public function collectProduce();
}
