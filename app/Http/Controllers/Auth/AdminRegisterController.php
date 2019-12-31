<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminRegisterController extends Controller
{
    //
    use RegistersUsers;

    protected $guard = 'admin';
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/about'; // try dulu

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'staffName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Admin
     */
    protected function create(array $data)
    {
        return Admin::create([
            'staffName' => $data['staffName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.adminRegister', ['url' => 'about']);
    }

    // public function register(Request $request)
    // {
    //     if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         dd(auth()->guard('admin')->user());
    //     }
 
    //     return back()->withErrors(['email' => 'Email or password are wrong.']);
    // }
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'staffName' => $request['staffName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('about'); // should be return to admin dashboard. 
    }
}
