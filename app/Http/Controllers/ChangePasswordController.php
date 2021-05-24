<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('password.change-password');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $old_password_db = auth()->user()->password;
        $user_id = auth()->user()->id;


        if (Hash::check($request->input('old_password'), $old_password_db)) {
            $user = User::find($user_id);
            $user->password = Hash::make($request->input('password'));
            
            if ($user->save()) {
                return redirect()->back()->with('success', 'ganti password success');
            }else{
                return redirect()->back()->with('failed', 'password old invalid');
            }

        }else{
            return redirect()->back()->with('failed', 'password old invalid');
        }
    }

}
