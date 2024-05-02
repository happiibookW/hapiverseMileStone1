<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OccupationType;
use App\Models\Occupation;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Validator;
class OccupationTypeController extends Controller
{
    public function index(){

        $occupation_types = OccupationType::all();
        if($occupation_types){
            return response(['status' => 'Success', 'message' => 'Occupation types fetched successfully', 'data' => $occupation_types], 200);
        }
        return response(['status_code' => '422','status'=>'Error', 'message' => 'Occupations not exist'], 422);
    }

    public function get_occupations(Request $request,$userId){

        $occupations = Occupation::where('userId',$userId)->get();
        if($occupations){
            return response(['status' => 'Success', 'message' => 'Occupations fetched successfully', 'data' => $occupations], 200);
        }
        return response(['status_code' => '422','status'=>'Error', 'message' => 'Occupations not exist'], 422);
    }

    public function store_occupations(Request $request){

        $occupation = Occupation::create([
            'userId' => $request->userId,
            'title' => $request->work_title,
            'description' => $request->work_description,
            'location' => $request->work_location,
            'startDate' => $request->work_startDate,
            'endDate' => $request->work_endDate,
            'current_working' => $request->current_working,
            'workSpaceName'=>$request->workspace_name,
            'occupation_id' => $request->occupation_type
        ]);
        if($occupation){
            return response(['status' => 'Success', 'message' => 'Occupations added successfully', 'data' => $occupation], 200);
        }
        return response(['status_code' => '422','status'=>'Error', 'message' => 'Occupations not added'], 422);

    }

    public function update_occupations(Request $request,$id){

        $occupation = Occupation::find($id);

        if($occupation) {
            $occupation->userId = $request->userId;
            $occupation->title = $request->work_title;
            $occupation->description = $request->work_description;
            $occupation->location = $request->work_location;
            $occupation->startDate = $request->work_startDate;
            $occupation->endDate = $request->work_endDate;
            $occupation->current_working = $request->current_working;
            $occupation->workSpaceName = $request->workspace_name;
            $occupation->occupation_id = $request->occupation_type;

            $occupation->save();

            return response(['status' => 'Success', 'message' => 'Occupation updated successfully', 'data' => $occupation], 200);
        }

        return response(['status_code' => '422', 'status' => 'Error', 'message' => 'Occupation not found'], 422);


    }

    public function destroy(Request $request, $id)
    {
        // Validate the request parameters
        $validator = Validator::make(['id' => $id], [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $occupation = Occupation::find($id);
        if ($occupation) {
            // Delete the occupation
            $occupation->delete();
            return response(['status' => 'Success', 'message' => 'Occupation deleted', 'data' => $occupation], 200);
        } else {
            return response(['status' => 'Success', 'message' => 'Occupation not found', 'data' => []], 200);
        }
    }
}
