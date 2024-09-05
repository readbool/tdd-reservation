<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\RentableThings;

use Readbool\ReservationTdd\Enums\RentableTypeEnum;

abstract class AbstractRentable
{
    public function __construct(
        public readonly string $name,
        private readonly float $price,
        private readonly RentableTypeEnum $type
    ){
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}