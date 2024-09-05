<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd;

use Readbool\ReservationTdd\Enums\RentableTypeEnum;
use Readbool\ReservationTdd\Interfaces\RentableInterface;

final class RentingResolver
{
    /**
     * @param iterable<RentableInterface> $listOfRentableThings
     */
    public function __construct(private readonly iterable $listOfRentableThings)
    {
    }

    public function resolve(?RentableTypeEnum $rentableOption = null): ?RentableInterface
    {
        if ($rentableOption === null) {
            return null;
        }

        foreach ($this->listOfRentableThings as $thing) {
            if ($thing->getType() === $rentableOption) {
                return $thing;
            }
        }

        return null;
    }
}