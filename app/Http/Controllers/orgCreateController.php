<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createCampaign;
use App\Models\orgCampaign;

class orgCreateController extends Controller
{
    public function index(){
        return view('org.org_createCampaign');
    }

    public function add(createCampaign $req){

        $orgCampaign = new orgCampaign();
        $orgCampaign->title = $req->title;
        $orgCampaign->startDate = $req->sDate;
        $orgCampaign->endDate = $req->eDate;
        $orgCampaign->targetAmount = $req->rg;
        $orgCampaign->description = $req->desc;
        $orgCampaign->status = 1;
        $orgCampaign->userID =  $req->session()->get('id2');
        $orgCampaign->save();

        return redirect('/org_dashboard');
    }
}
