<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = User::where('role','user')->orWhere('role','management')->get();
        return response($params);
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
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:2',
            'name' => 'required'
        ]);

        if($validate->fails()){
            return response(['message' => 'gagal tambah management!']);
            // return back()->withError('message','error');
        };

        if($request->hasFile('image')){
            $destination_path = 'public/Images/User';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'management',
                'image' => $image_name
            ]);
        }else{
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'management',
            ]);  
        }

        return response([
            'message' => 'berhasil menambahkan management',
        ]);
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
        $management = User::find($id);
        $validate = Validator::make($request->all(),[
            'password' => 'required|string|min:2',
            'name' => 'required'
        ]);

        if($validate->fails()){
            return response(['message' => 'gagal edit management!']);
            // return back()->withError('message','error');
        };

        if($request->hasFile('image')){
            $destination_path = 'public/Images/User';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $management->fill([
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'image' => $image_name,
            ]);
        }else{
            $management->fill([
                'password' => bcrypt($request->password),
                'name' => $request->name
            ]);
        }
        $management->save();
        return response(['message' => 'Edit Management Success!']);
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
            return response(['message' => 'Hapus Management Success!']);
        }else{
            return response(['message' => 'Akun management Tidak ada!']);
        }
    }
}
