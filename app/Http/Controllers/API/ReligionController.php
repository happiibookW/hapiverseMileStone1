<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Religion;
class ReligionController extends Controller
{
    public function index(){

        $religions = Religion::all();
        if($religions){
            return response(['status' => 'Success', 'message' => 'Religions fetched successfully', 'data' => $religions], 200);
        }
        return response(['status_code' => '422','status'=>'Error', 'message' => 'religion not exist'], 422);
    }
}
