<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\Interfaces;

interface BookingInterface
{
    public function getReservationDetails(): array;

    public function getStatus(): string;

    public function setReservationDetails(string $name, string $startDate, string $endDate, string $rentType, ?float $paymentAmount): void;
}