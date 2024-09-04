<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd;

use Readbool\ReservationTdd\Interfaces\PaymentGatewayInterface;

final class PaymentGateway implements PaymentGatewayInterface
{
    private ?float $amountPaid = null;

    public function getStatus(): string
    {
        $amount = $this->amountPaid ?? 0.00;

        return $amount > 0 ? 'Paid' : 'Not paid';
    }

    public function setPayment(float $amountPaid): void
    {
        $this->amountPaid = $amountPaid;
    }

    public function getPaymentAmount(): ?float
    {
        return  $this->amountPaid;
    }
}