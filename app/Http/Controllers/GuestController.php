<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('pages.guest.home');
    }
    
    public function about(){
        return view('pages.guest.about');
    }

    public function contact(){
        return view('pages.guest.contact');
    }
}
