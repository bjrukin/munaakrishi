<?php
namespace App\Services\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountService {
    public function addAction($request) {
        try {
            $id = Auth::guard('admin')->id();
            $admin = Admin::findOrFail($id);
            $admin->name = $request['name'];
            $admin->save();
            $response['data'] = $admin;
            $response['message'] = 'Profile updated successfully';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function updatePassword($request) {
        try {
            if (Hash::check($request['old_password'], Auth::guard('admin')->user()->password)) {
                Admin::whereId(Auth::guard('admin')->id())->update([
                    'password' => Hash::make($request['new_password']),
                ]);
                $response['message'] = 'Changed password successfully';
                $response['error'] = null;
                $response['status'] = 200;
                return response()->json($response, $response['status']);
            } else {
                $response['message'] = null;
                $response['error'] = 'Old password does not match.';
                $response['status'] = 422;
                return response()->json($response, $response['status']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}