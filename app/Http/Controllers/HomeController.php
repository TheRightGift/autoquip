<?php

namespace App\Http\Controllers;

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
}
