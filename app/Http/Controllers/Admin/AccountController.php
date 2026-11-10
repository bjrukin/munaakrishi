<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\ProfileRequest;
use App\Http\Requests\Admin\Account\ChangePasswordRequest;
use App\Services\Admin\AccountService;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function __construct(protected AccountService $service)
    {
    }
    public function index()
    {
        $data['nav'] = 'account';
        $data['sub_nav'] = '';
        $data['page_title'] = 'My Account';
		$data['user'] = Auth::guard('admin')->user();
        return view('admin.account.index',  $data);
    }

    public function addAction(ProfileRequest $request)
    {
        return $this->service->addAction($request->validated());
    }
    public function updatePassword(ChangePasswordRequest $request)
    {
        return $this->service->updatePassword($request->validated());
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }


}
