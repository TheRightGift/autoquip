<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductService $productService)
    {
        $products = $productService->allProducts();
        return response($products);
    }

    public function paginatedProducts()
    {
        return Article::with('category')->orderBy('created_at', 'desc')->paginate(20);
    }

    public function sort(Request $request, $sortBy)
    {
        $products = $productService->sortProducts($request, $sortBy);
        return response($products);        
    }

    /**
     * Filter items by class or category or subject.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $products = $ProductService->filterProducts($request);
        return response($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = $ProductService->storeProducts($request);
        return response($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $product = $ProductService->showProducts($title);
        return response($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = $ProductService->updateProducts($request, $id);
        return response($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $ProductService->destroyProduct($id);
        return response($product);
    }

     /**
     * Remove the specified Product from storage.
     *
     * @param  \App\Models\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        $product = $ProductService->refreshProduct($id);
        return response($product);
    }
}
