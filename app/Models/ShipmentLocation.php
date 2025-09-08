<?php

namespace App\Models;

use App\Enum\ShipmentLocationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentLocation extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentLocationFactory> */
    use HasFactory;

    protected $fillable = [
        'uuid',
        'shipment_id',
        'location',
        'google_map_location',
        'description',
        'date',
        'time',
        'status',
    ];

    protected $casts = [
        'status' => ShipmentLocationStatus::class
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
