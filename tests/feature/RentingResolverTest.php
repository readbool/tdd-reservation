<?php

declare(strict_types=1);

use Readbool\ReservationTdd\Enums\RentableTypeEnum;
use Readbool\ReservationTdd\RentableThings\Car;
use Readbool\ReservationTdd\RentableThings\Room;
use Readbool\ReservationTdd\RentingResolver;

it('should resolve a Car type class', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $result = $resolver->resolve(RentableTypeEnum::CAR);

    expect($result)->toBeInstanceOf(Car::class);
});

it('should resolve a Room type class', function () {
    $resolver = new RentingResolver([
        new Car('Nissan GTR', 100.00, RentableTypeEnum::CAR),
        new Room('Deluxe room', 400.00, RentableTypeEnum::ROOM)
    ]);

    $result = $resolver->resolve(RentableTypeEnum::ROOM);

    expect($result)->toBeInstanceOf(Room::class);
});