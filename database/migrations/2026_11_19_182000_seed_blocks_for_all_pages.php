<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $pageBlocks = [
            'home' => [
                ['type' => 'hero', 'is_enabled' => true, 'data' => ['subtitle' => 'Munaa Krishi Limited', 'title' => 'Empowering Nepali Farmers, Connecting Every Table', 'limit' => 5]],
                ['type' => 'who_we_are', 'is_enabled' => true, 'data' => ['subtitle' => 'Who we are', 'title' => 'An integrated agricultural value chain under the munaa brand']],
                ['type' => 'what_we_do', 'is_enabled' => true, 'data' => ['subtitle' => 'Value chain highlights', 'title' => 'What Munaa Krishi does']],
                ['type' => 'products', 'is_enabled' => true, 'data' => ['subtitle' => 'Product catalogue', 'title' => 'Products from farms across Nepal', 'limit' => 8]],
                ['type' => 'farms', 'is_enabled' => true, 'data' => ['subtitle' => 'Farmer origin', 'title' => 'Partner cooperatives and smallholders', 'limit' => 4]],
                ['type' => 'working_strategy', 'is_enabled' => true, 'data' => ['subtitle' => 'Our 7-step working strategy', 'title' => 'From Himalayan soil to export markets']],
                ['type' => 'ways_to_shop', 'is_enabled' => true, 'data' => ['subtitle' => 'Convenient access', 'title' => 'Multiple ways to buy Munaa produce']],
                ['type' => 'testimonials', 'is_enabled' => true, 'data' => ['subtitle' => 'Voices from the field', 'title' => 'Farmers and consumers trust Munaa', 'limit' => 4]],
                ['type' => 'news', 'is_enabled' => true, 'data' => ['subtitle' => 'Field dispatches', 'title' => 'Latest news and activities', 'limit' => 3]],
                ['type' => 'cta_banner', 'is_enabled' => true, 'data' => ['title' => 'Are you a farmer or cooperative looking to partner with Munaa?', 'btn_text' => 'Partner with us →', 'btn_link' => '/contact']],
            ],

            'about' => [
                ['type' => 'who_we_are', 'is_enabled' => true, 'data' => [
                    'label' => 'Who we are',
                    'title' => 'Building a trusted national agricultural brand',
                    'reg_info' => 'Registered under the Companies Act of Nepal · Regd. No. 232466/076/077',
                    'content' => "<p>Munaa Krishi Limited is a social enterprise and agribusiness initiative jointly envisioned by the Non-Resident Nepali Association (NRNA) and the Government of Nepal to transform Nepal's subsistence agriculture into a modern, commercially viable, and sustainable agricultural system.</p>",
                ]],
                ['type' => 'vision_mission', 'is_enabled' => true, 'data' => [
                    'vision_title' => 'Vision',
                    'vision_content' => "To be Nepal's leading integrated and trusted agribusiness company, contribute to Nepal's agricultural transformation and the Sustainable Development Goals (SDGs), and ensure every consumer has access to safe, fresh, healthy, and affordable agricultural products.",
                    'mission_title' => 'Mission',
                    'mission_content' => "To empower farmers and transform Nepal's agriculture by delivering innovative, sustainable, and market-driven agribusiness solutions through strategic partnerships and global collaboration.",
                ]],
                ['type' => 'org_structure', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Governance & Team',
                    'title' => 'Organizational structure',
                    'copy' => 'From the Board of Directors and Advisory Committees down to operations, regional logistics and department leads.',
                    'image' => 'assets/images/about/organization-chart.svg',
                    'caption' => 'Scroll horizontally to view the full organizational structure of Munaa Krishi Limited.',
                ]],
                ['type' => 'aims_to_achieve', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Objectives',
                    'title' => 'What Munaa Krishi aims to achieve',
                    'items' => [
                        'Promote sustainable agricultural development in collaboration with NRNs, government agencies, local governments, farmers, cooperatives, and other stakeholders.',
                        'Promote organic, scientific, and climate-smart agriculture through research, innovation, training, and extension services.',
                        'Engage in the production, processing, storage, distribution, import, export, and marketing of agricultural and livestock products.',
                        'Strengthen farmers through capacity building, market access, value chain development, and good agricultural practices.',
                        'Contribute to employment generation, food security, sustainable economic development, and the growth of Nepal’s agricultural sector.',
                        'Develop a trusted national agricultural brand.',
                    ],
                ]],
                ['type' => 'implementation', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Implementation',
                    'title' => 'Implementation strategies',
                    'items' => [
                        'Expand progressively to major cities throughout Nepal.',
                        'Collaborate with relevant government agencies for certification, quality regulation, and branding.',
                        'Coordinate with three tiers of government for land, infrastructure, insurance, and policy support.',
                    ],
                ]],
                ['type' => 'who_can_invest', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Investment opportunities',
                    'title' => 'Who can invest',
                    'items' => [
                        'Non-Resident Nepalis (NRNs)',
                        'Nepali entrepreneurs',
                        'Farmers and farmer cooperatives',
                        'Financial institutions',
                        'Development partners',
                        'Other interested institutional and individual investors',
                    ],
                ]],
                ['type' => 'board_of_directors', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Company Governance',
                    'title' => 'Board of Directors & Governance',
                    'copy' => 'Overseeing strategic transformation across our national agribusiness initiatives.',
                    'limit' => 4,
                ]],
                ['type' => 'our_team', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Management & Coordination',
                    'title' => 'Leadership and Key Staff',
                    'copy' => 'The people behind our partner farms, logistics network and retail counters.',
                    'limit' => 4,
                ]],
            ],

            'products' => [
                ['type' => 'hero', 'is_enabled' => true, 'data' => ['subtitle' => 'Authentic Produce', 'title' => 'Farm-Fresh Products from Across Nepal', 'limit' => 3]],
                ['type' => 'products', 'is_enabled' => true, 'data' => ['subtitle' => 'Full Catalogue', 'title' => 'Explore Indigenous & Organic Crops', 'limit' => 12]],
                ['type' => 'farms', 'is_enabled' => true, 'data' => ['subtitle' => 'Traceability', 'title' => 'Meet the Farmers Behind These Crops', 'limit' => 4]],
                ['type' => 'ways_to_shop', 'is_enabled' => true, 'data' => ['subtitle' => 'Where to buy', 'title' => 'Visit Munaabazar or Order Online']],
            ],

            'farmer-origin' => [
                ['type' => 'farms', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Farmer origin',
                    'title' => 'The farms behind your food',
                    'copy' => 'The cooperatives and smallholder farms behind Munaa produce.',
                    'limit' => 12,
                ]],
            ],

            'news' => [
                ['type' => 'news', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Field dispatches',
                    'title' => 'News & Activities',
                    'copy' => 'Harvest updates, stories from our partner farms, seasonal produce alerts and community notices.',
                    'limit' => 12,
                ]],
            ],

            'gallery' => [
                ['type' => 'gallery', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Visual Archive',
                    'title' => 'Photo Gallery & Field Moments',
                    'copy' => 'Scenes from our partner farms, seasonal harvests and daily life at Munaa outlets.',
                    'limit' => 18,
                    'image' => null,
                ]],
            ],

            'videos' => [
                ['type' => 'videos', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Visual Stories',
                    'title' => 'Field Videos & Farmer Interviews',
                    'copy' => 'Company introductions, field activities and agricultural stories.',
                    'limit' => 9,
                    'image' => null,
                ]],
                ['type' => 'cta_banner', 'is_enabled' => true, 'data' => [
                    'title' => 'Subscribe to our YouTube Channel',
                    'copy' => 'Watch regular harvest updates, farmer stories and cooking demonstrations with indigenous ingredients.',
                    'btn_text' => 'Visit YouTube Channel',
                    'btn_link' => 'https://www.youtube.com/channel/UC9BHnImyXSO6p79Gxta9wsg',
                    'style' => 'youtube_callout',
                ]],
            ],

            'outlets' => [
                ['type' => 'outlets', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Locations',
                    'title' => 'Outlets & Collection Centers Directory',
                    'copy' => 'Munaabazar Mart locations, customer counters and regional collection hubs.',
                    'limit' => 20,
                    'image' => null,
                ]],
            ],

            'faq' => [
                ['type' => 'faqs', 'is_enabled' => true, 'data' => [
                    'subtitle' => 'Help Center',
                    'title' => 'Answers to common questions',
                    'copy' => 'Find answers about how we source from local farms, our retail outlets, organic certifications, and wholesale partnerships.',
                    'limit' => 20,
                    'image' => null,
                ]],
                ['type' => 'cta_banner', 'is_enabled' => true, 'data' => [
                    'title' => 'Still have a question?',
                    'copy' => 'We are here to help farmers, consumers and institutional partners.',
                    'btn_text' => 'Contact our team',
                    'btn_link' => '/contact',
                    'style' => 'leaf_soft',
                ]],
            ],

            'contact' => [
                ['type' => 'hero', 'is_enabled' => true, 'data' => ['subtitle' => 'Get in Touch', 'title' => 'Contact Munaa Krishi Limited', 'limit' => 3]],
                ['type' => 'contact_box', 'is_enabled' => true, 'data' => ['subtitle' => 'Head Office & Helpdesk', 'title' => 'Contact Information & Inquiries']],
                ['type' => 'outlets', 'is_enabled' => true, 'data' => ['subtitle' => 'Visit in Person', 'title' => 'Regional Outlets & Customer Counters']],
            ],

            'board-of-directors' => [
                ['type' => 'hero', 'is_enabled' => true, 'data' => ['subtitle' => 'Corporate Governance', 'title' => 'Board of Directors', 'limit' => 3]],
                ['type' => 'board_of_directors', 'is_enabled' => true, 'data' => ['subtitle' => 'Company Governance', 'title' => 'Meet the Board of Directors', 'limit' => 12]],
            ],

            'our-team' => [
                ['type' => 'hero', 'is_enabled' => true, 'data' => ['subtitle' => 'People Behind Munaa', 'title' => 'Our Management & Field Team', 'limit' => 3]],
                ['type' => 'our_team', 'is_enabled' => true, 'data' => ['subtitle' => 'Management & Staff', 'title' => 'Leadership and Key Staff', 'limit' => 12]],
            ],
        ];

        foreach ($pageBlocks as $slug => $blocks) {
            DB::table('pages')
                ->where('slug', $slug)
                ->update([
                    'blocks' => json_encode($blocks),
                    'updated_at' => now(),
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
