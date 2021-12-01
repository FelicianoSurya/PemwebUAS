<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilities;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = Fasilities::all();
        // return response($params);
        // return view('listFasilitas',[
        //     'Facilities' => $params
        // ]);
         return view('admin.listFacility',[
            'facilityListing' => $params
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addFacility');
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
            'fasilityID' => 'required|unique:fasilities',
            'fasilityName' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        if($validate->fails()){
            return response(['message' => 'Add Fasilitas Gagal!']);
        }

        if($request->hasFile('image')){
            $destination_path = 'public/Images/Fasilitas';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
        }

        Fasilities::create([
            'fasilityID' => $request->fasilityID,
            'fasilityName' => $request->fasilityName,
            'description' => $request->description,
            'image' => $image_name
        ]);

        return response(['message' => 'add Fasilitas Berhasil!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasility = Fasilities::where('fasilityID', $id)->first();
        return view('user.facilityDetail',[
            'fasility' => $fasility
        ]);
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
        $fasility = Fasilities::find($id);

        if(!$fasility){
            return response(['message' => 'Tidak ada data']);
        }

        if($request->hasFile('image')){
            $validate = Validator::make($request->all(),[
                'fasilityName' => 'required',
                'description' => 'required',
                'image' => 'require|mimes:jpeg,jpg,png,gif|max:2048'
            ]);    
        }else{
            $validate = Validator::make($request->all(),[
                'fasilityName' => 'required',
                'description' => 'required',
            ]);
        }

        if($validate->fails()){
            return response(['message' => 'Update Fasilitas Gagal!']);
        }
        
        if($request->hasFile('image')){
            $destination_path = 'public/Images/Fasilitas';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $fasility->fill([
                'fasilityName' => $request->fasilityName,
                'description' => $request->description,
                'image' => $image_name
            ]);
        }else{
            $fasility->fill([
                'fasilityName' => $request->fasilityName,
                'description' => $request->description,
            ]);
        }

        $fasility->save();
        return response(['message' => 'Update Fasilitas Berhasil!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasility = Fasilities::find($id);
        if($fasility){
            $fasility->delete();
            return response(['message' => 'berhasil Delete Fasilitas']);
        }else{
            return response(['message' => 'data tidak ada!']);
        }
    }
}
