<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string|null $tracking_code
 * @property string|null $sender_name
 * @property string|null $sender_address
 * @property string|null $sender_phone
 * @property string|null $sender_email
 * @property string|null $client_name
 * @property string|null $client_address
 * @property string|null $client_phone
 * @property string|null $client_email
 * @property string|null $shipped_from
 * @property string|null $shipped_to
 * @property \Illuminate\Support\Carbon|null $departure_date
 * @property \Illuminate\Support\Carbon|null $arrival_date
 * @property string|null $weight
 * @property string|null $quantity
 * @property string|null $length
 * @property string|null $width
 * @property string|null $height
 * @property string|null $departure_time
 * @property string|null $arrival_time
 * @property string|null $description
 * @property string|null $comment
 * @property numeric|null $amount
 * @property string|null $currency
 * @property string|null $payment_mode
 * @property string|null $image
 * @property string|null $type
 * @property string|null $total_freight
 * @property string|null $product
 * @property string|null $mode
 * @property string|null $carrier_reference_no
 * @property string|null $carrier
 * @property \App\Enum\ShipmentStatus $status
 * @property string|null $current_location
 * @property string|null $last_update
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShipmentLocation> $shipmentLocation
 * @property-read int|null $shipment_location_count
 * @method static \Database\Factories\ShipmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereArrivalTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCarrier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCarrierReferenceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereClientAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereClientEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereClientPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCurrentLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereDepartureDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereDepartureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment wherePaymentMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereSenderAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereSenderEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereSenderPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereShippedFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereShippedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereTotalFreight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereWidth($value)
 */
	class Shipment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $shipment_id
 * @property string $location
 * @property string $google_map_location
 * @property string|null $description
 * @property string $date
 * @property string $time
 * @property \App\Enum\ShipmentLocationStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Shipment $shipment
 * @method static \Database\Factories\ShipmentLocationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereGoogleMapLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereShipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentLocation whereUuid($value)
 */
	class ShipmentLocation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

