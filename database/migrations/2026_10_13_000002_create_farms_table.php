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
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nepali_name')->nullable();
            $table->string('slug')->unique();
            $table->string('province')->default('Karnali');
            $table->string('district')->nullable();
            $table->string('altitude')->nullable();
            $table->string('practice')->default('Organic');
            $table->string('produce')->nullable();
            $table->integer('farmers_count')->default(50);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
