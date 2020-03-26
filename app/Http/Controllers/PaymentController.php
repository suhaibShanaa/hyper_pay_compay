<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data_id = Payment::all(); //return alll data from database to use this
        //return view('RegsterID',['$data_id'=>$data_id]); // if use to another page

        $regsIds=''; //to initlztion
        //FOR LOOP to make reg_id looping to all data
        foreach ($data_id as $i=> $data_id) {
            $regsIds .="&registrations[$i].id=$data_id->reg_id";
        }

        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174d0595bb014d05d82e5b01d2" .
            "&amount=92.00" .
            "&currency=EUR" .
            "&paymentType=DB" .
            $regsIds;




        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData;

        $one = json_decode($responseData);
        return view('testBlade',['one'=>$one] );

    }

    function  status(Request $request){

        $id = $_GET['id'];


        $url = "https://test.oppwa.com/v1/checkouts/$id/payment";
        $url .= "?entityId=8a8294174d0595bb014d05d82e5b01d2";


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);


        //to make data unecrepted and transform to objects

        $responseData = json_decode($responseData);
        echo('<pre>'.json_encode($responseData,JSON_PRETTY_PRINT).'</pre>');
        //

        //insert data to database by using opp from 'Json_decode ' and DB::
        $insertt =$responseData->registrationId;
//        $cardd =$responseData->card->holder;


//        DB::table('table_tow')->insert(
//            ['reg_id' => $insertt , 'card_name' =>$cardd]
//        );

        $request->input($insertt);
        $pay = new Payment();
        $pay->reg_id =request('reg_id');
//        $pay->card_name =request('card_name');

        $pay->save();
        return view('RegsterID');


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
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
