<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\LocationTrack;
use App\Models\MstUser;
use App\Models\LocationRequest;
use App\Models\Coins;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Event as ModelsEvent;
class CMSController extends Controller
{
    public function termsAndConditions(){
        return view('business.terms');
    }
    public function dataPolicy(){
        return view('business.data-policy');
    }
    public function privacyPolicy(){
        return view('business.privacy-policy');
    }
    public function aboutSite(){
        return view('business.about-hapiverse');
    }
    public function viewCalendar(Request $request){

        try {
            if($request->ajax()) {
                $data = Event::select('eventId as id','eventName as title','eventDate as start')
                           ->get();
                return response()->json($data);
            }
            return view('business.calendar');
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
        
    }



    public function translate(){
        try {
            if(Auth::User()->userTypeId==2){
                return view('business.translate');
            }
            else{
                return view('user-web.translate');
            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
        
    }
    public function JobView(){
        try {
            $loggedIn = \Auth::user()->getBusinessDetail->businessId ?? "";
         $jobs=DB::table('mstjobs')->where('businessId',  $loggedIn)->get();
        return view('business.add-Job',compact('jobs'));
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
        
    }

    public function JobStore(Request $request){
        $job=DB::table('mstjobs')->insert([
            "businessId"=>Auth::User()->getBusinessDetail->businessId,
            "jobTitle" =>$request->jobTitle,
            "companyName" =>$request->companyName,
            "workplaceType" =>$request->workplaceType,
            "jobLocation" =>$request->jobLocation,
            "jobType" =>$request->jobType,
            "jobDescription" =>$request->jobDescription,
        ]);

        return redirect()->route('business-dashboard');
    }
    public function JobFetch(){

        try {
            if(Auth::User()->userTypeId!=1){
                return redirect()->route('business-dashboard');
            }else{
                $jobs=DB::table('mstjobs')->get();
                // dd($jobs);
            return view('business.all-jobs',compact('jobs'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
        

    }


    public function JobDisplay($id){


        try {
            if(Auth::User()->userTypeId!=1){
                return redirect()->route('business-dashboard');
            }else{
                $jobs=DB::table('mstjobs')->where('jobId', $id)->get();
            return view('business.job_view',compact('jobs'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
       

    }
    public function DeleteJob($id){
            $jobs=DB::table('mstjobs')->where('jobId', $id)->delete();
        return redirect()->back();

    }
    public function UpdateJob(Request $request, $id){
            $jobs=DB::table('mstjobs')->where('jobId', $id)->update([
            'jobTitle' => $request->jobTitle,
            'companyName' => $request->companyName,
            'workplaceType' => $request->workplaceType,
            'jobLocation' => $request->jobLocation,
            'jobType' => $request->jobType,
            'jobDiscription' => $request->jobDescription,

        ]);;
        return redirect()->back();

    }


    public function locationSharing(){

        try {
            $loggedIn = Auth::user()->getUserDetail->userId;
            $locations = LocationTrack::where("receiverId",$loggedIn)->get();
    
    
    
            $requests = LocationRequest::where("userId",$loggedIn)->get();
    
            if(Auth::User()->userTypeId==2){
            return view('business.translate',compact('locations','requests'));
            }
            else{
               return view('user-web.locationsharing',compact('locations','requests'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
       
    }
    public function locationTracking(){

        try {
            $loggedIn = Auth::user()->getUserDetail->userId;
            $locations = LocationTrack::where("receiverId",$loggedIn)->get();



            $requests = LocationRequest::where("userId",$loggedIn)->get();

            if(Auth::User()->userTypeId==2){
            return view('business.translate',compact('locations','requests'));
            }
            else{
            return view('user-web.locationTracking',compact('locations','requests'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
        
    }

    public function RemoveLocation($recieverId){

        $locations = LocationTrack::where("trackLocationId",$recieverId)->delete();


       return redirect()->back();
    }

    public function rewardCenter(){
        try {
            $loggedIn = Auth::user()->getUserDetail->userId;
            $coins=Coins::where('userId', $loggedIn)->get();
            return view('user-web.rewardCenter',compact("coins"));
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }
     

    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        $loggedIn = Auth::user()->getBusinessDetail ?? "";
        $businessId = $loggedIn->businessId;

        switch ($request->type) {

           case 'add':
            $event = ModelsEvent::create([
                'eventName' => $request->title,
                'eventDescription' => $request->title,
                'eventDate' => $request->start,
                'businessId' => $businessId,
            ]);

              return response()->json($event);
             break;

           case 'update':
                $event = ModelsEvent::where('eventId',$request->id)->first();

                if ($event) {
                    $event->eventName = $request->title;
                    $event->eventDescription = $request->title;
                    $event->eventDate = $request->start;
                    $event->businessId = $businessId;
                    $event->save();
                    return response()->json($event);
                } else {
                    return response()->json(['error' => 'Event not found.'], 404);
                }
             break;

           case 'delete':
              $event = ModelsEvent::where('eventId',$request->id)->delete();
              return response()->json($event);
             break;

           default:
             # code...
             break;
        }
    }


}
