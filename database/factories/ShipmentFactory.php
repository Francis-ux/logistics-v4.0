<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'tracking_code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'sender_name' => $this->faker->name(),
            'sender_address' => $this->faker->streetAddress(),
            'sender_phone' => $this->faker->phoneNumber(),
            'sender_email' => $this->faker->email(),
            'client_name' => $this->faker->name(),
            'client_address' => $this->faker->streetAddress(),
            'client_phone' => $this->faker->phoneNumber(),
            'client_email' => $this->faker->email(),
            'shipped_from' => $this->faker->city(),
            'shipped_to' => $this->faker->city(),
            'departure_date' => $this->faker->date(),
            'arrival_date' => $this->faker->date(),
            'weight' => $this->faker->numberBetween(1, 100),
            'quantity' => $this->faker->numberBetween(1, 10),
            'length' => $this->faker->numberBetween(1, 100),
            'width' => $this->faker->numberBetween(1, 100),
            'height' => $this->faker->numberBetween(1, 100),
            'departure_time' => $this->faker->time(),
            'arrival_time' => $this->faker->time(),
            'description' => $this->faker->sentence(),
            'comment' => $this->faker->sentence(),
            'amount' => $this->faker->numberBetween(1, 1000),
            'currency' => 'Nigerian Naira-NGN-₦',
            'payment_mode' => $this->faker->randomElement(['cash', 'credit', 'debit']),
            'image' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(['air', 'land', 'sea']),
            'total_freight' => $this->faker->numberBetween(1, 1000),
            'product' => $this->faker->word(),
            'mode' => $this->faker->randomElement(['express', 'economy']),
            'carrier' => $this->faker->company(),
            'carrier_reference_no' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'status' => $this->faker->randomElement(['Picked Up', 'On Hold', 'Out For Delivery', 'In Transit', 'En Route', 'Cancelled', 'Delivered', 'Returned', 'Arrived']),
            'current_location' => $this->faker->city(),
            'last_update' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
