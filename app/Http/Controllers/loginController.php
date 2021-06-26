<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\loginRequest;
use App\Models\org;
use App\Models\org_users;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function verification(loginRequest $req){
        // $result=org::all();
        // print_r($result[0]->name);

        $data=org::where('email', $req->mail)
                    ->where('password', $req->pass)
                    ->get();

        $data2=org_users::where('email', $req->mail)
                        ->where('password', $req->pass)
                        ->get();
        
        if (count($data)>0 || count($data2)>0) {
            $type=$data2[0]->type;
            if ($type=='user') {
                $req->session()->put('id1', $data[0]->id);
                $req->session()->put('id2', $data2[0]->userId);
                $req->session()->put('name', $data[0]->name);
                $req->session()->put('email', $data[0]->email);
                $req->session()->put('gender', $data[0]->gender);
                $req->session()->put('address', $data[0]->address);
                $req->session()->put('phone', $data[0]->phone);
                return redirect('/org_dashboard');
            }
        }
        else{
            $req->session()->flash('msg','invalid user !');
            return redirect('/login') ->withInput();
        }
    }

}
