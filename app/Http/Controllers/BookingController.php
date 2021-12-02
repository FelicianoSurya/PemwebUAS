<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = booking::with(['user','fasility'])->paginate(10);
        // return response($params);
        return view('management.requestListing',[
            'bookings' => $params
        ]);
    }
    
    public function indexWaiting()
    {
        $params = booking::with(['user','fasility'])->where('status','waiting')->paginate(10);
        // return response($params);
        return view('management.requestWaiting',[
            'bookings' => $params
        ]);
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
        $validate = Validator::make($request->all(),[
            'fasilityID' => 'required',
            'bookingDate' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'userID' => 'required'
        ]);

        if($validate->fails()){
            $request->session()->flash('validate','failed'); 
            return back()->withErrors($validate);
        }

        $booking = Booking::all();

        foreach($booking as $data){
            if($request->startTime > $request->endTime || $request->startTime == $request->endTime){
                // return response(['message' => 'Tidak bisa booking! Waktunya tidak valid!']);
                $request->session()->flash('status','invalid');
                return back();
            }
            if($request->bookingDate == $data['bookingDate'] && $request->fasilityID == $data['fasilityID']){
                if($request->startTime <= $data['startTime'] && $request->endTime > $data['startTime'] || $request->startTime > $data['startTime'] && $request->startTime < $data['endTime']){
                    // return response(['message' => 'Tidak Bisa Booking! Sudah Ada yang isi']);
                    $request->session()->flash('status','crash');
                    return back();
                }
            }

            if($data['userID'] == $request->userID && $data['bookingDate'] == $request->bookingDate){
                if($request->startTime <= $data['startTime'] && $request->endTime > $data['startTime'] || $request->startTime > $data['startTime'] && $request->startTime < $data['endTime']){
                    // return response(['message' => 'Tidak Bisa Booking! Anda Sudah memiliki jadwal diwaktu yang sama!']);
                    $request->session()->flash('status','already');
                    return back();
                }
            }
        }

        Booking::create([
            'fasilityID' => $request->fasilityID,
            'bookingDate' => $request->bookingDate,
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'userID' => $request->userID,
        ]);
   
        // return response(['message' => 'berhasil memboking fasilitas!']);
        $request->session()->flash('status','success');
        return back();
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
    public function approved(Request $request, $id)
    {
        $booking = Booking::find($id);
        if(!$booking){
            return back()->with(['invalid' => 'data tidak ada!']);
        }

        $booking->fill([
            'status' => 'approved',
        ]);
        

        $booking->save();

        return back()->with(['approved' => 'request list approved']);
    }

    public function rejected(Request $request, $id)
    {
        $booking = Booking::find($id);

        if(!$booking){
            return back()->with(['invalid' => 'data tidak ada!']);
        }

        $booking->fill([
            'status' => 'rejected',
        ]);

        $booking->save();
        return back()->with(['rejected' => 'request list rejected']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if($booking){
            $booking->delete();
            return back()->with(['delete' => 'Request List berhasil didelete']);
        }else{
            return back();
        }
    }
}
