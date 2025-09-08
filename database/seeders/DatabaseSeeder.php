<?php

namespace Database\Seeders;

use App\Models\Shipment;
use App\Models\ShipmentLocation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        Shipment::factory(10)->has(ShipmentLocation::factory()->count(5))->create();
    }
}
