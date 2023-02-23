<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function products(){
        return view('products');
    }

    public function singleProduct(){
        return view('singleProduct');
    }

    public function repairs(){
        return view('repair');
    }
    
    public function contact(){
        return view('contact');
    }

    public function warehouse(){
        return view('warehouse');
    }

    public function isLoggedIn(){
        if (Auth::user()) {
            return true;
        } else {
            return false;
        }
    }
}
