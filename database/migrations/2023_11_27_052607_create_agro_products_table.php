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
        Schema::create('agro_products', function (Blueprint $table) {
            $table->id();
            $table->string('title_english')->nullable();
            $table->string('title_bangla')->nullable();
            $table->text('short_des_eng')->nullable();
            $table->text('short_des_bng')->nullable();
            $table->longText('long_des_eng')->nullable();
            $table->longText('long_des_bng')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();            
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agro_products');
    }
};
