<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\Tests\unit;

use InvalidArgumentException;
use Readbool\ReservationTdd\Booking;
use Readbool\ReservationTdd\Enums\RentableTypeEnum;
use Readbool\ReservationTdd\PaymentGateway;
use Readbool\ReservationTdd\RentableThings\Car;
use Readbool\ReservationTdd\RentableThings\Room;
use Readbool\ReservationTdd\RentingResolver;

it('should return my reservation details', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $payload = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 400.00,
        'rentType' => 'room'
    ];

    $expected = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 400.00,
        'rentingDetails' => [
            'name' => 'Deluxe room',
            'price' => 400.00,
            'type' => 'room',
        ],
    ];

    $booking = new Booking(new PaymentGateway(), $resolver);
    $booking->setReservationDetails(...$payload);

    expect($booking->getReservationDetails())->toBe($expected);
});

it('should return my payment status as paid', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $payload = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 400.00,
        'rentType' => 'room'
    ];

    $expected = 'Paid';
    $booking = new Booking(new PaymentGateway(), $resolver);
    $booking->setReservationDetails(...$payload);

    expect($booking->getStatus())->toBe($expected);
});

it ('should return my payment status as unpaid', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $details = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 0.00,
        'rentType' => 'room'
    ];

    $expected = 'Not paid';
    $booking = new Booking(new PaymentGateway(), $resolver);
    $booking->setReservationDetails(...$details);
})->throws(InvalidArgumentException::class, 'Invalid payment amount');

it ('should return throw exception if payment is invalid', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $details = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => -100.00,
        'rentType' => 'room'
    ];

    $booking = new Booking(new PaymentGateway(), $resolver);
    $booking->setReservationDetails(...$details);
})->throws(InvalidArgumentException::class);

it ('should return throw exception if renting type is invalid', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $details = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 100.00,
        'rentType' => 'xxx'
    ];

    $booking = new Booking(new PaymentGateway(), $resolver);
    $booking->setReservationDetails(...$details);
})->throws(InvalidArgumentException::class, 'Invalid renting type');

it ('should return throw exception if payment for renting is insufficient', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $details = [
        'name' => 'John Doe',
        'startDate' => '2019-01-01',
        'endDate' => '2019-01-02',
        'paymentAmount' => 100.00,
        'rentType' => 'room'
    ];

    $booking = new Booking(new PaymentGateway(), $resolver);
    $booking->setReservationDetails(...$details);
})->throws(InvalidArgumentException::class, 'Invalid payment amount');