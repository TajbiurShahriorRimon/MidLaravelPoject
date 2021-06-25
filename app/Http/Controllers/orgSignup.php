<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use Validator;
use App\Models\org;
use App\Models\org_users;

class orgSignup extends Controller
{
    public function index()
    {
        return view("org.org_signup");
    }

    public function insert(userRequest $req)
    {
        $org = new org();
        $org->name = $req->name;
        $org->email = $req->mail;
        $org->gender = $req->flexRadioDefault;
        $org->address = $req->address;
        $org->phone = $req->phone;
        $org->password = $req->pass;
        $org->image='asset/man.png';
        $org->save();
        

        $users = new org_users();
        $users->userName = $req->name;
        $users->email = $req->mail;
        $users->password = $req->pass;
        $users->status = 1;
        $users->type = 'organizer';
        $users->save();
        

        return redirect('/login');
    }

    public function verification(userRequest $req)
    {

    }
}
