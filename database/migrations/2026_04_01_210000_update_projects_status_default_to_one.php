<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Normalize any unexpected status values to active/inactive domain.
        DB::statement("UPDATE projects SET status = 1 WHERE status IS NULL");
        DB::statement("UPDATE projects SET status = 0 WHERE status NOT IN (0, 1)");
        DB::statement("ALTER TABLE projects MODIFY status TINYINT(1) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE projects MODIFY status TINYINT(1) NOT NULL DEFAULT 0");
    }
};
