<?php

declare(strict_types=1);

use Readbool\ReservationTdd\Enums\RentableTypeEnum;
use Readbool\ReservationTdd\RentableThings\Room;

it ('should return room price at 400.00', function () {
    $expected = 400.00;

    $room = new Room('Deluxe room', $expected, RentableTypeEnum::ROOM);

    expect($room->getPrice())->toBe($expected);
});

it ('should return room name as Deluxe room', function () {
    $expected = 'Deluxe room';

    $room = new Room('Deluxe room', 100.00, RentableTypeEnum::ROOM);

    expect($room->getName())->toBe($expected);
});

it ('should return room type as room', function () {
    $expected = RentableTypeEnum::ROOM;

    $room = new Room('Deluxe room', 100.00, RentableTypeEnum::ROOM);

    expect($room->getType())->toBe($expected);
});