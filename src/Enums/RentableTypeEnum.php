<?php

declare(strict_types=1);

namespace Readbool\ReservationTdd\Enums;

enum RentableTypeEnum: string
{
    case CAR = 'car';

    case ROOM = 'room';
}
