<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('master_data.user.index',['user' => $user]);
    }
}
