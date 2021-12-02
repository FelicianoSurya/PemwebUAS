<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Fasilities;
use App\Models\Favorite;
use App\Models\Booking;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = User::where('role','management')->paginate(5);
        // return response($params);
        return view('admin.userTable',[
            'users' => $params,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $validate = Validator::make($request->all(),[
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:2',
                'name' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
            ]);
        }else{
            $validate = Validator::make($request->all(),[
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:2|confirmed',
                'name' => 'required'
            ]);
        }

        if($validate->fails()){
            return back()->withErrors($validate);
        };

        if($request->hasFile('image')){
            $destination_path = 'public/Images/User';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'management',
                'image' => $image_name
            ]);
        }else{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'management',
                'image' => 'laki.jpg'
            ]);  
        }

        return redirect('management')->with(['success' => 'mantap']);
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
        $user = User::find($id);
    
        return view('admin.editUser',[
            'user' => $user
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
        $management = User::find($id);

        if($request->hasFile('image')){
            if($request->pass == 'yes'){
                $validate = Validator::make($request->all(),[
                    'password' => 'required|confirmed|string|min:2',
                    'name' => 'required',
                    'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
                ]);
            }else{
                $validate = Validator::make($request->all(),[
                    'name' => 'required',
                    'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
                ]);
            }
        }else{
            if($request->pass == 'yes'){
                $validate = Validator::make($request->all(),[
                    'password' => 'required|confirmed|string|min:2',
                    'name' => 'required',
                ]);
            }else{
                $validate = Validator::make($request->all(),[
                    'name' => 'required',
                ]);
            }
        }

        if($validate->fails()){
            return back()->withErrors($validate);
        };

        if($request->hasFile('image')){
            $destination_path = 'public/Images/User';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            if($request->pass == 'yes'){
                $management->fill([
                    'password' => bcrypt($request->password),
                    'name' => $request->name,
                    'image' => $image_name,
                ]);
            }else{
                $management->fill([
                    'name' => $request->name,
                    'image' => $image_name,
                ]);
            }
        }else{
            if($request->pass == 'yes'){
                $management->fill([
                    'password' => bcrypt($request->password),
                    'name' => $request->name,
                ]);
            }else{
                $management->fill([
                    'name' => $request->name,
                ]);
            }
        }
        
        $management->save();
        
        return redirect('/management')->with(['edit' => 'User berhasil diEdit!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return back()->with(['delete' => 'User Berhasil diDelete!']);
        }else{
            return back()->with(['error' => 'Data tidak ada']);
        }
    }

    public function addFavorite(Request $request){
        $params = Favorite::create([
            'fasilityID' => $request->fasilityID,
            'userID' => $request->userID
        ]);

        return response()->json($params);
    }

    public function favoriteList(){
        $userID = auth()->user()->id;
        
        $favorites = Favorite::with(['fasility','user'])->where('userID',$userID)->get();
        $params = Favorite::all();

        return view('user.favorite',[
            'datas' => $favorites,
            'favorites' => $params
        ]);
    }

    public function deleteFavorite($id){
        $favorite = Favorite::find($id);
        $params = [
            'id' => $favorite['fasilityID']
        ];

        $favorite->delete();
        return response()->json($params);
    }

    public function bookingForm(){
        $fasilities = Fasilities::all();
        return view('user.booking',[
            'fasilities' => $fasilities,
        ]);
    }

    public function userRequest(){
        $userID = Auth()->user()->id;
        $params = Booking::where('userID',$userID)->where('status','waiting')->paginate(10);

        return view('management.requestListing',[
            'bookings' => $params,
        ]);
    }

    public function userHistory(){
        $userID = Auth()->user()->id;
        $params = Booking::where('userID',$userID)
            ->where(function($query){
                $query->where('status','approved')
                ->orWhere('status','rejected');
            })->paginate(10);

        return view('management.requestListing',[
            'bookings' => $params,
        ]);
    }
}
