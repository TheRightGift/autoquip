<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductService {
    protected function createAndUpdateProductDataValidation(Request $request){
		$validator = Validator::make($request->all(), [
            'title' => 'required|string|max:75',
            'category_id' => 'required',
            'desc' => 'nullable|string',
            'amount' => 'required|integer',
            'category_id' => 'nullable|integer',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:500',
            'images' => 'required',
            'shipping_price' => 'required|integer'
            // 'recommended' => 'nullable',
		]);
        return $validator;
    }


    public function allProducts(){
        $product = Product::with('category', 'images')->orderBy('created_at', 'DESC')->get();
        // $trashed = Product::with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->get();
        // return ['message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed];
        return ['status' => 200, 'message' => 'Products fetched successfuly', 'products' => $product];
    }

    public function sortProducts(Request $request, $sortBy){
        $category = $request->query('category');
        $data = new Product();
        $sort;
        $order = 'orderBy';
        switch ($sortBy) {
            case 'ZA':
                $type = 'title';
                $sort = 'desc';
                break;
            case 'AZ':
                $type = 'title';
                $sort = 'asc';
                break;
            case '0':
                $type = 'amount';
                $sort = 'asc';
                break;
            case '1':
                $type = 'amount';
                $sort = 'desc';
                break;
            case 'D01':
                $type = 'created_at';
                $sort = 'desc';
                break;
            case 'D10':
                $type = 'created_at';
                $sort = 'asc';
                break;
            case 'RM':
                $type = 'recommended';
                $order = 'where';
                $sort = '1';
                break;
                                                                                                
            default:
                break;
        }
        if ($category != 'null') {
            $product = $data->$order($type, $sort)->whereRelation('categories', 'categories.name', $category)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = $data->$order($type, $sort)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->paginate();
        }
        else if ($category == 'null') {
            $product = $data->$order($type, $sort)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate();
            $trashed = $data->$order($type, $sort)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->onlyTrashed()->paginate();
        }
        return ['status' => 200, 'message' => 'Products fetched successfuly', 'products' => $product, 'trashed' => $trashed];
        
    }

    public function filterProducts(Request $request){
        // dd($request);
        $data = new Product();

        $type;
        $sort;
        $order = 'orderBy';
        switch ($request->sortBy) {
            case 'ZA':
                $type = 'title';
                $sort = 'desc';
                break;
            case 'AZ':
                $type = 'title';
                $sort = 'asc';
                break;
            case '0':
                $type = 'amount';
                $sort = 'asc';
                break;
            case '1':
                $type = 'amount';
                $sort = 'desc';
                break;
            case 'D01':
                $type = 'created_at';
                $sort = 'desc';
                break;
            case 'D10':
                $type = 'created_at';
                $sort = 'asc';
                break;
            case 'RM':
                $type = 'recommended';
                $order = 'where';
                $sort = '1';
                break;
                                                                                                
            default:
                break;
        }
        $filterType = $request->type;
        $filter = $request->filter;

        if ($filterType != "" && $filter != "") {
            $result = $data->$order($type, $sort)->whereRelation($filterType, $filterType.'.id', $filter)
                        ->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->paginate(2);
        }
        return ['status' => 200, 'message' => 'Products fetched successfuly', 'products' => $result];
    }

    public function storeProducts(Request $request){
        $data = $this->createAndUpdateProductDataValidation($request);

        if ($data->fails()){
            return ['status' => 501, 'error' => $data->errors()->all()];
        } else {
            $product = Product::create([
                'title' => $request->title,
                'recommended' => $request->recommended,
                'desc' => $request->desc,
                'amount' => $request->amount,
                'category_id' => $request->category_id,
                'created_at' => now(),
            ]);
            
            $product->categories()->sync([$request->category_id]);

            $images = $request->file('images');
            foreach ($images as $key => $value) {
                $name = $value->getClientOriginalName();
                $value->move(public_path('/img/products/'), $name);
                $product->images()->create([
                    'url' => '/img/products/'.$name,
                    'product_id' => $product['id'],
                ]);
            }   
            $products = Product::with('categories', 'images')->paginate();
            return ['message' => 'New Product added.', 'products' => $products, 'status' => 201];
        }
    }

    public function showProducts($title){
        $product = Product::where('title', $title)->with('promotionals', 'colors', 'sizes', 'categories', 'images', 'wishlists')->first();
        $category = $product->categories->first()->id;
        $related_product = $product->whereRelation('categories', 'categories.id', $category)->with('promotionals', 'categories', 'colors', 'sizes', 'images')->get();
        return ['product' => $product, 'related' => $related_product, 'message' => 'Product retrieved successfuly', 'status' => 1];
    }

    public function updateProducts(Request $request, $id){
        $data = $this->createAndUpdateProductDataValidation($request);

        if ($data->fails()){
            return ['status' => 501, 'error' => $data->errors()->all()];
        } else {        
            $product = Product::where('id', $id)->firstOrFail();
            if ($request->deletedImgs) {
                $imgDeleted = explode(',', $request->deletedImgs);
                $imgDeletedIds = explode(',', $request->deletedImgIds);
                $res = Image::whereIn('id', $imgDeletedIds)->forceDelete();
                foreach ($imgDeleted as $key => $value) {
                    $imageToDelete = public_path($value);
                    if (file_exists($imageToDelete))
                    {
                        unlink($imageToDelete);
                    }
                }
            }
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                // dump($images);
                foreach ($images as $key => $value) {
                    $name = $value->getClientOriginalName();
                    $value->move(public_path('/img/uploads/'), $name);
                    $product->images()->create([
                        'url' => '/img/uploads/'.$name,
                        'imageable_id' => $product['id'],
                        'imageable_type' => Product::class,
                    ]);
                }  
            }
            $update = $product->update($request->only(['title', 'recommended', 'desc', 'amount', 'stock', 'updated_at' => now()]));
            $sizes = $request->sizes != '' ? explode(',', $request->sizes) : '';
            $colors = $request->colors != '' ? explode(',', $request->colors) : '';
            // dd($sizes, $colors);
            $product->categories()->sync([$request->category_id]);
            !empty($colors) ? $product->colors()->sync($colors) : $product->colors()->detach();
            !empty($sizes) ? $product->sizes()->sync($sizes) : $product->sizes()->detach();

            return ['status' => 200, 'message' => 'Product updated successfully', 'status' => $update, 'products' => $product->get()];
        }
    }

    public function destroyProduct($id){
        Product::where('id', $id)->delete();
        return ['status' => 204, 'message' => 'Archived successfuly'];
    }

    public function refreshProduct($id){
        Product::where('id', $id)->restore();
        return ['status' => 201, 'message' => 'Unarchived successfuly'];
    }
}