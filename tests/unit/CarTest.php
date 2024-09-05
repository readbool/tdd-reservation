<?php

declare(strict_types=1);

use Readbool\ReservationTdd\Enums\RentableTypeEnum;
use Readbool\ReservationTdd\RentableThings\Car;

it ('should return car type', function () {
    $car = new Car('Nissan GTR', 100,RentableTypeEnum::CAR);

    expect($car->getType())->toBe(RentableTypeEnum::CAR);
});

it ('should return car price at 100.00', function () {
    $expected = 100.00;

    $car = new Car('Nissan GTR', $expected,RentableTypeEnum::CAR);

    expect($car->getPrice())->toBe($expected);
});

it ('should return car name as Honda Civic Type R', function () {
    $expected = 'Honda Civic Type R';

    $car = new Car($expected, 100.00,RentableTypeEnum::CAR);

    expect($car->getName())->toBe($expected);
});