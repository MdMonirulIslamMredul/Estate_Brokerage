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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('project_category_id')->nullable()->constrained('project_categories')->nullOnDelete();
            $table->foreignId('project_subcategory_id')->nullable()->constrained('project_subcategories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\ProjectCategory::class, 'project_category_id');
            $table->dropForeignIdFor(\App\Models\ProjectSubcategory::class, 'project_subcategory_id');
            $table->dropColumn(['project_category_id', 'project_subcategory_id']);
        });
    }
};
