<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessProduct;
use App\Models\BusinessProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCollection;

class ProductController extends Controller
{
    public function index()
    {
        $businessProduct = BusinessProduct::all();
        return response(['status' => 'Success', 'message' => 'Get plans list successfully', 'data' => $businessProduct], 200);
    }
    public function delete($id)
    {
        $product=BusinessProduct::where('productId', $id)->first();
        if(empty($product)){
            return response(['status_code' => '422','status'=>'Error', 'message' => 'product not exist agaist this id'], 422);
        }
        $product->delete();
        return response(['status' => 'Success', 'message' => 'Product deleted successfully'], 200);
    }

     public function deleteCollection($id)
    {
        $productCollection = ProductCollection::where('collectionId', $id)->first();
        $businessProduct = BusinessProduct::where('collectionId', $id)->get();
        foreach ($businessProduct as $product) {
            $product->delete();
        }
        if (empty($productCollection)) {
            return response(['status_code' => '422', 'status' => 'Error', 'message' => 'product not exist agaist this id'], 422);
        }
        $productCollection->delete();
        return response(['status' => 'Success', 'message' => 'Collection deleted successfully'], 200);
    }

    public function get_products() {
        $get_products = BusinessProduct::with('productImage')->get();
    
        if($get_products->isNotEmpty()) {
            foreach ($get_products as $product) {
                if ($product->productImage) {
                    if (empty($product->productImage->imageUrl)) {
                        $product->productImage->imageUrl = null;
                    } else {
                        $product->productImage->imageUrl = $product->productImage->imageUrl;
                    }
                }
            }
    
            return response(['status' => 'Success', 'message' => 'Products Fetched successfully', 'data' => $get_products], 200);
        }
    
        return response(['status_code' => '422', 'status' => 'Error', 'message' => 'Product does not exist'], 422);
    }
    
    
    
}
