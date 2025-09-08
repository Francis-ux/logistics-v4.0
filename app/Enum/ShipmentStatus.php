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

    public function badge(): string
    {
        return match ($this) {
            self::PickedUp => 'badge bg-primary-subtle text-primary fs-12 p-1',
            self::OnHold => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::OutForDelivery => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::InTransit => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::EnRoute => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Cancelled => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Delivered => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Returned => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Arrived => 'badge bg-success-subtle text-success fs-12 p-1',
        };
    }
}
