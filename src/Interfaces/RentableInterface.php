<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\Interfaces;

interface RentableInterface
{
    public function getPrice(): float;
}