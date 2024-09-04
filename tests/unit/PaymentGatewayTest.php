<?php

declare(strict_types=1);

use Readbool\ReservationTdd\PaymentGateway;

it('should return my paid amount', function () {
    $expected = 1000.00;

    $paymentGateway = new PaymentGateway();
    $paymentGateway->setPayment($expected);

    expect($paymentGateway->getPaymentAmount())->toBe($expected);
});

it('should return not paid status', function () {
    $expected = 'Not paid';

    $paymentGateway = new PaymentGateway();
    $paymentGateway->setPayment(0.00);

    expect($paymentGateway->getStatus())->toBe($expected);
});

it('should return paid status', function () {
    $expected = 'Paid';

    $paymentGateway = new PaymentGateway();
    $paymentGateway->setPayment(10);

    expect($paymentGateway->getStatus())->toBe($expected);
});