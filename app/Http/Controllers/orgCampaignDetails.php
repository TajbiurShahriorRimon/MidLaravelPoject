<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orgCampaign;
use App\Models\org_Comments;

class orgCampaignDetails extends Controller
{
    public function index($eId){

        $data=orgCampaign::find($eId); 

        $cmtRead =org_Comments::where('eventId', $eId)
                                ->get();     

        return view('org.org_CampaignDetails')->with('data', $data)
                                                ->with('cmt', $cmtRead);
    }
}
