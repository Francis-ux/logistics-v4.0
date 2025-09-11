<?php

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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('tracking_code')->nullable();

            $table->string('sender_name')->nullable();
            $table->string('sender_address')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_address')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_email')->nullable();

            $table->string('shipped_from')->nullable();
            $table->string('shipped_to')->nullable();


            $table->date('departure_date')->nullable();
            $table->date('arrival_date')->nullable();

            $table->string('weight')->nullable();
            $table->string('quantity')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();

            $table->time('departure_time')->nullable();
            $table->time('arrival_time')->nullable();

            $table->longText('description')->nullable();
            $table->string('comment')->nullable();

            $table->decimal('amount', 10, 2)->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_mode')->nullable();

            $table->string('image')->nullable();

            $table->string('type')->nullable();
            $table->string('total_freight')->nullable();
            $table->string('product')->nullable();
            $table->string('mode')->nullable();
            $table->string('carrier_reference_no')->nullable();
            $table->string('carrier')->nullable();
            $table->enum('status', ['Picked Up', 'On Hold', 'Out For Delivery', 'In Transit', 'En Route', 'Cancelled', 'Delivered', 'Returned', 'Arrived'])->default('In Transit');
            $table->string('current_location')->nullable();
            $table->dateTime('last_update')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
