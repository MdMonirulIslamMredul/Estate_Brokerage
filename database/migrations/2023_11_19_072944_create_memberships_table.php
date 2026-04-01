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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name_english')->nullable();
            $table->string('name_bangla')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fat_name_eng')->nullable();
            $table->string('fat_name_bng')->nullable();
            $table->string('occupation')->nullable();
            $table->string('reference')->nullable();
            $table->string('address_eng')->nullable();
            $table->string('address_bng')->nullable();
            $table->string('message_english')->nullable();
            $table->string('message_bangala')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->comment('pending=0,active=1');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
