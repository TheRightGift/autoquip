<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CartServices;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function userUnpaidCartItems($userId, CartServices $cartServices)
    {
        $cartItems = $cartServices->allUserUnpaidCartItems($userId);
        return response($cartItems);
    }

    public function userCartItems($userId, CartServices $cartServices)
    {
        $cartItems = $cartServices->allUserCartItems($userId);
        return response($cartItems);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartServices $cartServices)
    {
        $cart = $cartServices->storeCart($request);
        return response($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($cartId, CartServices $cartServices)
    {
        $cart = $cartServices->destroyCart($cartId);
        return response($cart);
    }
}
