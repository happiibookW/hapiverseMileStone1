<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessProduct;

class MarketPlaceController extends Controller
{
    //
    public function index(Request $req){
        try {
            $products = BusinessProduct::all();
            // echo"<pre>";
            // print_r($products->toArray());
            // die();
            return view('user-web.marketPlace.index',compact('products'));
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
        
    }
}
