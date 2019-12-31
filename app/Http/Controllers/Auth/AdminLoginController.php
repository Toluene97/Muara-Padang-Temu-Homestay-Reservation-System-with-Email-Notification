<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Auth;
use App\Admin;
 
class AdminLoginController extends Controller
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

    protected $guard = 'admin';
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';        // need to change
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('guest:admin');
    }
 
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }
    public function guard()
    {
        return auth()->guard('admin');
    }


    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:199',
    //         'email' => 'required|string|email|max:255|unique:admins',
    //         'password' => 'required|string|min:6|confirmed'
    //     ]);
    //     Admin::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);
    //     return redirect()->route('admin-login')->with('success','Registration Success');
    // }


    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->intended('/admin');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    //////////////////////////////////////////////////////////

    // public function login(Request $request)
    // {
    //     //Validate the form data
    //     $this->validate($request,[
    //         'email'=>'required|email',
    //         'password'=>'required|min:8'
    //     ]);

    //     //attempt to log the user
    //     if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
    //         //if successful, redirect to intended location
    //         //return redirect()->intended(route('admin.dashboard'));
    //         return view('admin');
    //     }
    //     //if unseccessful, redirect back to login with form data.
    //         return redirect()->back()->withInput($request->only('email','remember'));
    // }

///////////////////////////////////////////////////////////

    // public function adminLogin(Request $request)
    // {
    //     if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         // dd(auth()->guard('admin')->user());

            
    //         return redirect()->intended('/index');
    //     }
 
    //     return back()->withInput($request->only('email', 'remember'));

    //     $this->validate($request, [
    //         'email'   => 'required|email',
    //         'password' => 'required|min:8'
    //     ]);
    //     if (Auth::attempt(['email' =>$request->email, 'password' =>$request->password])) {
    //         // Success
    //         return redirect()->intended('/about');
    //     } else {
    //         // Go back on error (or do what you want)
    //         return redirect()->back();
    //     }

    //     if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         return redirect()->intended('/about');
    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }



    // public function authenticate()
    // {
        
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    // }


    // protected function credentials(Request $request){
    //     return array_merge($request->only($this->email(), 'password'), );
    // }
}