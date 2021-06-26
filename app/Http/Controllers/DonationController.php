<?php

namespace App\Http\Controllers;

use App\Models\EventDonations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BarChart;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select("SELECT sum(Amount) as totalAmount, Year(date) as date from eventdonations
                                    GROUP BY year(date)");

        $data = json_decode(json_encode($result), true);
        return view('donation.yearlyDonation')->with('row', $data);
    }

    public function monthlyDonationReport($month){
        $result = DB::select("SELECT sum(Amount) as totalAmount, Month(date) as date from eventdonations
                                    where Year(date) = ? GROUP BY month(date)", [$month]);

        $data = json_decode(json_encode($result), true);

        $chart = array();
        $count = count($data);

        $months = array( "Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec" );

        for ($i = 0; $i < 12; $i++){
            $barChart = new BarChart($months[$i], 0);
            $chart[$i] = $barChart;
        }

        for ($i = 0; $i < $count; $i++){
            $chart[$data[$i]['date'] - 1] = $data[$i]['totalAmount'];
        }
        //print_r($chart);
        return view('donation.monthlyDonation')->with('data', $chart);
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
