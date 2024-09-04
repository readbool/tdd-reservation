<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd;

use InvalidArgumentException;
use Readbool\ReservationTdd\Interfaces\BookingInterface;
use Readbool\ReservationTdd\Interfaces\PaymentGatewayInterface;

final class Booking implements BookingInterface
{
    private array $reservationDetails = [];

    public function __construct(private readonly PaymentGatewayInterface $paymentGateway)
    {
    }

    public function getReservationDetails(): array
    {
        return $this->reservationDetails;
    }

    public function getStatus(): string
    {
        return $this->paymentGateway->getStatus();
    }

    public function setReservationDetails(string $name, string $startDate, string $endDate, ?float $paymentAmount): void
    {
        if ($paymentAmount < 0 || $paymentAmount === null) {
            throw  new InvalidArgumentException('Invalid payment amount');
        }

        $this->reservationDetails['name'] = $name;
        $this->reservationDetails['startDate'] = $startDate;
        $this->reservationDetails['endDate'] = $endDate;
        $this->reservationDetails['paymentAmount'] = $paymentAmount;
        $this->paymentGateway->setPayment($paymentAmount);
    }
}