<?php

namespace App\Http\Controllers;

use App\Models\Event as ModelsEvent;
use Event;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\BusinessProduct;
use App\Models\EventImage;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        try {
            $xx=array();
        if(Auth::user()->userTypeId==1){
            $loggedIn = \Auth::user()->getUserDetail ?? "";
            $events = ModelsEvent::all();

            $products = BusinessProduct::where('businessId', $loggedIn->userId)->get();
        }else{

            $loggedIn = Auth::user()->getBusinessDetail ?? "";
            $events = ModelsEvent::where('businessId', $loggedIn->businessId)->get();
            $products = BusinessProduct::where('businessId', $loggedIn->businessId)->get();

        }

        foreach($events as $p => $eventImages){
            $x= EventImage::where('eventId',$eventImages->eventId)->get();
            foreach($x as $xI => $eventsImages){
                $xx[$xI]=$eventsImages->imageUrl;
            }

            $events[$p]["businessEImages"]=$xx;
        }
        // dd($events);
        return view('business.event.index', compact('events', 'loggedIn', 'products'));
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }

    }

    public function store(Request $request)
    {
        try {
            $loggedIn = Auth::user()->getBusinessDetail ?? "";
            $businessId = $loggedIn->businessId;

            $event = ModelsEvent::create([
                'eventName' => $request->eventName,
                'eventDescription' => $request->eventDescription,
                'eventDate' => date('Y-m-d', strtotime($request->eventDate)),
                'eventTime' => $request->eventTime,
                'businessId' => $businessId,
            ]);
            echo"<pre>";
            print_r($event);
            die();
            $image = $request->file('eventImage');
            foreach ($image as $img => $value) {
                $fileName = 'event-'.time() .$img. '.' . $value->extension();
                $imageURL='business/event/'.'event-'.time() .$img. '.' . $value->extension();
                $path = '/business/event';
                $value->move($path, $fileName);
                EventImage::create(['imageUrl' => $imageURL, 'eventId' => $event->id]);
            }
            return redirect()->route('business-events');
        } catch (\Throwable $th) {

           return redirect()->back();
        }

    }
    public function edit(Request $request){
        try {
            $eventId=$request->query('eventId');
            $findEvent=ModelsEvent::where('eventId',$eventId)->first();
            $findEventImage=EventImage::where('eventId',$eventId)->first();
            $array=array(
                'eventId'=> $eventId,
                'eventName'=> $findEvent->eventName,
                'eventDescription'=> $findEvent->eventDescription,
                'eventTime'=> $findEvent->eventTime,
                'eventDate'=>$findEvent->eventDate,
                'eventImage'=> env('APPLICATION_URL') .$findEventImage->imageUrl
            );

            echo json_encode($array);
        } catch (\Throwable $th) {
            return redirect()->back();
        }

    }
    public function update(Request $request){
        try {
            $update = ModelsEvent::where('eventId',$request->eventIdEdit)->update([
                'eventName'=> $request->eventName,
                'eventDescription'=> $request->eventDescription,
                'eventTime'=> $request->eventTime,
                'eventDate'=>$request->eventDate,

            ]);
            // dd($update);
            return redirect()->route('business-events');
        } catch (\Throwable $th) {
            return redirect()->back();
        }

    }
    public function deleteBusinessEvent($eId){
        try {
            ModelsEvent::where('eventId',$eId)->delete();
            EventImage::where('eventId',$eId)->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }

    }
    public function viewBusinessEvent($eId){
        try {
            $event=ModelsEvent::where('eventId',$eId)->first();
            $businessDetail = \Auth::user()->getBusinessDetail ?? "";
            $eventImages=EventImage::where('eventId',$eId)->get();
            return view('business.event.details', compact('event','eventImages','businessDetail'));
        } catch (\Throwable $th) {
            return redirect()->back();
        }

    }
}
