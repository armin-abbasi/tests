<?php

abstract class CarDetail {

    protected $isBroken;
    protected $isPaintingDamaged;

    public function __construct(bool $isBroken, bool $isPaintingDamaged)
    {
        $this->isBroken = $isBroken;
        $this->isPaintingDamaged = $isPaintingDamaged;
    }

    public function isBroken(): bool
    {
        return $this->isBroken;
    }

    public function isPaintingDamaged(): bool
    {
        return $this->isPaintingDamaged;
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
        foreach ($this->details as $detail) {

            if ($detail->isPaintingDamaged()) {
                return true;
            }
        }

        return false;
    }
}

$car = new Car([new Door(true), new Tyre(false)]); // we pass a list of all details