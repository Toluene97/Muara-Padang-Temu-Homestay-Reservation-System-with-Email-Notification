<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\House;
class HouseController extends Controller
{
    //
    public function index() {
        $houses = House::all();
        return view('house')->with('houses', $houses);
    }
}
