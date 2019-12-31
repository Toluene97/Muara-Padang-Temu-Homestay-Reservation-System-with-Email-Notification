<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        //$this->middleware('guest:admin')->except('logout');
    }

    //admin login
    // public function showAdminLoginForm()
    // {
    //     return view('auth.adminLogin');
    // }
    //  public function adminLogin(Request $request)
    // {
    //     //Validate the form data
    //     $this->validate($request,[
    //         'email'=>'required|email',
    //         'password'=>'required|min:8'
    //     ]);

    //     //attempt to log the user
    //     if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
    //         //if successful, redirect to intended location
    //         return redirect()->intended(route('admin.dashboard'));
    //     }
    //     //if unseccessful, redirect back to login with form data.
    //         return redirect()->back()->withInput($request->only('email','remember'));
    // }
}
