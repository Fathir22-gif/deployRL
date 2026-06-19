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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('wishlistable_type'); // destination, package, review, etc
            $table->unsignedBigInteger('wishlistable_id');
            $table->timestamps();

            // Prevent duplicate wishlist entries
            $table->unique(['user_id', 'wishlistable_type', 'wishlistable_id']);
            
            // Index untuk query cepat
            $table->index(['wishlistable_type', 'wishlistable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
