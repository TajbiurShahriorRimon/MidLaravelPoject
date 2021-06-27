<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select("select * from events where status = 1");

        $data = json_decode(json_encode($result), true);

        return view('user.admin.userHome')->with('events', $data);
    }

    public function searchActiveEvents(Request $request){
        $result = DB::select("SELECT * FROM events WHERE status = 1 AND title LIKE '%$request->eventText%'
                                    OR description LIKE '%$request->eventText%' AND status = 1");

        $data = json_decode(json_encode($result), true);
        return view('user.admin.userHome')->with('events', $data);
    }

    public function eventRequest(){
        $result = DB::select("SELECT * FROM events WHERE status = -1");

        $data = json_decode(json_encode($result), true);
        return view('event.requestedEvents')->with('events', $data);
    }

    public function approveForm($id){
        $result = DB::select("SELECT * FROM events WHERE eventId = $id");

        $managerResult = DB::select("SELECT * FROM users where type = 'manager' and status = 1");
        $managers = json_decode(json_encode($managerResult), true);

        $events = json_decode(json_encode($result), true);
        return view('event.requestApproval', compact('events', 'managers'));
    }

    public function confirmCreateEvent($id, Request $request){
        $todayDate = date('Y-m-d');

        $convertStartDate = strtotime($request->startDate);
        $eventStartDate = date('Y-m-d', $convertStartDate);

        $convertEndDate = strtotime($request->endDate);
        $eventEndDate = date('Y-m-d', $convertEndDate);

        $notificationMessage = "Your event Request is accepted. Commission percent: ".$request->commission.". Event Title: ".$request->eventTitle.
                                ". Start date: ".$request->startDate.". End Date: ".$request->endDate;

        DB::update("update events set managerId = $request->managerUserId,
                                    startDate = $request->startDate, endDate = $request->endDate,
                                    commission = $request->commission, status = 1 where eventId = $id");

        $organizer = DB::select("select * from events where eventId = $id");
        $organizerInfo = json_decode(json_encode($organizer), true);
        foreach ($organizerInfo as $organizerInformation){}

        $organizerId = $organizerInformation['userId'];

        $admin = DB::select("select * from users where type = 'admin'");
        $adminInfo = json_decode(json_encode($admin), true);
        foreach ($adminInfo as $adminInformation){}

        $adminId = $adminInformation['userId'];

        DB::insert("insert into notifications (title, message, userId, date)
                            values ('Event Created Successfully', '$notificationMessage', '$adminId', '$todayDate')");

        $fetchNotificationId = DB::select("SELECT * FROM `notifications` ORDER by notificationId DESC LIMIT 1");
        $notificationInfo = json_decode(json_encode($fetchNotificationId), true);
        foreach ($notificationInfo as $notificationInformation){}

        $notificationId = $notificationInformation['notificationId'];

        $notificationReceiverStatus = 0;
        DB::insert("insert into receivers (notificationId, userId, status)
                          values ('$notificationId', '$organizerId', '$notificationReceiverStatus')");

        return redirect('/events/eventRequest')->with('eventAcceptMessage', "Event Created Successfully");

        //return $newFormat;
        //print_r($adminInfo);
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
