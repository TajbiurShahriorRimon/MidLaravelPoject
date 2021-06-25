<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orgCreateController extends Controller
{
    public function index(){
        return view('org.org_createCampaign');
    }
}
