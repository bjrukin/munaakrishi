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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->date('expiry_date')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('experience')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('responsibility')->nullable();
            $table->longText('requirement')->nullable();
            $table->boolean('status')->nullable()->default(1)->comment('0 = Hide, 1 = Show');
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
