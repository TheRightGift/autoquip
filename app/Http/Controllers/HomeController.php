<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Services\CartServices;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function products(){
        return view('products');
    }

    public function singleProduct($id){
        $productId = (int)$id;
        return view('singleProduct', compact('productId'));
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
    public function userDetails(){
        if (Auth::user()) {
            return Auth::user();
        } else {
            return null;
        }
    }
    // public function userCart(CartServices $cartServices){
    //     if (Auth::user()) {
    //         $userId = Auth::user()->id;
    //         // allUserUnpaidCartItems
    //         $cartItems = $cartServices->allUserUnpaidCartItems($userId);
    //         return response($cartItems);
    //     } else {
    //         return null;
    //     }
    // }
}
