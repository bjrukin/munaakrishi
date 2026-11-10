<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function list()
    {
        $data['nav'] = 'gallery';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Photo Gallery';

        $dbImages = GalleryImage::where('status', 1)->orderBy('order', 'asc')->get();

        if ($dbImages->isNotEmpty()) {
            $data['photos'] = $dbImages->map(function ($img) {
                return [
                    'album' => 'harvest',
                    'image' => (str_starts_with($img->image, 'assets/') || str_starts_with($img->image, 'http'))
                                ? asset($img->image)
                                : asset('storage/uploads/gallery/' . $img->image),
                    'caption' => $img->name,
                    'place' => 'Nepal',
                    'aspect' => 'aspect-[4/3]',
                ];
            })->toArray();
        } else {
            $data['photos'] = [
                [
                    'album' => 'harvest',
                    'image' => asset('assets/images/farms/nepal-terrace-farm.jpg'),
                    'caption' => 'Carrying the first paddy of the season',
                    'place' => 'Sinja, Jumla',
                    'aspect' => 'aspect-[4/5]'
                ],
                [
                    'album' => 'harvest',
                    'image' => asset('assets/images/gallery/farmer-cutting-millet.jpg'),
                    'caption' => 'Apple picking at the Sherchan orchard',
                    'place' => 'Marpha, Mustang',
                    'aspect' => 'aspect-[4/3]'
                ],
                [
                    'album' => 'farm-visits',
                    'image' => asset('assets/images/farms/beekeeper-field.jpg'),
                    'caption' => 'Kamala didi showing a full Chiuri frame',
                    'place' => 'Latikoili, Surkhet',
                    'aspect' => 'aspect-square'
                ],
                [
                    'album' => 'outlets',
                    'image' => asset('assets/images/gallery/outlet-interior.jpg'),
                    'caption' => 'Morning at the Baneshwor outlet',
                    'place' => 'New Baneshwor, Kathmandu',
                    'aspect' => 'aspect-[4/5]'
                ],
            ];
        }

        return view('site.gallery.index', $data);
    }

    public function photos($slug = '')
    {
        return $this->list();
    }
}
