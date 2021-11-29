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
        $params = booking::with(['user','fasility'])->get();
        return response($params);
        // return view('listFasilitas',[
        //     'Facilities' => $params
        // ]);
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
            return response(['message' => 'Tidak Bisa Booking!']);
        }

        $booking = Booking::all();

        foreach($booking as $data){
            if($data['bookingDate'] == $request->bookingDate && $data['fasilityID'] == $request->fasilityID){
                if($request->startTime <= $data['startTime'] && $request->endTime > $data['startTIme'] || $request->startTime > $data['startTime'] && $request->startTime < $data['endTime']){
                    return response(['message' => 'Tidak Bisa Booking! Sudah Ada yang isi']);
                }
            }

            if($data['userID'] == $request->userID && $data['bookingDate'] == $request->bookingDate){
                if($request->startTime <= $data['startTime'] && $request->endTime > $data['startTIme'] || $request->startTime > $data['startTime'] && $request->startTime < $data['endTime']){
                    return response(['message' => 'Tidak Bisa Booking! Anda Sudah memiliki jadwal diwaktu yang sama!']);
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
        
        return response(['message' => 'berhasil memboking fasilitas!']);
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
            return response(['message' => 'data tidak ditemukan!']);
        }

        $booking->fill([
            'status' => 'approved',
        ]);
        

        $booking->save();

        return response(['message' => 'Approved Berhasil']);
    }

    public function rejected(Request $request, $id)
    {
        $booking = Booking::find($id);

        if(!$booking){
            return response(['message' => 'data tidak ditemukan!']);
        }

        $booking->fill([
            'status' => 'rejected',
        ]);

        $booking->save();
        return response(['message' => 'Rejected Berhasil']);
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
            return response(['message' => 'Booking berhasil dihapus!']);
        }else{
            return response(['message' => 'Id Booking tidak ada!']);
        }
    }
}
