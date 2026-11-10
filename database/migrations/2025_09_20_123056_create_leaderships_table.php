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
        Schema::create('leaderships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->text('summary')->nullable();
            $table->mediumText('information')->nullable();
            $table->string('image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default(1)->comment('1=show 0=Hide');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaderships');
    }
};
