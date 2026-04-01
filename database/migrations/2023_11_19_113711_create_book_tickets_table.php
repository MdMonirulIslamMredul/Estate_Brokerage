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
        Schema::create('book_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id');
            $table->string('name_english')->nullable();
            $table->string('name_bangla')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_eng'->nullable());
            $table->string('address_bng')->nullable();
            $table->string('message_english')->nullable();
            $table->string('message_bangla')->nullable();
            $table->tinyInteger('status')->comment('pending=0,active=1');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_tickets');
    }
};
