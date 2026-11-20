<?php

namespace Tests\Feature;

use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\ForceHttps;
use App\Http\Middleware\ValidateUrl;
use App\Models\Inquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactInquiryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware([ForceHttps::class, ValidateUrl::class]);
    }

    public function test_general_contact_form_creates_an_inquiry(): void
    {
        $response = $this->postJson(route('contact.inquiry.store'), [
            'type' => 'general',
            'name' => 'Ram Bahadur Shrestha',
            'phone' => '9841234567',
            'email' => 'ram@example.com',
            'subject' => 'Product enquiry',
            'message' => 'I would like details about your wholesale products.',
        ]);

        $response->assertCreated()
            ->assertJsonPath('message', 'Thank you. Your inquiry has been submitted successfully.');

        $this->assertDatabaseHas('inquiries', [
            'type' => 'general',
            'name' => 'Ram Bahadur Shrestha',
            'phone' => '9841234567',
            'email' => 'ram@example.com',
            'subject' => 'Product enquiry',
            'status' => 'unread',
        ]);
    }

    public function test_farmer_contact_form_stores_the_complete_application(): void
    {
        $response = $this->postJson(route('contact.inquiry.store'), [
            'type' => 'farmer',
            'name' => 'Sunrise Cooperative',
            'phone' => '9861234567',
            'district' => 'Kaski',
            'village' => 'Pokhara 18',
            'group_type' => 'Cooperative (sahakari)',
            'members' => 25,
            'crops' => ['Vegetables', 'Fruits'],
            'land' => 12,
            'land_unit' => 'Ropani',
            'harvest' => 500,
            'harvest_unit' => 'kg',
            'month' => 'Baisakh',
            'transport' => 'Own vehicle',
            'notes' => 'We can supply every week.',
            'consent' => true,
        ]);

        $response->assertCreated();

        $inquiry = Inquiry::firstOrFail();
        $this->assertSame('farmer', $inquiry->type);
        $this->assertSame(['Vegetables', 'Fruits'], $inquiry->details['crops']);
        $this->assertSame('Kaski', $inquiry->details['district']);
        $this->assertSame(25, $inquiry->details['members']);
    }

    public function test_farmer_application_accepts_a_short_optional_note_from_the_real_form(): void
    {
        $response = $this->postJson(route('contact.inquiry.store'), [
            'type' => 'farmer',
            'name' => 'Hari Farmer',
            'phone' => '9841234567',
            'district' => 'Kaski',
            'group_type' => 'Individual farmer',
            'crops' => ['Vegetables'],
            'land' => '2',
            'land_unit' => 'Ropani',
            'harvest' => '50',
            'harvest_unit' => 'kg',
            'month' => 'Kartik',
            'practice' => 'Chemical free, not certified',
            'message' => 'Weekly',
            'consent' => 'on',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('inquiries', [
            'type' => 'farmer',
            'name' => 'Hari Farmer',
            'message' => 'Weekly',
        ]);
    }

    public function test_invalid_contact_form_is_not_stored(): void
    {
        $this->postJson(route('contact.inquiry.store'), [
            'type' => 'general',
            'name' => 'R',
            'phone' => '123',
            'email' => 'not-an-email',
            'message' => 'short',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'phone', 'email', 'message']);

        $this->assertDatabaseCount('inquiries', 0);
    }

    public function test_site_loads_a_versioned_contact_form_script(): void
    {
        $layout = file_get_contents(resource_path('views/layout/site.blade.php'));

        $this->assertStringContainsString("asset('assets/js/main.js') . '?v=' . filemtime", $layout);
    }

    public function test_crop_pills_use_native_checkbox_changes_without_double_toggling(): void
    {
        $script = file_get_contents(base_path('assets/js/main.js'));

        $this->assertStringContainsString("checkbox.addEventListener('change'", $script);
        $this->assertStringNotContainsString('checkbox.checked = !checkbox.checked', $script);
    }

    public function test_admin_can_list_and_open_an_inquiry_and_opening_marks_it_read(): void
    {
        $inquiry = Inquiry::create([
            'type' => 'general',
            'name' => 'Sita Rai',
            'phone' => '9801234567',
            'email' => 'sita@example.com',
            'subject' => 'General question',
            'message' => 'Please contact me regarding a product order.',
            'status' => 'unread',
        ]);

        $this->withoutMiddleware(AdminAuthenticate::class)
            ->get(route('admin.inquiry'))
            ->assertOk()
            ->assertSee('Sita Rai')
            ->assertSee('General question');

        $this->withoutMiddleware(AdminAuthenticate::class)
            ->get(route('admin.inquiry.show', $inquiry))
            ->assertOk()
            ->assertSee('Please contact me regarding a product order.');

        $this->assertSame('read', $inquiry->fresh()->status);
        $this->assertNotNull($inquiry->fresh()->read_at);
    }
}
