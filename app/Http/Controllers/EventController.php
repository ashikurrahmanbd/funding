<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use DB;

class EventController extends Controller
{
    // events menu
    public function dash_events_index(){

        $events = DB::table('events')->get();

        return view('backend.events', ['events' => $events]);
    }

    // new event add form
    public function dash_event_add_new_form_view(){
        return view('backend.events-add-new-form');
    }

    // add new event form processes
    public function dash_event_add_new_form_process(Request $request){
        
        // process images and then move to uploads folder
        if($request->hasFile('event_cover')){

            $image = $request->file('event_cover');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $image_name);


            //all data for new campaign
            $event_data = array(
                'event_title'    => $request->event_title,
                'event_description' => $request->event_description,
                'event_location' => $request->event_location,
                'event_time'    => $request->event_time,
                'event_cover_image'    => $image_name
            );

            $response = DB::table('events')->insert($event_data);

           


            return redirect('/events')->with('event_add_success', 'New Event Added successfully');
        }

    }

    // event delete
    public function dash_event_delete($id){
        $event = DB::table('events')->where('id', $id)->first();

        if($event){
            if($event->event_cover_image){
                $image_file = public_path('uploads/events/'.$event->event_cover_image);

                if(File::exists($image_file)){
                    File::delete($image_file);
                }
            }

            DB::table('events')->where('id', $id)->delete();
            return redirect()->back();
        }

        
    }

    // Event Edit form view
    public function event_edit_form_view($id){

        $event = DB::table('events')->where('id', $id)->first();

        return view('backend.event-edit-form', ['event' => $event]);
    }

    // Edit event form process
    public function event_edit_form_process(Request $request, $id){

        // process images and then move to uploads folder
        if($request->hasFile('event_cover')){

            $image = $request->file('event_cover');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $image_name);


            //all data for new campaign
            $event_data = array(
                'event_title'    => $request->event_title,
                'event_description' => $request->event_description,
                'event_location' => $request->event_location,
                'event_time'    => $request->event_time,
                'event_cover_image'    => $image_name
            );

            DB::table('events')->where('id', $id)->update($event_data);
            return redirect('/events')->with('event_update_success', 'Event Updated successfully');
        }else{

            //all data for new campaign
            $event_data = array(
                'event_title'    => $request->event_title,
                'event_description' => $request->event_description,
                'event_location' => $request->event_location,
                'event_time'    => $request->event_time,
                'event_cover_image'    => $image_name
            );

            DB::table('events')->where('id', $id)->update($event_data);
            return redirect('/events')->with('event_update_success', 'Event Updated successfully');
        }

    }

}
