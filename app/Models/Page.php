<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'blocks',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'blocks' => 'array',
        'status' => 'boolean',
    ];

    protected $appends = ['url_image'];

    public function getUrlImageAttribute()
    {
        if (! $this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http')) {
            return asset($this->image);
        }

        return asset('storage/uploads/page/' . $this->image);
    }

    /**
     * Retrieve data for a specific block type from the blocks JSON.
     */
    public function getBlock(string $type): ?array
    {
        $blocks = is_array($this->blocks) ? $this->blocks : (json_decode($this->blocks ?? '[]', true) ?: []);
        foreach ($blocks as $block) {
            if (($block['type'] ?? '') === $type) {
                return $block['data'] ?? [];
            }
        }

        return null;
    }

    /**
     * Update or append data for a specific block type.
     */
    public function setBlock(string $type, array $data): self
    {
        $blocks = is_array($this->blocks) ? $this->blocks : (json_decode($this->blocks ?? '[]', true) ?: []);
        $found = false;

        foreach ($blocks as &$block) {
            if (($block['type'] ?? '') === $type) {
                $block['data'] = $data;
                $found = true;
                break;
            }
        }
        unset($block);

        if (! $found) {
            $blocks[] = [
                'type' => $type,
                'data' => $data,
            ];
        }

        $this->blocks = $blocks;

        return $this;
    }
}
