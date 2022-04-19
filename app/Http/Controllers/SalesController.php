<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Details;

class SalesController extends Controller
{

    public function index()
    {

        return view('sales.index');
    } 


}
