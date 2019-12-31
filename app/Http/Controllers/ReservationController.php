<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Reservation;
use App\Model\House;
use Auth;
use Validator;
use Calendar;
use App\Mail\SendMail;
use Mail;
use Redirect;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    public function dashboard()
    {
        $reservations =Reservation::with('houses')->get()->all();
        // $reservations =Reservation::all();
        // return $reservations;
        $reservation_list=[];
        foreach ($reservations as $key => $reservation){
            $reservation_list[]=Calendar::event(
                $reservation->houses->name,
                // $reservation->HouseId,
                true, 
                new \DateTime($reservation->check_in),
                new \DateTime($reservation->check_out.'+1 day')
            );
        }
        
        $calendar_details = Calendar::addEvents($reservation_list);
        return view('dashboard/dashboard',compact('calendar_details'));
////
        // $reservations =Reservation::all();
        // $reservation =[];
        // foreach($reservations as $row){
        //     $reservation[] = \Calendar::event(
        //         $row->HouseId,
        //         true,
        //         new \DateTime($row->check_in),
        //         new \DateTime($row->check_out),
                
        //         );
        // }
        // $calendar_details=\Calendar::addEvents($reservation);
        // return view('dashboard/dashboard',compact('reservations','calendar_details'));
    }

    public function calendar()
    {
        $reservations =Reservation::get();
        $reservation_list=[];
        foreach ($reservations as $key => $reservation){
            $reservation_list[]=Calendar::event(
                $reservation->HouseId,
                true, 
                new \DateTime($reservation->check_in),
                new \DateTime($reservation->check_out.'+1 day')
            );
        }
        
        $calendar_details = Calendar::addEvents($reservation_list);
        return view('calendar',compact('calendar_details'));
    }


    public function isThisDayAWeekend($date) {

        $timestamp = strtotime($date);
    
        $weekday= date("l", $timestamp );
    
        if ($weekday =="Saturday" OR $weekday =="Sunday") { return true; } 
        else {return false; }
    
    }


    public function index()
    {
        
        $reservations = Reservation::with('houses')
        ->orderBy('check_in', 'asc')
        ->get();  
        // return $reservations;    
        // $reservations =Reservation::all();

        return view ('dashboard.reservations')->with('reservations',$reservations); //view all customer
    }

    public function addReservation(Request $request, House $HouseId)
    // public function addReservation($id)
    {
        // House::find($id)->get();
        
        $houseInfo = House::get()->find($HouseId);
        $validator = Validator::make($request->all(),[
            'check_in' => 'required',
            'check_out'=> 'required',
            'num_of_guests'=> 'required',
            'final_price'=> 'required',
            'HouseId'=> 'required',
            'status'=> 'required',

            'recipt_image'=> 'image|nullable|max:1999'
        ]);
        // return $reservation;
        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('reservations')->withInput()->withErrors($validator);
        }
        // return $reservation;
        if($request->hasFile('recipt_image')){
            //Get filename with extension
            $filenameWithExt = $request-> file('recipt_image')->getClientOriginalName();
            //Get filename 
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request  -> file('recipt_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('recipt_image')->storeAs('public/recipt_image',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $reservation = new Reservation;
        $reservation->check_in = $request['check_in'];
        $reservation->check_out = $request['check_out'];
        $reservation->num_of_guests = $request['num_of_guests'];
        $reservation->final_price = $request['final_price'];
        $reservation->user_id= auth()->user()->id; 
        $reservation->HouseId = $request['HouseId'];
        $reservation->status = $request['status'];
        $reservation->recipt_image = $fileNameToStore;

        // $reservation = $request->input('HouseId');
        
        $reservation->save();
        
        $data = array(
            'name'      =>  $request->user()->name,
            'check_in'  =>  $request->check_in,
            'check_out' =>  $request->check_out,
            'final_price' =>  $request->final_price,
            'num_of_guests' =>  $request->num_of_guests
        );

        Mail::to(auth()->user()->email)->send(new SendMail($data));
    //  return back()->with('success', 'Thanks for contacting us!');
// return $reservation;
        \Session::flash('success','Reservation added successfully');
        return Redirect::to('reservations'); compact('houseInfo')->with('success', 'Email has been send');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($HouseId)
    {
        //
        $houseInfo = House::get()->find($HouseId);
        return view('dashboard.reservationCreate', compact('houseInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $user_id=1;
        $request->request->add(['user_id' => $user_id]);
        Reservation::create($request->all());

        return redirect('dashboard/reservations')->with('success', 'Reservation created!');
    }
// ---------------------------------------------------------------------------------------------//
// ---------------------------------------------------------------------------------------------/
// ---------------------------------------------------------------------------------------------/

    public function upload(Request $request, $id)
    {
        $this -> validate($request,[
            'check_in' => 'required',
            'check_out'=> 'required',
            'num_of_guests'=> 'required',
            // 'final_price'=> 'required',
            // 'HouseId'=> 'required',

            'recipt_image'=> 'image|nullable|max:1999'
        ]);

        if($request->hasFile('recipt_image')){
            //Get filename with extension
            $filenameWithExt = $request-> file('recipt_image')->getClientOriginalName();
            //Get filename 
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request  -> file('recipt_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('recipt_image')->storeAs('public/recipt_image',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $reservation = Reservation:: find ($id);
        $reservation->check_in=$request->input('check_in');
        $reservation->check_out=$request->input('check_out');
        $reservation->num_of_guests=$request->input('num_of_guests');
        // $reservation->final_price=$request->input('final_price');
        if($request->hasFile('recipt_image')){
            if($reservation->recipt_image != 'no_image.png'){
                Storage::delete('public/recipt_image'.$reservation->recipt_image);
            }
            $reservation->recipt_image = $fileNameToStore;
        }
        $reservation -> save();

        // return $reservation;

        // return view('dashboard.upload', compact('reservation'));

        return redirect('dashboard/')->with('success', 'Successfully Upload your Receipt!');
    }
    // ---------------------------------------------------------------------------------------------------//
    // ---------------------------------------------------------------------------------------------/
    // ---------------------------------------------------------------------------------------------/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
        // $reservation = Reservation::with('reservation')->get()->find($reservation->id);

        // $hotel_id = $reservation->room->HouseId;

        $reservation = Reservation::find($ReservationId)->with('houses')->get()->find($reservation->ReservationId);
        $HouseId = $reservation->HouseId;
        $houseInfo = House::get()->find($HouseId);

       // return view('dashboard.reservationSingle', compact('reservation', 'houseInfo'));
        
    //    return view('viewUserReservation', compact('reservations', 'houseInfo'))->with('reservations',$reservations);
    
        return view('viewUserReservation')->with('reservation',$reservation);
        
        //return Reservation::find($ReservationId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
        $reservation = Reservation::with('houses')->get()->find($reservation->ReservationId);
        $HouseId = $reservation->HouseId;
        $houseInfo = House::get()->find($HouseId);

        return view('dashboard.reservationEdit', compact('reservation', 'houseInfo'));
    }

    public function uploadReceipt(Reservation $reservation)
    {
        $reservation = Reservation::with('houses')->get()->find($reservation->ReservationId);
        $HouseId = $reservation->HouseId;
        $houseInfo = House::get()->find($HouseId);

        return view('dashboard.upload', compact('reservation', 'houseInfo'));
    }


    public function status(Reservation $reservation)
    {
        $reservation = Reservation::with('houses')->get()->find($reservation->ReservationId);
        $HouseId = $reservation->HouseId;
        $houseInfo = House::get()->find($HouseId);

        return view('dashboard.ConfirmReservation', compact('reservation', 'houseInfo'));
    }

    public function confirm(Reservation $reservation)
    {
        
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
            $this -> validate($request,[
            'check_in' => 'required',
            'check_out'=> 'required',
            'num_of_guests'=> 'required',
            // 'final_price'=> 'required',
            // 'HouseId'=> 'required',

            'recipt_image'=> 'image|nullable|max:1999'
        ]);

        if($request->hasFile('recipt_image')){
            //Get filename with extension
            $filenameWithExt = $request-> file('recipt_image')->getClientOriginalName();
            //Get filename 
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request  -> file('recipt_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('recipt_image')->storeAs('public/recipt_image',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $reservation = Reservation:: find ($id);
        $reservation->check_in=$request->input('check_in');
        $reservation->check_out=$request->input('check_out');
        $reservation->num_of_guests=$request->input('num_of_guests');
        // $reservation->final_price=$request->input('final_price');
        if($request->hasFile('recipt_image')){
            if($reservation->recipt_image != 'no_image.png'){
                Storage::delete('public/recipt_image'.$reservation->recipt_image);
            }
            $reservation->recipt_image = $fileNameToStore;
        }
        $reservation -> save();

        // return redirect('/reservations')->with('su')

        return redirect('dashboard/')->with('success', 'Successfully updated your reservation!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
        $reservation = Reservation::find($reservation->ReservationId);
        $reservation->delete(); 

        return redirect('dashboard/reservations')->with('success', 'Successfully deleted your reservation!');
    }
}
