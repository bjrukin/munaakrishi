<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->unsignedInteger('rank')->default(1);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $labels = [
            'grains' => 'Grains & Flour',
            'fruits' => 'Fruits',
            'vegetables' => 'Vegetables',
            'honey' => 'Honey',
            'tea-spices' => 'Tea & Spices',
            'pickles-dried' => 'Pickles & Dried',
            'dairy' => 'Dairy & Cheese',
        ];
        $legacySlugs = Schema::hasColumn('products', 'category')
            ? DB::table('products')->whereNotNull('category')->distinct()->pluck('category')->all()
            : [];
        $slugs = array_values(array_unique([...array_keys($labels), ...$legacySlugs]));
        $now = now();
        $usedNames = [];

        foreach ($slugs as $index => $slug) {
            $baseName = $labels[$slug] ?? Str::of($slug)->replace(['-', '_'], ' ')->title()->toString();
            $baseName = $baseName !== '' ? $baseName : 'Uncategorized';
            $name = $baseName;
            $suffix = 2;
            while (in_array(mb_strtolower($name), $usedNames, true)) {
                $name = "{$baseName} ({$suffix})";
                $suffix++;
            }
            $usedNames[] = mb_strtolower($name);

            DB::table('product_categories')->insert([
                'name' => $name,
                'slug' => $slug,
                'rank' => $index + 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('product_category_id')->nullable()->after('slug')->constrained()->restrictOnDelete();
        });

        if (Schema::hasColumn('products', 'category')) {
            foreach (DB::table('product_categories')->get(['id', 'slug']) as $category) {
                DB::table('products')->where('category', $category->slug)->update([
                    'product_category_id' => $category->id,
                ]);
            }

            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('category')->nullable()->after('slug');
        });

        foreach (DB::table('product_categories')->get(['id', 'slug']) as $category) {
            DB::table('products')->where('product_category_id', $category->id)->update([
                'category' => $category->slug,
            ]);
        }

        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_category_id');
        });
        Schema::dropIfExists('product_categories');
    }
};
