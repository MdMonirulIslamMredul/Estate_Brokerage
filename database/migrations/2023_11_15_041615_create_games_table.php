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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_name')->nullable();
            $table->date('date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('location_eng')->nullable();
            $table->string('location_bng')->nullable();
            $table->text('short_des1_eng')->nullable();
            $table->text('short_des1_bng')->nullable();
            $table->text('short_des2_eng')->nullable();
            $table->text('short_des2_bng')->nullable();
            $table->text('short_des3_eng')->nullable();
            $table->text('short_des3_bng')->nullable();
            $table->longText('long_des1_eng')->nullable();
            $table->longText('long_des1_bng')->nullable();
            $table->longText('long_des2_eng')->nullable();
            $table->longText('long_des2_bng')->nullable();
            $table->longText('long_des3_eng')->nullable();
            $table->longText('long_des3_bng')->nullable();

            $table->string('main_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();           
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
