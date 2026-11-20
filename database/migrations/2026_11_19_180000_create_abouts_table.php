<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // 1. Who We Are / About Us
            $table->string('who_we_are_label')->nullable();
            $table->string('who_we_are_title')->nullable();
            $table->string('who_we_are_reg_info')->nullable();
            $table->longText('who_we_are_content')->nullable();
            $table->string('who_we_are_image')->nullable();

            // 2. Vision & Mission
            $table->string('vision_title')->nullable();
            $table->text('vision_content')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_content')->nullable();

            // 3. Organizational Structure
            $table->string('org_structure_label')->nullable();
            $table->string('org_structure_title')->nullable();
            $table->text('org_structure_subtitle')->nullable();
            $table->string('org_structure_image')->nullable();
            $table->string('org_structure_caption')->nullable();

            // 4. Aims to achieve (Objectives)
            $table->string('aims_label')->nullable();
            $table->string('aims_title')->nullable();
            $table->json('aims_content')->nullable();

            // 5. Implementation strategies
            $table->string('implementation_label')->nullable();
            $table->string('implementation_title')->nullable();
            $table->json('implementation_content')->nullable();

            // 6. Who can invest (Investment opportunities)
            $table->string('investment_label')->nullable();
            $table->string('investment_title')->nullable();
            $table->json('investment_content')->nullable();

            // Meta SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
        });

        // Seed with current website content
        DB::table('abouts')->insert([
            'who_we_are_label' => 'Who we are',
            'who_we_are_title' => 'Building a trusted national agricultural brand',
            'who_we_are_reg_info' => 'Registered under the Companies Act of Nepal · Regd. No. 232466/076/077',
            'who_we_are_content' => "<p>Munaa Krishi Limited is a social enterprise and agribusiness initiative jointly envisioned by the Non-Resident Nepali Association (NRNA) and the Government of Nepal to transform Nepal's subsistence agriculture into a modern, commercially viable, and sustainable agricultural system. The company is registered under the Companies Act of Nepal, Regd. No. 232466/076/077, introducing technologies tested around the world.</p><p>The company aims to establish an integrated agricultural value chain by collecting, processing, branding, and marketing agricultural products under the munaa brand. It seeks to bridge the gap between producers and consumers, ensure fair prices and reliable markets for farmers, provide consumers with safe and high-quality food at affordable prices, reduce post-harvest losses, strengthen Nepal’s agricultural economy, and promote high-value agricultural products in national and international markets.</p>",
            'who_we_are_image' => null,

            'vision_title' => 'Vision',
            'vision_content' => "To be Nepal's leading integrated and trusted agribusiness company, contribute to Nepal's agricultural transformation and the Sustainable Development Goals (SDGs), and ensure every consumer has access to safe, fresh, healthy, and affordable agricultural products.",

            'mission_title' => 'Mission',
            'mission_content' => "To empower farmers and transform Nepal's agriculture by delivering innovative, sustainable, and market-driven agribusiness solutions through strategic partnerships and global collaboration.",

            'org_structure_label' => 'Governance & Team',
            'org_structure_title' => 'Organizational structure',
            'org_structure_subtitle' => 'From the Board of Directors and Advisory Committees down to operations, regional logistics and department leads.',
            'org_structure_image' => 'assets/images/about/organization-chart.svg',
            'org_structure_caption' => 'Scroll horizontally to view the full organizational structure of Munaa Krishi Limited.',

            'aims_label' => 'Objectives',
            'aims_title' => 'What Munaa Krishi aims to achieve',
            'aims_content' => json_encode([
                'Promote sustainable agricultural development in collaboration with NRNs, government agencies, local governments, farmers, cooperatives, and other stakeholders.',
                'Promote organic, scientific, and climate-smart agriculture through research, innovation, training, and extension services.',
                'Engage in the production, processing, storage, distribution, import, export, and marketing of agricultural and livestock products.',
                'Strengthen farmers through capacity building, market access, value chain development, and good agricultural practices.',
                'Contribute to employment generation, food security, sustainable economic development, and the growth of Nepal’s agricultural sector.',
                'Develop a trusted national agricultural brand.'
            ]),

            'implementation_label' => 'Implementation',
            'implementation_title' => 'Implementation strategies',
            'implementation_content' => json_encode([
                'Expand progressively to major cities throughout Nepal.',
                'Collaborate with relevant government agencies for certification, quality regulation, and branding.',
                'Coordinate with three tiers of government for land, infrastructure, insurance, and policy support.'
            ]),

            'investment_label' => 'Investment opportunities',
            'investment_title' => 'Who can invest',
            'investment_content' => json_encode([
                'Non-Resident Nepalis (NRNs)',
                'Nepali entrepreneurs',
                'Farmers and farmer cooperatives',
                'Financial institutions',
                'Development partners',
                'Other interested institutional and individual investors'
            ]),

            'meta_title' => 'About Munaa Krishi Limited | Vision, Mission & Structure',
            'meta_description' => 'Learn about Munaa Krishi Limited, our mission, vision, organizational structure, objectives, implementation strategies, and investment opportunities.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
