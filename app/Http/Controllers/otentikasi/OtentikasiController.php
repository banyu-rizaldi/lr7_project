<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OtentikasiController extends Controller
{
    public function index()
    {
        return view('otentikasi.login');
    }

    
    public function login(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha'
        ],[
            'captcha' => 'capcha dont match',
        ]);
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'AppsName' => 'icare',
            'AppsToken' => '4FC83A7A704E0103363F10DDFA0C41FADB25CBF2157AFB3D92453604A54B558B'
        ])->post('https://auth.telkom.co.id/v2/account/validate', [
            'username' => $request->username,
            'password' => $request->password
        ]);
        
        // dd(json_decode($response));
        // dd(session());

        if ($response['code'] == '200') {
            session([
                'name' => $request->username,
                'auth' => true
            ]);

            return redirect('/dashboard')->with('success', 'Account has been validated');

        }elseif ($response['code'] == '401'){

            return redirect('/')->with('error', 'Invalid or missing credential');

        }else {

            return redirect('/')->with('error', 'Account not found, please  check your account combination');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('message', 'Account has been logout');
    }

}
