<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('detail')->nullable()->after('description');
            $table->string('grown_by')->nullable()->after('detail');
            $table->text('storage')->nullable()->after('grown_by');
            $table->string('pack_size')->nullable()->after('storage');
        });

        Schema::create('office_product', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('office_id')->constrained()->cascadeOnDelete();
            $table->primary(['product_id', 'office_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('office_product');

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['detail', 'grown_by', 'storage', 'pack_size']);
        });
    }
};
