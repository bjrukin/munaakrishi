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
            'global'   => 'Global / Reusable Across All Pages',
        ];
    }

    // Registry of available component types and their display descriptions
    public static function availableTypes(): array
    {
        return [
            'hero'             => ['label' => 'Hero Slider', 'desc' => 'High-impact full width slider with call to action'],
            'who_we_are'       => ['label' => 'Who We Are', 'desc' => 'Visual narrative with photo and organizational overview'],
            'what_we_do'       => ['label' => 'What We Do', 'desc' => 'Value chain highlights with numbered points'],
            'working_strategy' => ['label' => 'Working Strategy Journey', 'desc' => 'Interactive 7-step process from farm to export'],
            'commitment'       => ['label' => 'Our Commitment & Why Munaa', 'desc' => 'Social impact mission in dark forest theme'],
            'products'         => ['label' => 'Featured Products Showcase', 'desc' => 'Dynamic grid of agricultural products with origin tags'],
            'farms'            => ['label' => 'Partner Farms Showcase', 'desc' => 'Cooperative & smallholder farm stories grid'],
            'testimonials'     => ['label' => 'Voices from the Field', 'desc' => 'Reviews and testimonials from farmers & consumers'],
            'news'             => ['label' => 'Latest News & Harvest Stories', 'desc' => 'Field dispatches, updates, and articles grid'],
            'ways_to_shop'     => ['label' => 'Ways to Shop', 'desc' => 'Cards for Marts, Online, Hotline, and Export'],
            'cta_banner'       => ['label' => 'Call to Action Banner', 'desc' => 'Promotional banner with custom title, copy, and button'],
            'rich_content'     => ['label' => 'Custom Rich Content Block', 'desc' => 'Custom heading, subtitle, and paragraph or HTML copy'],
            'vision_mission'   => ['label' => 'Vision & Mission Cards', 'desc' => 'Two interactive cards displaying corporate vision & mission'],
            'contact_box'      => ['label' => 'Quick Contact / Hotline Box', 'desc' => 'Direct contact telephone, WhatsApp, address & outlet info'],
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
