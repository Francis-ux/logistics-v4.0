<?php

namespace App\Models;

use App\Enum\ShipmentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory;

    protected $fillable = [
        'uuid',
        'tracking_code',
        'sender_name',
        'sender_address',
        'sender_phone',
        'sender_email',
        'client_name',
        'client_address',
        'client_phone',
        'client_email',
        'shipped_from',
        'shipped_to',
        'departure_date',
        'arrival_date',
        'weight',
        'quantity',
        'length',
        'width',
        'height',
        'departure_time',
        'arrival_time',
        'description',
        'comment',
        'amount',
        'currency',
        'payment_mode',
        'image',
        'type',
        'total_freight',
        'product',
        'mode',
        'carrier_reference_no',
        'carrier',
        'status',
        'current_location',
        'last_update',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'departure_date' => 'date',
        'arrival_date' => 'date',
        'status' => ShipmentStatus::class
    ];

    public function shipmentLocation()
    {
        return $this->hasMany(ShipmentLocation::class);
    }
}
