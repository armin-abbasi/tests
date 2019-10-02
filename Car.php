<?php

abstract class CarDetail {

    protected $isBroken;

    public function __construct(bool $isBroken)
    {
        $this->isBroken = $isBroken;
    }

    public function isBroken(): bool
    {
        return $this->isBroken;
    }
}

class Door extends CarDetail
{
}

class Tyre extends CarDetail
{
}

class Car
{

    /**
     * @var CarDetail[]
     */
    private $details;

    /**
     * @param CarDetail[] $details
     */
    public function __construct(array $details)
    {
        $this->details = $details;
    }

    public function isBroken(): bool
    {
        foreach ($this->details as $detail) {

            if ($detail->isBroken()) {
                return true;
            }
        }

        return false;
    }

    public function isPaintingDamaged(): bool
    {
        // MAKE AN IMPLEMENTATION
    }
}

$car = new Car([new Door(true), new Tyre(false)]); // we pass a list of all details