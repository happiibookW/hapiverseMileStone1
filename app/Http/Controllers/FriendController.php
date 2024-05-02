<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Friend;
use App\Models\MstAuthorization;
use App\Models\MstUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FriendController extends Controller
{
    public function index()
    {
        try {
            $loggedInUser = Auth::user()->getUserDetail;

            // $users = MstUser::all();


            if (!empty($loggedInUser->lat) && !empty($loggedInUser->long)) {
                $query = DB::table('mstuser as m')
                    ->select('*', DB::raw('(ACOS(
                            COS(RADIANS(m.lat)) * COS(RADIANS(?)) * COS(RADIANS(m.long) - RADIANS(?)) +
                            SIN(RADIANS(m.lat)) * SIN(RADIANS(?))
                        ) * 6371) AS distance', [$loggedInUser->lat, $loggedInUser->long, $loggedInUser->lat]))
                    ->having('distance', '<=', 10000)
                    ->orderBy('distance');

                // Manually bind parameters
                $query->addBinding($loggedInUser->lat, 'select');
                $query->addBinding($loggedInUser->long, 'select');
                $query->addBinding($loggedInUser->lat, 'select');

                // Now execute the query
                $users = $query->get();


            } else {
                $users = MstUser::all();
            }

            $businesses = Business::all();
            $loggedIn = \Auth::user()->getUserDetail;
            $getFriendsList = Friend::where('userId', $loggedIn->userId)->where('type',1)->get();

            $friendDetail=[];
            $friendNames=[];
            $followeId = [];
            foreach ($getFriendsList as $list) {
                $followeId[] = $list->followerId;
            }
            $checkUserType = MstAuthorization::whereIn('userId', $followeId)->get();
            if($checkUserType){
                foreach ($checkUserType as $user) {
                    if ($user->userTypeId == 1) {
                        $friendDetail[] = MstUser::where('userId', $user->userId)->get();
                    } else if ($user->userTypeId == 2) {
                        $friendDetail[] = Business::where('businessId', $user->userId)->get();
                    }
                }
            }
            // dd($userDetail);
            return view('user-web.friends.index', compact('users','getFriendsList', 'friendDetail','loggedIn','friendNames','businesses'));
        } catch (\Throwable $th) {

            return redirect()->route('business-dashboard');
        }

    }

    public function unfriend($friendId)
    {

        try {
            if(Auth::User()->userTypeId==1){
                $loggedIn = \Auth::user()->getUserDetail;
                $unfriend = Friend::where('userId', $loggedIn->userId)->where('followerId', $friendId)->where('type',1)->delete();
                return redirect()->route('friends')->withSuccess(__('Unfriend successfully'));
            }else{
                $loggedIn = \Auth::user()->getBusinessDetail;
                $unfriend = Friend::where('userId', $loggedIn->businessId)->where('followerId', $friendId)->where('type',1)->delete();
                return redirect()->route('business-friends')->withSuccess(__('Unfriend successfully'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
    }


    public function businessFriends()
    {
        try {
            $loggedIn = \Auth::user()->getBusinessDetail;
            $getFriendsList = Friend::where('userId', $loggedIn->businessId)
                ->get();
            return view('business.friends', compact('getFriendsList'));
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }

    }

    public function addfriend(Request $req, $friendId)
    {
        try {
            $loggedIn = \Auth::User()->getUserDetail;
            //dd($friendId);
            Friend::create([
                'userId' =>  $loggedIn->userId,
                'followerId' => $friendId,
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }

    }

    public function unfollow_friend(Request $request)
    {
        try {

            if(Auth::User()->userTypeId==1){
                $loggedIn = \Auth::user()->getUserDetail;
                $unfriend = Friend::where('userId', $loggedIn->userId)->where('followerId', $request->userId)->where('type',3)->delete();
                return response()->json(['status' => 'true','message'=>'UnFollow successfully']);
            }else{
                $loggedIn = \Auth::user()->getBusinessDetail;
                $unfriend = Friend::where('userId', $loggedIn->businessId)->where('followerId', $request->userId)->where('type',3)->delete();
                return response()->json(['status' => 'true','message'=>'UnFollow successfully']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'true','message'=> $th->getMessage()]);
        }
    }
    public function follow_friend(Request $request)
    {
        try {

            if(Auth::User()->userTypeId==1){
                $loggedIn = \Auth::user()->getUserDetail;
                Friend::create(['userId' =>  $loggedIn->userId,'followerId' =>  $request->userId,'type'=>3]);
                return response()->json(['status' => 'true','message'=>'Follow successfully']);
            }else{
                $loggedIn = \Auth::user()->getBusinessDetail;
                Friend::create(['userId' =>  $loggedIn->businessId,'followerId' => $request->userId,'type'=>3]);
                return response()->json(['status' => 'true','message'=>'Follow successfully']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'true','message'=> $th->getMessage()]);
        }
    }

    public function remove_follower(Request $request)
    {
        try {

            if(Auth::User()->userTypeId==1){
                $loggedIn = \Auth::user()->getUserDetail;
                $unfriend = Friend::where('userId', $request->userId)->where('followerId', $loggedIn->userId)->where('type',2)->delete();
                return response()->json(['status' => 'true','message'=>'Remove successfully']);
            }else{
                $loggedIn = \Auth::user()->getBusinessDetail;
                $unfriend = Friend::where('userId', $request->userId)->where('followerId', $loggedIn->businessId)->where('type',2)->delete();
                return response()->json(['status' => 'true','message'=>'Remove successfully']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'true','message'=> $th->getMessage()]);
        }
    }

    public function add_friend(Request $request){


        $loggedIn = \Auth::User()->getUserDetail;
        $friendId = $request->user_id;
        $friendType = $request->friend;
        $new_friend_type = ($friendType === 'friend') ? 'unfriend' : 'friend';
        if($friendType == 'Add Friend'){
            Friend::create(['userId' =>  $loggedIn->userId,'followerId' => $friendId,'type'=>1]);
        }else{
            Friend::where('userId', $loggedIn->userId)->where('followerId', $friendId)->delete();
        }
        return [
            'status' => 'success',
            'message' => 'Friend added successfully',
            'data' => $new_friend_type
        ];
    }

}
