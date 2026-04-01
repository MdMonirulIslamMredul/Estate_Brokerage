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
        Schema::create('it_farms', function (Blueprint $table) {
            $table->id();
            $table->string('it_service_name_eng')->nullable();
            $table->string('it_service_name_bng')->nullable();
            $table->text('resource_eng')->nullable();
            $table->text('resource_bng')->nullable();
            $table->text('short_des_eng')->nullable();
            $table->text('short_des_bng')->nullable();
            $table->longText('long_des_eng')->nullable();
            $table->longText('long_des_bng')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('main_image')->nullable();
            $table->string('details_image1')->nullable();
            $table->string('details_image2')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_farms');
    }
};
