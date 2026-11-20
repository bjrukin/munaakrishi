<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\Page;

class GalleryController extends Controller
{
    public function list()
    {
        $data['nav'] = 'gallery';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Photo Gallery';

        // Load page block data
        $page = Page::where('slug', 'gallery')->first();
        $galleryBlock = $page ? $page->getBlock('gallery') : null;

        $data['galleryBlock'] = $galleryBlock;
        $data['page']         = $page;

        // Apply limit from block data
        $limit = (int) ($galleryBlock['limit'] ?? 24);

        // Eager-load gallery for folder resolution
        $dbImages = GalleryImage::with('gallery')
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->limit($limit)
            ->get();

        if ($dbImages->isNotEmpty()) {
            $data['photos'] = $dbImages->map(function ($img) {
                return [
                    'album'   => $img->category ?? 'harvest',
                    'image'   => $img->url_image,          // resolved by model accessor
                    'caption' => $img->caption ?: ($img->name ?? ''),
                    'place'   => $img->location ?? 'Nepal',
                    'aspect'  => 'aspect-[4/3]',
                ];
            })->toArray();
        } else {
            $data['photos'] = $this->fallbackPhotos();
        }

        return view('site.gallery.index', $data);
    }

    public function photos($slug = '')
    {
        return $this->list();
    }

    private function fallbackPhotos(): array
    {
        return [
            [
                'album'   => 'harvest',
                'image'   => asset('assets/images/farms/apple-orchard.jpg'),
                'caption' => 'Apple harvest at the Sherchan orchard',
                'place'   => 'Marpha, Mustang',
                'aspect'  => 'aspect-[4/3]',
            ],
            [
                'album'   => 'harvest',
                'image'   => asset('assets/images/farms/kanyam-tea.jpg'),
                'caption' => 'Picking organic tea leaves at dawn',
                'place'   => 'Kanyam, Ilam',
                'aspect'  => 'aspect-[4/5]',
            ],
            [
                'album'   => 'outlets',
                'image'   => asset('assets/images/gallery/outlet-interior.jpg'),
                'caption' => 'Morning at the Baneshwor Munaabazar',
                'place'   => 'New Baneshwor, Kathmandu',
                'aspect'  => 'aspect-[4/3]',
            ],
            [
                'album'   => 'farm-visits',
                'image'   => asset('assets/images/farms/beekeeper-field.jpg'),
                'caption' => 'Kamala didi and her Chiuri bee colony',
                'place'   => 'Latikoili, Surkhet',
                'aspect'  => 'aspect-square',
            ],
            [
                'album'   => 'community',
                'image'   => asset('assets/images/farms/nepal-terrace-farm.jpg'),
                'caption' => 'Terrace rice fields of the Himalayas',
                'place'   => 'Sinja, Jumla',
                'aspect'  => 'aspect-[4/5]',
            ],
        ];
    }
}
