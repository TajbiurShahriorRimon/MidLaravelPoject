<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function adminNotification(){
        $result = DB::select("SELECT notifications.notificationId, notifications.date, notifications.title,
                                    receivers.status, users.email, notifications.userId
                                    from notifications, receivers, users
                                    WHERE notifications.notificationId = receivers.notificationId
                                    AND users.userId = notifications.userId
                                    AND receivers.userId = (SELECT userId FROM users WHERE type = 'admin')");

        $data = json_decode(json_encode($result), true);

        return view('notification.adminNotification')->with('notices', $data);
    }

    public function adminReadNotice($id){
        DB::update("update receivers set status = 1 where notificationId = $id");

        $result = DB::select("SELECT * FROM notifications where notificationId = $id");

        $data = json_decode(json_encode($result), true);

        return view('notification.readNotice')->with('notices', $data);
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
        //
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
}
