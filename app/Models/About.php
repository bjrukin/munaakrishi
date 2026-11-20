<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'who_we_are_label',
        'who_we_are_title',
        'who_we_are_reg_info',
        'who_we_are_content',
        'who_we_are_image',

        'vision_title',
        'vision_content',

        'mission_title',
        'mission_content',

        'org_structure_label',
        'org_structure_title',
        'org_structure_subtitle',
        'org_structure_image',
        'org_structure_caption',

        'aims_label',
        'aims_title',
        'aims_content',

        'implementation_label',
        'implementation_title',
        'implementation_content',

        'investment_label',
        'investment_title',
        'investment_content',

        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'aims_content' => 'array',
        'implementation_content' => 'array',
        'investment_content' => 'array',
    ];

    protected $appends = [
        'url_org_structure_image',
        'url_who_we_are_image',
    ];

    public function getUrlOrgStructureImageAttribute()
    {
        if (! $this->org_structure_image) {
            return asset('assets/images/about/organization-chart.svg');
        }

        if (str_starts_with($this->org_structure_image, 'assets/') || str_starts_with($this->org_structure_image, 'http')) {
            return asset($this->org_structure_image);
        }

        return asset('storage/uploads/about/' . $this->org_structure_image);
    }

    public function getUrlWhoWeAreImageAttribute()
    {
        if (! $this->who_we_are_image) {
            return null;
        }

        if (str_starts_with($this->who_we_are_image, 'assets/') || str_starts_with($this->who_we_are_image, 'http')) {
            return asset($this->who_we_are_image);
        }

        return asset('storage/uploads/about/' . $this->who_we_are_image);
    }
}
