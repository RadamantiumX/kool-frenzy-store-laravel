<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
       
       return view('contact.contact');
    }
    public function design()
    {
       return view('design.design'); 
    }
}
