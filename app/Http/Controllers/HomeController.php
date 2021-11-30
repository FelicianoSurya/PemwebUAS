<?php

namespace App\Http\Controllers;

use App\Models\Fasilities;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage(){
        return view('homepage');
    }

    public function index()
    {
        // return view('user.home');
        $params = Fasilities::all();
        return view('user.home',[
            'facilities' => $params
        ]);
    }

    public function indexAdmin(){
        return view('admin.homeAdmin');
    }

    public function indexManagement(){
        return view('management.homeManagement');
    }
}
