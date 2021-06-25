<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orgDashboardController extends Controller
{
    public function index(Request $req)
    {

    return view('org.org_dashboard');
    
    }
}
