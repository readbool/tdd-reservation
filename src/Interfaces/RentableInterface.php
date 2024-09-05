<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\Interfaces;

use Readbool\ReservationTdd\Enums\RentableTypeEnum;

interface RentableInterface
{
    public function getName(): string;

    public function getPrice(): float;

    public function getType(): RentableTypeEnum;
}