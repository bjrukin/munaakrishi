<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Farm;
use App\Models\Product;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function index(Request $request)
    {
        $data['nav'] = 'farms';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Partner Farms';

        $dbFarms = Farm::where('status', 1)->orderBy('order', 'asc')->get();

        $data['farms'] = $dbFarms->map(function ($f) {
            return [
                'id' => $f->id,
                'name' => $f->name,
                'nepali' => $f->nepali_name ?? $f->name,
                'slug' => $f->slug,
                'province' => $f->province . (str_ends_with($f->province, 'Province') ? '' : ' Province'),
                'district' => $f->district ?? 'Nepal',
                'altitude' => $f->altitude ?? 'High altitude',
                'elevation' => $f->altitude ?? 'High altitude',
                'practice' => $f->practice ?? 'Organic',
                'practices' => array_map('trim', explode(',', $f->practice ?? 'Organic')),
                'produce' => array_map('trim', explode(',', $f->produce ?? 'Seasonal Crops')),
                'farmers' => $f->farmers_count,
                'households' => $f->farmers_count . ' farmer families',
                'image' => $f->url_image,
                'description' => $f->description ?? '',
                'summary' => $f->description ?? '',
            ];
        })->toArray();

        return view('site.farm.index', $data);
    }

    public function detail($slug)
    {
        $farmModel = Farm::where('status', 1)->where('slug', $slug)->first();

        if (!$farmModel) {
            $farmModel = Farm::where('status', 1)->first();
            if (!$farmModel) {
                abort(404);
            }
        }

        $practices = array_map('trim', explode(',', $farmModel->practice ?? 'Organic'));
        $produceList = array_map('trim', explode(',', $farmModel->produce ?? 'Seasonal Produce'));

        $suppliedProducts = Product::where('status', 1)
            ->where(function ($q) use ($farmModel) {
                $q->where('district', $farmModel->district)
                  ->orWhere('id', '>', 0);
            })
            ->take(3)
            ->get()
            ->map(function ($p) {
                return [
                    'name' => $p->name,
                    'nepali' => $p->nepali_name ?? $p->name,
                    'slug' => $p->slug,
                    'harvest' => 'Seasonal Pick',
                ];
            })->toArray();

        $farm = [
            'id' => $farmModel->id,
            'slug' => $farmModel->slug,
            'name' => $farmModel->name,
            'nepali' => $farmModel->nepali_name ?? $farmModel->name,
            'province' => $farmModel->province . (str_ends_with($farmModel->province, 'Province') ? '' : ' Province'),
            'district' => $farmModel->district ?? 'Nepal',
            'village' => ($farmModel->district ?? 'Nepal') . ' Regional Farming Zone',
            'altitude' => $farmModel->altitude ?? 'High altitude',
            'elevation' => $farmModel->altitude ?? 'High altitude',
            'practice' => $farmModel->practice ?? 'Organic',
            'practices' => $practices,
            'produce' => $produceList,
            'products' => $suppliedProducts,
            'farmers' => $farmModel->farmers_count,
            'households' => $farmModel->farmers_count . ' farmer families',
            'image' => $farmModel->url_image,
            'description' => $farmModel->description ?? '',
            'summary' => $farmModel->description ?? '',
            'partnership_since' => '2020',
            'partner_since' => '2020',
            'story' => [
                $farmModel->description ?? 'Generational farming community working in harmony with local ecosystems to produce nutrient-rich crops.',
                'Through the Munaa Krishi value-chain partnership, smallholder producers here receive guaranteed buy-back pricing, modern non-toxic sorting guidance, and direct market access across urban marts and institutional supply chains.'
            ],
        ];

        $otherModels = Farm::where('status', 1)
            ->where('id', '!=', $farmModel->id)
            ->take(3)
            ->get();

        $other_farms = $otherModels->map(function ($f) {
            return [
                'name' => $f->name,
                'nepali' => $f->nepali_name ?? $f->name,
                'slug' => $f->slug,
                'province' => $f->province . (str_ends_with($f->province, 'Province') ? '' : ' Province'),
                'district' => $f->district ?? 'Nepal',
                'image' => $f->url_image,
                'description' => $f->description ?? '',
                'summary' => $f->description ?? '',
            ];
        })->toArray();

        $data['nav'] = 'farms';
        $data['metahead'] = 'seo';
        $data['page_title'] = $farm['name'];
        $data['farm'] = $farm;
        $data['other_farms'] = $other_farms;

        return view('site.farm.detail', $data);
    }
}
