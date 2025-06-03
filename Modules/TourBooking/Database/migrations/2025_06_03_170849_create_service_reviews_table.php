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
        Schema::create('service_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->decimal('all_rating', 3, 1)->default(0.0);
            $table->decimal('location_rating', 3, 1)->default(0.0);
            $table->decimal('price_rating', 3, 1)->default(0.0);
            $table->decimal('amenity_rating', 3, 1)->default(0.0);
            $table->decimal('room_rating', 3, 1)->default(0.0);
            $table->decimal('service_rating', 3, 1)->default(0.0);
            $table->text('comment')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_reviews');
    }
};
