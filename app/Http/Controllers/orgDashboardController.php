<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orgCampaign;

class orgDashboardController extends Controller
{
    public function index(Request $req)
    {
    $data=orgCampaign::all();
        // print_r($data[0]->title);
    return view('org.org_dashboard')->with('eventList', $data);
    
    }
}
