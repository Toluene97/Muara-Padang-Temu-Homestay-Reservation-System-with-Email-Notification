<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to the MPTemu App';
        //return view ('pages.index',compact('title'));         //first way to pass title
        return view ('pages.index')->with('title',$title);      //second way to pass title
    }

    public function about(){
        $title = 'About Us';
        return view ('pages.about')->with('title',$title);
    }

    public function services(){
        $data=array('title'=>'Services yang ada',
                    'services'=>['Web design','hahaha','programming','hihihihih']);
        return view ('pages.services')->with($data);
    }
}
