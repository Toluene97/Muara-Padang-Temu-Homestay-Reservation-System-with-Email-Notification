<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;               // utk function index tu bole jalan.
use App\Model\Reservation;
use App\Model\House;
class DashboardController extends Controller
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
    public function index()
    {
        $user_id = auth()->user()->id;  
        $user = User::find($user_id);

        $reservation =Reservation::find($user_id);
        // $reservation =Reservation::with('reservation',$user->reservation)->orderBy('check_in', 'asc')
        // ->get();
        // return $reservation;

        return view('dashboard')-> with('posts',$user->posts)->with('reservation',$user->reservation)->with('houses');      // pass along the dashboard with ->
    }

    
}
