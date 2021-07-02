<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerRequest;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('SELECT * from users WHERE type <> "admin"');

        $data = json_decode(json_encode($result), true);

        return view('user.userList')->with('result', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Users::find($id);
        return view('user.userProfile')->with('user', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id, $status)
    {
        //if status is 1, that is active, we have to change to inactive, else vice versa
        if($status == 1){
            DB::update('update users set status = 0 where userId = ?', [$id]);
            return redirect('/user/profile/'.$id);
        }
        else{
            DB::update('update users set status = 1 where userId = ?', [$id]);
            return redirect('/user/profile/'.$id);
        }
    }

    public function addManager(ManagerRequest $request){
        $email = $request->email;
        $result = DB::select("select * from users where email = ?", [$email]);

        if(count($result) > 0){
            return redirect('/addManager')->with('emailExistsMsg', "This email already exists. Create a new and Unique one!");
        }

        DB::insert("INSERT INTO users (userName, email, password, status, type)
                            VALUES ('$request->name', '$request->email', '$request->password', '1', 'manager')");
        return redirect('/userList')->with('message', "Manager Account Created Successfully");
    }
}
