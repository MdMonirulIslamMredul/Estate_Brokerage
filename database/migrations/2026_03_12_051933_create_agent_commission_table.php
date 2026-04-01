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
        Schema::create('agent_commission', function (Blueprint $table) {
            $table->id();

            // Foreign key to projects table
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            // Foreign key to agents (assumes 'users' or 'agents' table)
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');

            $table->decimal('amount', 12, 2); // The actual commission value earned
            $table->string('currency')->default('BDT'); // Currency for the commission, defaulting to BDT
            $table->timestamps(); // Tracks when the commission was recorded


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_commission');
    }
};
