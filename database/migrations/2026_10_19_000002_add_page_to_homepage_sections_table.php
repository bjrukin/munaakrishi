<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_sections', function (Blueprint $table) {
            // Drop unique constraint on type so same type can be reused and assigned to different pages
            $table->dropUnique(['type']);
            // Add page column
            $table->string('page', 60)->default('home')->after('id');
            $table->index(['page', 'sort_order']);
        });

        // Ensure all existing 10 records have page = 'home'
        DB::table('homepage_sections')->whereNull('page')->orWhere('page', '')->update(['page' => 'home']);
    }

    public function down(): void
    {
        Schema::table('homepage_sections', function (Blueprint $table) {
            $table->dropIndex(['page', 'sort_order']);
            $table->dropColumn('page');
            $table->unique('type');
        });
    }
};
