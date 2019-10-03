<?php

interface VehicleInterface
{
    public function isBroken(): bool;

    public function isPaintingDamaged(): bool;
}

interface InspectionInterface
{
    /**
     * @param VehicleDetail[]
     * @return bool
     */
    public function isBroken(array $vehicleDetails): bool;

    /**
     * @param VehicleDetail[]
     * @return bool
     */
    public function isPaintingDamaged(array $vehicleDetails): bool;
}

abstract class VehicleDetail
{
    public $name;
    public $isBroken;
    public $isPaintingDamaged;

    public function __construct(bool $isBroken, bool $isPaintingDamaged)
    {
        $this->isBroken = $isBroken;
        $this->isPaintingDamaged = $isPaintingDamaged;
    }
}

class Hood extends VehicleDetail
{
    public function __construct(bool $isBroken, bool $isPaintingDamaged)
    {
        parent::__construct($isBroken, $isPaintingDamaged);
    }
}

class Door extends VehicleDetail
{
    public function __construct(bool $isBroken, bool $isPaintingDamaged)
    {
        parent::__construct($isBroken, $isPaintingDamaged);
    }
}

class Car implements VehicleInterface
{
    /**
     * @var InspectionInterface
     */
    protected $inspect;

    /**
     * @var VehicleDetail[]
     */
    public $details;

    /**
     * Car constructor.
     * @param InspectionInterface $carInspect
     * @param VehicleDetail[]
     */
    public function __construct(InspectionInterface $carInspect, array $details)
    {
        $this->inspect = $carInspect;
        $this->details = $details;
    }

    public function isBroken(): bool
    {
        return
            $this->inspect
                ->isBroken($this->details);
    }

    public function isPaintingDamaged(): bool
    {
        return
            $this->inspect
                ->isPaintingDamaged($this->details);
    }
}

class CarInspect implements InspectionInterface
{
    /**
     * @param VehicleDetail[] $details
     * @return bool
     */
    public function isBroken(array $details): bool
    {
        foreach ($details as $detail) {
            if ($detail->isBroken === true) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param VehicleDetail[] $details
     * @return bool
     */
    public function isPaintingDamaged(array $details): bool
    {
        foreach ($details as $detail) {
            if ($detail->isPaintingDamaged === true) {
                return true;
            }
        }

        return false;
    }
}

$car = new Car(
    new CarInspect(),
    [
        (new Hood(false, false)),
        (new Door(false, true))
    ]
);

echo "is Broken ? " . (bool)$car->isBroken();

echo "\n\n";

echo "is Painted ? " . (bool)$car->isPaintingDamaged();

