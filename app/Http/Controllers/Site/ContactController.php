<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactInquiryRequest;
use App\Models\Banner;
use App\Models\Inquiry;
use App\Models\Office;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller {

    public function index() {
        $data['nav'] = 'contact';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Contact Us';
        $data['banner'] = Banner::where(['name' => 'Contact', 'status' => 1])->first();
        $data['offices'] = Office::where('status', '1')->orderBy('order', 'asc')->get();
        return view('site.contact.index', $data);
    }

    public function store(ContactInquiryRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $type = $validated['type'];

        $details = $type === 'farmer'
            ? collect($validated)->only([
                'district', 'village', 'group_type', 'members', 'crops', 'land',
                'land_unit', 'harvest', 'harvest_unit', 'month', 'practice',
            ])->all()
            : null;

        Inquiry::create([
            'type' => $type,
            'name' => $validated['name'],
            'phone' => preg_replace('/[\s-]/', '', $validated['phone']),
            'email' => $validated['email'] ?? null,
            'subject' => $type === 'farmer' ? 'Farmer Partnership Application' : $validated['subject'],
            'message' => $validated['message'] ?? null,
            'details' => $details,
            'status' => 'unread',
        ]);

        return response()->json([
            'message' => 'Thank you. Your inquiry has been submitted successfully.',
        ], 201);
    }

}
