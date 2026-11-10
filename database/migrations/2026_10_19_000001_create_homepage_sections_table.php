<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_sections', function (Blueprint $table) {
            $table->id();
            $table->string('type', 60)->unique();   // e.g. 'hero', 'products'
            $table->string('label', 120);            // human-readable name
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_enabled')->default(true);
            $table->json('settings')->nullable();    // title, subtitle, limit, etc.
            $table->timestamps();
        });

        // Seed default sections
        $now = now();
        DB::table('homepage_sections')->insert([
            ['type' => 'hero',              'label' => 'Hero Slider',               'sort_order' => 1,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Munaa Krishi Limited']),                                                                                                        'created_at' => $now, 'updated_at' => $now],
            ['type' => 'who_we_are',        'label' => 'Who We Are',                'sort_order' => 2,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Who we are',           'title' => 'An integrated agricultural value chain under the munaa brand']),                          'created_at' => $now, 'updated_at' => $now],
            ['type' => 'what_we_do',        'label' => 'What We Do',                'sort_order' => 3,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'What we do',           'title' => 'From farmers to markets']),                                                               'created_at' => $now, 'updated_at' => $now],
            ['type' => 'working_strategy',  'label' => 'Working Strategy Journey',  'sort_order' => 4,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Working strategy',     'title' => 'How products move',      'copy' => 'From direct collection to domestic outlets and international markets.']), 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'commitment',        'label' => 'Our Commitment',            'sort_order' => 5,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Our commitment',        'title' => 'Commercial sustainability with positive social impact']),                                  'created_at' => $now, 'updated_at' => $now],
            ['type' => 'products',          'label' => 'Featured Products',         'sort_order' => 6,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Product catalogue',    'title' => 'Products from farms across Nepal',    'copy' => 'Directly sourced from farmer groups with transparent grading and guaranteed quality.', 'limit' => 6]), 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'farms',             'label' => 'Partner Farms',             'sort_order' => 7,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Farmer origin',        'title' => 'The farms behind your food',          'copy' => 'The cooperatives and smallholder farms behind Munaa produce.',                        'limit' => 4]), 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'testimonials',      'label' => 'Testimonials',              'sort_order' => 8,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Voices from the field','title' => 'Trust & partnership across Nepal',   'copy' => 'Hear directly from farmer cooperatives, local growers and community leaders.',         'limit' => 5]), 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'news',              'label' => 'Latest News',               'sort_order' => 9,  'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Updates & harvest news','title' => 'Latest from Munaa Krishi',           'copy' => 'Field dispatches, farmer milestones, and fresh crop arrivals.',                       'limit' => 3]), 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'ways_to_shop',      'label' => 'Ways to Shop',              'sort_order' => 10, 'is_enabled' => 1, 'settings' => json_encode(['subtitle' => 'Shop Munaa products from', 'title' => 'Ways to shop']),                                                                       'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_sections');
    }
};
