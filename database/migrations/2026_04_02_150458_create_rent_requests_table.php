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
        Schema::create('rent_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name_english', 255);
            $table->string('phone', 50);
            $table->string('email', 255);
            $table->string('property_type', 255);
            $table->decimal('monthly_rent', 12, 2)->default(0);
            $table->string('property_title', 255);
            $table->string('location', 255);
            $table->string('area_size', 255)->nullable();
            $table->unsignedTinyInteger('bedrooms')->nullable();
            $table->unsignedTinyInteger('bathrooms')->nullable();
            $table->date('available_from')->nullable();
            $table->string('full_address', 500);
            $table->text('description');
            $table->enum('status', ['unread', 'read'])->default('unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_requests');
    }
};
