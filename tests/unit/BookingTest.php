<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\Tests\unit;

use InvalidArgumentException;
use Readbool\ReservationTdd\Booking;
use Readbool\ReservationTdd\PaymentGateway;

it('should return my reservation details', function () {
    $expected = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 400.00
    ];

    $booking = new Booking(new PaymentGateway());
    $booking->setReservationDetails(...$expected);

    expect($booking->getReservationDetails())->toBe($expected);
});

it('should return my payment status as paid', function () {
    $details = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 400.00
    ];

    $expected = 'Paid';
    $booking = new Booking(new PaymentGateway());
    $booking->setReservationDetails(...$details);

    expect($booking->getStatus())->toBe($expected);
});

it ('should return my payment status as unpaid', function () {
    $details = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 0.00
    ];

    $expected = 'Not paid';
    $booking = new Booking(new PaymentGateway());
    $booking->setReservationDetails(...$details);

    expect($booking->getStatus())->toBe($expected);
});

it ('should return throw exception if payment is invalid', function () {
    $details = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => -100.00
    ];

    $booking = new Booking(new PaymentGateway());
    $booking->setReservationDetails(...$details);
})->throws(InvalidArgumentException::class);