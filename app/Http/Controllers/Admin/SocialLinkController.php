<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sociallink\StoreRequest;
use App\Models\SocialLink;
use App\Services\Admin\SocialLinkService;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{

    public function __construct(protected SocialLinkService $service)
    {
    }

    public function index(Request $request)
    {
        $data['nav'] = 'sociallink';
        $data['sub_nav'] = 'sociallink';
        $data['page_title'] = 'Social Link';

        $data['row'] = SocialLink::first();
        $data['action'] = route('admin.sociallink.store');
        return view('admin.sociallink.form', $data);
    }

    public function store(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }
}
