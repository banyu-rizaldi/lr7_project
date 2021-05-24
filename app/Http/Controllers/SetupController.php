<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    //

    public function index()
    {
        $setup = Setup::get();
        return view('konfigurasi/setup', ['setup' => $setup]);
    }
}
