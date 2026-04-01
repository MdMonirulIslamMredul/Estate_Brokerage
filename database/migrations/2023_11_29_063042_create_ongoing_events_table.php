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
        Schema::create('ongoing_events', function (Blueprint $table) {
            $table->id();
            $table->string('title_english')->nullable();
            $table->string('title_bangla')->nullable();
            $table->text('short_des_eng')->nullable();
            $table->text('short_des_bng')->nullable();
            $table->longText('long_des_eng')->nullable();
            $table->longText('long_des_bng')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('main_image')->nullable();
            $table->string('details_image1')->nullable();
            $table->string('details_image2')->nullable();
            $table->string('location_eng')->nullable();
            $table->string('location_bng')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongoing_events');
    }
};
