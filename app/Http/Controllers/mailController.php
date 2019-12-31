<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    //
    public function send()
    {
        Mail::send(['text'=>'mail'],['name','Sartha'], function($message){
            $message->to('nurfitri385@gmail.com','To Bitfumes')->subject('Test Email');
            $message->from('nurfitri385@gmail.com','Bitfumes');
        });
    }
}
