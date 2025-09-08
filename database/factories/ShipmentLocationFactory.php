<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShipmentLocation>
 */
class ShipmentLocationFactory extends Factory
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
            'shipment_id' => \App\Models\Shipment::all()->random()->id,
            'location' => $this->faker->city(),
            'google_map_location' => $this->faker->city(),
            'description' => $this->faker->sentence(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'status' => $this->faker->randomElement(['Picked Up', 'On Hold', 'Out For Delivery', 'In Transit', 'En Route', 'Cancelled', 'Delivered', 'Returned', 'Arrived']),
        ];
    }
}
