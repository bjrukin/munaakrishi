<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\AuthRequest;
use App\Http\Requests\Admin\Auth\OtpRequest;
use App\Http\Requests\Admin\Auth\SavePasswordRequest;
use App\Services\Admin\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct(protected AuthService $service)
    {

    }

    public function login()
    {
        Session::regenerateToken();
        if (Auth::guard('admin')->id()) {
            return redirect(route('admin.dashboard'));
        }
        $page_title = 'Login';
        return view('admin.auth.login', compact('page_title'));
    }

    public function checkLogin(AuthRequest $request)
    {
        return $this->service->checkLogin($request->validated());
    }

    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('admin.auth.forgot_password', compact('page_title'));
    }

    public function otp(OtpRequest $request)
    {
        return $this->service->otp($request->validated());
    }

    public function resetPassword()
    {
        $page_title = 'Reset Password';
        return view('admin.auth.reset_password', compact('page_title'));
    }

    public function savePassword(SavePasswordRequest $request)
    {
        return $this->service->savePassword($request->validated());
    }

}
