<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class HomepageSection extends Model
{
    protected $fillable = ['page', 'type', 'label', 'sort_order', 'is_enabled', 'settings'];

    protected $casts = [
        'settings'   => 'array',
        'is_enabled' => 'boolean',
    ];

    // Standard list of pages that can have dynamic components
    public static function availablePages(): array
    {
        return [
            'home'     => 'Homepage',
            'about'    => 'About Us / Who We Are',
            'contact'  => 'Contact Us',
            'products' => 'Products Page',
            'farms'    => 'Partner Farms Page',
            'outlets'  => 'Outlets & Supermarkets',
            'news'     => 'News & Harvest Stories',
            'faq'      => 'FAQ Page',
            'videos'   => 'Videos Page',
            'gallery'  => 'Photo Gallery Page',
            'board-of-directors' => 'Board of Directors Page',
            'our-team' => 'Our Team Page',
            'global'   => 'Global / Reusable Across All Pages',
        ];
    }

    // Registry of available component types and their display descriptions
    public static function availableTypes(): array
    {
        return [
            'hero'               => ['label' => 'Banners / Hero Slider', 'desc' => 'High-impact full width slider (Dynamic from Banners table)', 'source' => 'banners'],
            'products'           => ['label' => 'Products Showcase', 'desc' => 'Dynamic grid of agricultural products (Dynamic from Products table)', 'source' => 'products'],
            'farms'              => ['label' => 'Farmer Origin / Partner Farms', 'desc' => 'Cooperative & smallholder farm stories (Dynamic from Farms table)', 'source' => 'farms'],
            'faqs'               => ['label' => 'FAQs Accordion', 'desc' => 'Frequently asked questions & answers (Dynamic from FAQs table)', 'source' => 'faqs'],
            'outlets'            => ['label' => 'Outlets & Branches Directory', 'desc' => 'Locations, customer counters, call & maps (Dynamic from Offices table)', 'source' => 'offices'],
            'videos'             => ['label' => 'Videos Showcase', 'desc' => 'Harvest stories & company videos (Dynamic from Videos table)', 'source' => 'videos'],
            'gallery'            => ['label' => 'Photo Gallery & Albums', 'desc' => 'Photo albums and visual moments (Dynamic from Galleries table)', 'source' => 'galleries'],
            'news'               => ['label' => 'News & Activities', 'desc' => 'Field dispatches, updates, and articles (Dynamic from Notices table)', 'source' => 'notices'],
            'our_team'           => ['label' => 'Our Team', 'desc' => 'Management, coordination & key staff (Dynamic from Teams table)', 'source' => 'teams'],
            'board_of_directors' => ['label' => 'Board of Directors', 'desc' => 'Company governance & leadership (Dynamic from Leadership table)', 'source' => 'leaderships'],
            'testimonials'       => ['label' => 'Voices from the Field', 'desc' => 'Reviews and testimonials from farmers & consumers', 'source' => 'testimonials'],
            'who_we_are'         => ['label' => 'Who We Are', 'desc' => 'Visual narrative with registration info and organizational overview', 'source' => 'content'],
            'vision_mission'     => ['label' => 'Vision & Mission Cards', 'desc' => 'Two interactive cards displaying corporate vision & mission', 'source' => 'content'],
            'org_structure'      => ['label' => 'Organizational Structure Chart', 'desc' => 'Scrollable organizational chart graphic and caption', 'source' => 'content'],
            'aims_to_achieve'    => ['label' => 'Aims to Achieve (Objectives)', 'desc' => 'Numbered list of institutional objectives and goals', 'source' => 'content'],
            'implementation'     => ['label' => 'Implementation Strategies', 'desc' => 'Bullet points detailing nationwide implementation', 'source' => 'content'],
            'who_can_invest'     => ['label' => 'Who Can Invest', 'desc' => 'Target investor categories and eligibility', 'source' => 'content'],
            'what_we_do'         => ['label' => 'What We Do', 'desc' => 'Value chain highlights with numbered points', 'source' => 'content'],
            'working_strategy'   => ['label' => 'Working Strategy Journey', 'desc' => 'Interactive 7-step process from farm to export', 'source' => 'content'],
            'commitment'         => ['label' => 'Our Commitment & Why Munaa', 'desc' => 'Social impact mission in dark forest theme', 'source' => 'content'],
            'ways_to_shop'       => ['label' => 'Ways to Shop', 'desc' => 'Cards for Marts, Online, Hotline, and Export', 'source' => 'content'],
            'cta_banner'         => ['label' => 'Call to Action Banner', 'desc' => 'Promotional banner with custom title, copy, and button', 'source' => 'content'],
            'rich_content'       => ['label' => 'Custom Rich Content Block', 'desc' => 'Custom heading, subtitle, and paragraph or HTML copy', 'source' => 'content'],
            'contact_box'        => ['label' => 'Quick Contact / Hotline Box', 'desc' => 'Direct contact telephone, WhatsApp, address & outlet info', 'source' => 'content'],
        ];
    }

    // Helper: get a specific setting key with optional default
    public function setting(string $key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }

    // Get active sections for a specific page ordered by sort_order
    public static function getForPage(string $page = 'home'): Collection
    {
        return static::where('is_enabled', true)
            ->where(function ($query) use ($page) {
                $query->where('page', $page)
                      ->orWhere('page', 'global');
            })
            ->orderBy('sort_order', 'asc')
            ->get();
    }
}
