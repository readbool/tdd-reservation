<?php

declare(strict_types=1);


namespace Readbool\ReservationTdd\RentableThings;

use Readbool\ReservationTdd\Enums\RentableTypeEnum;
use Readbool\ReservationTdd\Interfaces\RentableInterface;

final class Room extends AbstractRentable implements RentableInterface
{
    public function getType(): RentableTypeEnum
    {
        return RentableTypeEnum::ROOM;
    }
}