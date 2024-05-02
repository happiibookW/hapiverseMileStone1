<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function makeGroupAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'groupId' => 'required',
            'userId' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 'Error', 'result' => $validator->errors()->all()], 422);
        }

        $groupMember = GroupMember::where('groupId', $request->groupId)->where('groupMemberId', $request->userId)->first();
        if(empty($groupMember))
        {
            return response(['status' => 'Error', 'result' => 'member not found in group'], 422);

        }
        $groupMember->update(['memberRole' => 'Admin']);
        return response(['status_code' => '200', 'status' => 'Success', 'message' => 'Admin created'], 200);
    }
}
