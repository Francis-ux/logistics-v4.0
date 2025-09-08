<?php

namespace App\Enum;

enum ShipmentStatus: string
{
    case PickedUp = 'Picked Up';
    case OnHold = 'On Hold';
    case OutForDelivery = 'Out For Delivery';
    case InTransit = 'In Transit';
    case EnRoute = 'En Route';
    case Cancelled = 'Cancelled';
    case Delivered = 'Delivered';
    case Returned = 'Returned';
    case Arrived = 'Arrived';

    public function label(): string
    {
        return match ($this) {
            self::PickedUp => 'Picked Up',
            self::OnHold => 'On Hold',
            self::OutForDelivery => 'Out For Delivery',
            self::InTransit => 'In Transit',
            self::EnRoute => 'En Route',
            self::Cancelled => 'Cancelled',
            self::Delivered => 'Delivered',
            self::Returned => 'Returned',
            self::Arrived => 'Arrived',
        };
    }
}
