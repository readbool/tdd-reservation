<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\Interfaces;

interface PaymentGatewayInterface
{
    public function getPaymentAmount(): ?float;

    public function setPayment(float $amountPaid): void;

    public function getStatus(): string;
}