<?php

use App\Models\Shipment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipment_locations', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(Shipment::class)->constrained()->cascadeOnDelete();
            $table->string('location');
            $table->string('google_map_location');
            $table->longText('description')->nullable();
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['Picked Up', 'On Hold', 'Out For Delivery', 'In Transit', 'En Route', 'Cancelled', 'Delivered', 'Returned', 'Arrived'])->default('In Transit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_locations');
    }
};
