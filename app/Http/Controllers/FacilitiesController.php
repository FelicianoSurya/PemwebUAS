<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilities;
use App\Models\Favorite;
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
        $params = Fasilities::paginate(5);
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
            return back()->withErrors($validate);
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

        if(Auth()->user()->role == 'admin'){
            return redirect('admin/facilities')->with(['success' => 'success']);
        }else{
            return redirect('manager/facilities')->with(['success' => 'success']);
        }
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
        $favorites = Favorite::all();   
        return view('user.facilityDetail',[
            'favorites' => $favorites,
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
        $fasility = Fasilities::find($id);
        return view('admin.editFacility',[
            'fasility' => $fasility
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $fasility = Fasilities::find($id);

        if(!$fasility){
            return response(['message' => 'Tidak ada data']);
        }

        if($request->hasFile('image')){
            $validate = Validator::make($request->all(),[
                'fasilityName' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
            ]);    
        }else{
            $validate = Validator::make($request->all(),[
                'fasilityName' => 'required',
                'description' => 'required',
            ]);
        }

        if($validate->fails()){
            return back()->withErrors($validate);
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
        if(Auth()->user()->role == 'admin'){
            return redirect('/admin/facilities')->with(['info' => 'edit']);
        }else{
            return redirect('/facilities')->with(['info' => 'edit']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $fasility = Fasilities::find($id);
        if($fasility){
            $fasility->delete();
            $request->session()->flash('status','delete');      
            return back();
        }else{
            return response(['message' => 'data tidak ada!']);
        }
    }
}
