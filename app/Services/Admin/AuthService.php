<?php
namespace App\Services\Admin;

use App\Jobs\Admin\OtpPasswordJob;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function checkLogin($request)
    {
        try {
            $fieldType = filter_var($request['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $check_data = array($fieldType => $request['username'], 'password' => $request['password']);
            if (Auth::guard('admin')->attempt($check_data)) {
                $response['message'] = 'Login sucessfully.';
                $response['error'] = null;
                $response['status'] = 200;
                return response()->json($response, $response['status']);
            } else {
                $response['error'] = 'Username or Password Not Matched!';
                $response['status'] = 406;
                return response()->json($response, $response['status']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function otp($request)
    {
        try {
            DB::table('password_reset_tokens')->where('email', $request['email'])->delete();
            $otp = passwordResetOtp();
            DB::table('password_reset_tokens')->insert([
                'email' => $request['email'],
                'token' => $otp,
                'created_at' => Carbon::now(),
            ]);

            $admin = Admin::where('email', $request['email'])->first();
            $email_data = [
                'otp' => $otp,
                'name' => $admin->name,
                'email' => $admin->email,
                'subject' => 'Reset your Zoot password',
            ];

            $jobToDispatch = (new OtpPasswordJob($email_data))->delay(Carbon::now()->addSeconds(1));
            dispatch($jobToDispatch);
            $response['message'] = 'We have mailed OTP to  reset password.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function savePassword($request)
    {
        try {
            $updatePassword = DB::table('password_reset_tokens')
                ->where('token', $request['otp'])
                ->first();
            if ($updatePassword) {
                Admin::where('email', $updatePassword->email)->update([
                    'password' => Hash::make($request['new_password']),
                ]);
                DB::table('password_reset_tokens')
                    ->where('email', $updatePassword->email)
                    ->delete();
                $response['message'] = 'Passsword changed sucessfully.';
                $response['error'] = null;
                $response['status'] = 200;
                return response()->json($response, $response['status']);
            } else {
                $response['message'] = 'OTP entered is incorrect';
                $response['status'] = 422;
                $response['error'] = true;
                return response()->json($response, $response['status']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
