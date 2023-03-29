<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;

class CartServices {
    protected function createartDataValidation(Request $request){
		$validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'qty' => 'required|integer',
            'unitPrice' => 'nullable|integer',
            'deliveryStatus' => 'nullable|string',
            'paid' => 'nullable|integer',
		]);
        return $validator;
    }


    public function allCartItems(){
        $cartItems = Cart::with('product', 'user')->orderBy('created_at', 'DESC')->get();
        return ['status' => 200, 'message' => 'Cart items fetched successfuly', 'cartItems' => $cartItems];
    }

    public function allUserCartItems($userId){
        $cartItems = Cart::where('user_id', $userId)->with('product', 'user', 'product.images')->orderBy('created_at', 'DESC')->get();
        return ['status' => 200, 'message' => 'Cart items fetched successfuly', 'cartItems' => $cartItems];
    }

    public function allUserUnpaidCartItems($userId){
        $cartItems = Cart::where('user_id', $userId)->where('paid', 'No')->with('product', 'user')->orderBy('created_at', 'DESC')->get();
        return ['status' => 200, 'message' => 'Cart items fetched successfuly', 'cartItems' => $cartItems];
    }

    public function storeCart(Request $request){
        $data = $this->createartDataValidation($request);

        if ($data->fails()){
            return ['status' => 501, 'error' => $data->errors()->all()];
        } else {
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'qty' => $request->qty,
                'created_at' => now()                
            ]);

            return ['message' => 'New Product added to cart.', 'cart' => $cart, 'status' => 201];
        }
    }

    // public function showProducts($id){
    //     $product = Product::where('id', $id)->with('images', 'category')->first();
    //     // $category = $product->category->first()->id;
    //     // $related_product = $product->whereRelation('category', 'category.id', $category)->with('promotionals', 'category', 'colors', 'sizes', 'images')->get();
    //     $related_product = '';
    //     return ['product' => $product, 'related' => $related_product, 'message' => 'Product retrieved successfuly', 'status' => 200];
    // }

    // public function updateProducts(Request $request, $id){
    //     $data = $this->createAndUpdateProductDataValidation($request);

    //     if ($data->fails()){
    //         return ['status' => 501, 'error' => $data->errors()->all()];
    //     } else {        
    //         $product = Product::where('id', $id)->firstOrFail();
    //         if ($request->deletedImgs) {
    //             $imgDeleted = explode(',', $request->deletedImgs);
    //             $imgDeletedIds = explode(',', $request->deletedImgIds);
    //             $res = Image::whereIn('id', $imgDeletedIds)->forceDelete();
    //             foreach ($imgDeleted as $key => $value) {
    //                 $imageToDelete = public_path($value);
    //                 if (file_exists($imageToDelete))
    //                 {
    //                     unlink($imageToDelete);
    //                 }
    //             }
    //         }
    //         if ($request->hasFile('images')) {
    //             $images = $request->file('images');
    //             // dump($images);
    //             foreach ($images as $key => $value) {
    //                 $name = $value->getClientOriginalName();
    //                 $value->move(public_path('/img/uploads/'), $name);
    //                 $product->images()->create([
    //                     'url' => '/img/uploads/'.$name,
    //                     'imageable_id' => $product['id'],
    //                     'imageable_type' => Product::class,
    //                 ]);
    //             }  
    //         }
    //         $update = $product->update($request->only(['title', 'recommended', 'desc', 'amount', 'stock', 'updated_at' => now()]));
    //         $sizes = $request->sizes != '' ? explode(',', $request->sizes) : '';
    //         $colors = $request->colors != '' ? explode(',', $request->colors) : '';
    //         // dd($sizes, $colors);
    //         $product->categories()->sync([$request->category_id]);
    //         !empty($colors) ? $product->colors()->sync($colors) : $product->colors()->detach();
    //         !empty($sizes) ? $product->sizes()->sync($sizes) : $product->sizes()->detach();

    //         return ['status' => 200, 'message' => 'Product updated successfully', 'status' => $update, 'products' => $product->get()];
    //     }
    // }

    public function destroyCart($id){
        Cart::where('id', $id)->delete();
        return ['status' => 204, 'message' => 'Archived successfuly'];
    }

    // public function refreshProduct($id){
    //     Product::where('id', $id)->restore();
    //     return ['status' => 201, 'message' => 'Unarchived successfuly'];
    // }
}