<?php

namespace Tests\Feature\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductCategoryMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_fresh_database_contains_the_existing_project_categories(): void
    {
        $this->assertDatabaseHas('product_categories', [
            'name' => 'Grains & Flour',
            'slug' => 'grains',
            'rank' => 1,
            'status' => 1,
        ]);
        $this->assertDatabaseHas('product_categories', [
            'name' => 'Dairy & Cheese',
            'slug' => 'dairy',
        ]);
    }

    public function test_product_belongs_to_a_product_category(): void
    {
        $category = ProductCategory::where('slug', 'grains')->firstOrFail();
        $product = Product::create([
            'name' => 'Jumla Rice',
            'slug' => 'jumla-rice',
            'product_category_id' => $category->id,
        ]);

        $this->assertTrue($product->productCategory->is($category));
        $this->assertTrue($category->products->contains($product));
    }

    public function test_legacy_slugs_that_normalize_to_the_same_name_are_preserved(): void
    {
        $migration = require database_path('migrations/2026_11_25_000001_create_product_categories_and_assign_products.php');
        $migration->down();
        DB::table('products')->insert([
            ['name' => 'First Tea', 'slug' => 'first-tea', 'category' => 'herbal-tea', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Second Tea', 'slug' => 'second-tea', 'category' => 'herbal_tea', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $migration->up();

        $this->assertDatabaseHas('product_categories', ['slug' => 'herbal-tea']);
        $this->assertDatabaseHas('product_categories', ['slug' => 'herbal_tea']);
        $this->assertSame(2, Product::whereNotNull('product_category_id')->count());
    }
}
