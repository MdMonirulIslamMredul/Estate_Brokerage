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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'age')) {
                $table->unsignedTinyInteger('age')->nullable()->after('username');
            }
            if (!Schema::hasColumn('users', 'current_address')) {
                $table->string('current_address')->nullable()->after('age');
            }
            if (!Schema::hasColumn('users', 'permanent_address')) {
                $table->string('permanent_address')->nullable()->after('current_address');
            }
            if (!Schema::hasColumn('users', 'id_document')) {
                $table->string('id_document')->nullable()->after('photo');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'age', 'current_address', 'permanent_address', 'id_document']);
        });
    }
};
