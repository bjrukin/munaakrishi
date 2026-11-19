<?php

namespace Tests\Feature\Admin;

use App\Models\Office;
use App\Models\Product;
use App\Services\Admin\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_form_contains_requested_fields_and_only_active_outlets(): void
    {
        $activeOutlet = Office::create(['name' => 'Sanepa Outlet', 'status' => 1]);
        $inactiveOutlet = Office::create(['name' => 'Closed Outlet', 'status' => 0]);

        $html = (string) $this->view('admin.product.form', [
            'page_title' => 'Add Product',
            'action' => '/admin/product/store',
            'row' => null,
            'outlets' => Office::where('status', 1)->get(),
            'nav' => 'business',
            'sub_nav' => 'product',
        ]);

        $this->assertStringContainsString('name="name"', $html);
        $this->assertStringContainsString('name="category"', $html);
        $this->assertStringContainsString('name="district"', $html);
        $this->assertStringContainsString('name="detail"', $html);
        $this->assertStringContainsString('name="grown_by"', $html);
        $this->assertStringContainsString('name="storage"', $html);
        $this->assertStringContainsString('name="pack_size"', $html);
        $this->assertStringContainsString('name="price"', $html);
        $this->assertStringContainsString('name="image"', $html);
        $this->assertStringContainsString('name="outlet_ids[]"', $html);
        $this->assertStringContainsString('class="form-check-input outlet-checkbox"', $html);
        $this->assertStringContainsString('data-outlet-select-all', $html);
        $this->assertStringContainsString('value="' . $activeOutlet->id . '"', $html);
        $this->assertStringNotContainsString('value="' . $inactiveOutlet->id . '"', $html);
    }

    public function test_product_service_saves_product_details_and_selected_outlets(): void
    {
        $firstOutlet = Office::create(['name' => 'Sanepa Outlet', 'status' => 1]);
        $secondOutlet = Office::create(['name' => 'Pokhara Outlet', 'status' => 1]);

        app(ProductService::class)->store([
            'id' => 0,
            'name' => 'Jumla Marshi Rice',
            'category' => 'grains',
            'district' => 'Jumla',
            'detail' => 'Traditional red rice grown at high altitude.',
            'grown_by' => 'Jumla Farmer Cooperative',
            'storage' => 'Store in a cool, dry place.',
            'pack_size' => '1 kg',
            'price' => 350,
            'unit' => 'pack',
            'outlet_ids' => [$firstOutlet->id, $secondOutlet->id],
        ]);

        $product = Product::where('name', 'Jumla Marshi Rice')->firstOrFail();

        $this->assertSame('Traditional red rice grown at high altitude.', $product->detail);
        $this->assertSame('Jumla Farmer Cooperative', $product->grown_by);
        $this->assertSame('Store in a cool, dry place.', $product->storage);
        $this->assertSame('1 kg', $product->pack_size);
        $this->assertEqualsCanonicalizing(
            [$firstOutlet->id, $secondOutlet->id],
            $product->outlets()->pluck('offices.id')->all()
        );
    }
}
