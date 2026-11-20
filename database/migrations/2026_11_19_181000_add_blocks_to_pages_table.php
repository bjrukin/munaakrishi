<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('pages', 'blocks')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->json('blocks')->nullable()->after('description');
            });
        }

        // Set standard slugs for existing pages if not set
        $slugMap = [
            1 => 'home',
            2 => 'about',
            3 => 'products',
            4 => 'farmer-origin',
            5 => 'news',
            6 => 'gallery',
            7 => 'videos',
            8 => 'outlets',
            9 => 'faq',
            10 => 'contact',
            11 => 'privacy-policy',
            12 => 'cookie-policy',
            13 => 'chairman-message',
            14 => 'board-of-directors',
            15 => 'our-team',
        ];

        foreach ($slugMap as $id => $slug) {
            DB::table('pages')->where('id', $id)->whereNull('slug')->update(['slug' => $slug]);
        }

        // Seed structured blocks for the 'about' page
        $aboutBlocks = [
            [
                'type' => 'who_we_are',
                'data' => [
                    'label' => 'Who we are',
                    'title' => 'Building a trusted national agricultural brand',
                    'reg_info' => 'Registered under the Companies Act of Nepal · Regd. No. 232466/076/077',
                    'content' => "<p>Munaa Krishi Limited is a social enterprise and agribusiness initiative jointly envisioned by the Non-Resident Nepali Association (NRNA) and the Government of Nepal to transform Nepal's subsistence agriculture into a modern, commercially viable, and sustainable agricultural system. The company is registered under the Companies Act of Nepal, Regd. No. 232466/076/077, introducing technologies tested around the world.</p><p>The company aims to establish an integrated agricultural value chain by collecting, processing, branding, and marketing agricultural products under the munaa brand. It seeks to bridge the gap between producers and consumers, ensure fair prices and reliable markets for farmers, provide consumers with safe and high-quality food at affordable prices, reduce post-harvest losses, strengthen Nepal’s agricultural economy, and promote high-value agricultural products in national and international markets.</p>",
                    'image' => null,
                ],
            ],
            [
                'type' => 'vision_mission',
                'data' => [
                    'vision_title' => 'Vision',
                    'vision_content' => "To be Nepal's leading integrated and trusted agribusiness company, contribute to Nepal's agricultural transformation and the Sustainable Development Goals (SDGs), and ensure every consumer has access to safe, fresh, healthy, and affordable agricultural products.",
                    'mission_title' => 'Mission',
                    'mission_content' => "To empower farmers and transform Nepal's agriculture by delivering innovative, sustainable, and market-driven agribusiness solutions through strategic partnerships and global collaboration.",
                ],
            ],
            [
                'type' => 'organizational_structure',
                'data' => [
                    'label' => 'Governance & Team',
                    'title' => 'Organizational structure',
                    'subtitle' => 'From the Board of Directors and Advisory Committees down to operations, regional logistics and department leads.',
                    'image' => 'assets/images/about/organization-chart.svg',
                    'caption' => 'Scroll horizontally to view the full organizational structure of Munaa Krishi Limited.',
                ],
            ],
            [
                'type' => 'aims_to_achieve',
                'data' => [
                    'label' => 'Objectives',
                    'title' => 'What Munaa Krishi aims to achieve',
                    'items' => [
                        'Promote sustainable agricultural development in collaboration with NRNs, government agencies, local governments, farmers, cooperatives, and other stakeholders.',
                        'Promote organic, scientific, and climate-smart agriculture through research, innovation, training, and extension services.',
                        'Engage in the production, processing, storage, distribution, import, export, and marketing of agricultural and livestock products.',
                        'Strengthen farmers through capacity building, market access, value chain development, and good agricultural practices.',
                        'Contribute to employment generation, food security, sustainable economic development, and the growth of Nepal’s agricultural sector.',
                        'Develop a trusted national agricultural brand.'
                    ],
                ],
            ],
            [
                'type' => 'implementation_strategies',
                'data' => [
                    'label' => 'Implementation',
                    'title' => 'Implementation strategies',
                    'items' => [
                        'Expand progressively to major cities throughout Nepal.',
                        'Collaborate with relevant government agencies for certification, quality regulation, and branding.',
                        'Coordinate with three tiers of government for land, infrastructure, insurance, and policy support.'
                    ],
                ],
            ],
            [
                'type' => 'who_can_invest',
                'data' => [
                    'label' => 'Investment opportunities',
                    'title' => 'Who can invest',
                    'items' => [
                        'Non-Resident Nepalis (NRNs)',
                        'Nepali entrepreneurs',
                        'Farmers and farmer cooperatives',
                        'Financial institutions',
                        'Development partners',
                        'Other interested institutional and individual investors'
                    ],
                ],
            ],
        ];

        DB::table('pages')
            ->where('slug', 'about')
            ->orWhere('id', 2)
            ->update([
                'slug' => 'about',
                'blocks' => json_encode($aboutBlocks),
                'updated_at' => now(),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('pages', 'blocks')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('blocks');
            });
        }
    }
};
