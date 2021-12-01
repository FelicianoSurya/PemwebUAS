<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate);
        }

        if(Auth()->attempt(['email' => $request->email , 'password' => $request->password])){
            if(Auth()->user()->role == 'admin'){
                return redirect()->route('homeAdmin');
            }elseif(Auth()->user()->role == 'management'){
                return redirect()->route('homeManagement');
            }else{
                return redirect()->route('home');
            }
        }else{
            return back()->withErrors(['invalid' => 'Email atau Password Salah!']);
        }

    }
}
