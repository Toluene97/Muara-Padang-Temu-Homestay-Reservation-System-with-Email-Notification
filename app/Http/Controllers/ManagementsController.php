<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementsController extends Controller
{
    //
    public function index(){
        return view ('managements.index');
    }
}
