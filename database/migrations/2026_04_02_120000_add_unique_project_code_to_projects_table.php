<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ensure column exists and is nullable
        if (!Schema::hasColumn('projects', 'project_code')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('project_code')->nullable()->after('title');
            });
        }

        // Make project_code nullable and add unique index.
        if (Schema::hasColumn('projects', 'project_code')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('project_code')->nullable()->change();
            });

            try {
                Schema::table('projects', function (Blueprint $table) {
                    $table->unique('project_code', 'projects_project_code_unique');
                });
            } catch (\Exception $e) {
                // Unique key may already exist in case migration was run in partial form.
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'project_code')) {
                $table->dropUnique('projects_project_code_unique');
                // keep column to not disrupt existing data in rollback scripts if user chooses
                // If preferred to drop column uncomment next line
                // $table->dropColumn('project_code');
            }
        });
    }
};
