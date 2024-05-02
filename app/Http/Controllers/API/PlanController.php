<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChoosePlan;

class PlanController extends Controller
{
   public function index()
   {
    $plans=Plan::all();
    return response(['status' => 'Success', 'message' => 'Get plans list successfully', 'data' => $plans], 200);

   }
   
   public function myPlans($userId)
   {
      $userId=User::where('userId',$userId)->first();
      
      $email=$userId->email ?? "";
      $plans = ChoosePlan::where('email', $email)->get();
      return response([
         'status_code' => '200',
         'status' => 'Success',
         'message' => 'Selected plan',
         'data' => $plans
      ], 200);
   }
}
