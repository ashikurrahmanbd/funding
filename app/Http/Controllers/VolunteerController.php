<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;

class VolunteerController extends Controller
{
    public function dash_volunteers_index(){

        $volunteers = DB::table('volunteers')->get();

        return view('backend.volunteers', ['volunteers' => $volunteers]);
    }

    // add new volunteer form
    public function dash_volunteer_add_new_form(){
        return view('backend.volunteer-add-new-form');
    }

    // add new volunteer form process
    public function dash_volunteer_add_new_form_process(Request $request){
        // process images and then move to uploads folder
        if($request->hasFile('volunteer_image')){

            $image = $request->file('volunteer_image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/volunteers'), $image_name);


            //all data for new campaign
            $volunteers_data = array(
                'volunteer_name'    => $request->volunteer_name,
                'designation' => $request->designation,
                'short_description' => $request->bio,
                'volunteer_image'    => $image_name,
                
            );

            $response = DB::table('volunteers')->insert($volunteers_data);

            return redirect('/volunteers')->with('volunteers_add_success', 'New Volunteer Added successfully');
        }
    }

    // volunteer delete
    public function dash_volunteer_delete($id){
        $volunteer = DB::table('volunteers')->where('id', $id)->first();

        if($volunteer){
            if($volunteer->volunteer_image){
                $image_file = public_path('uploads/volunteers/'.$volunteer->volunteer_image);

                if(File::exists($image_file)){
                    File::delete($image_file);
                }
            }

            DB::table('volunteers')->where('id', $id)->delete();
            return redirect()->back();
        }
    }

    // Volunteer edit form view
    public function dash_volunteer_edit_form_view($id){

        $volunteer = DB::table('volunteers')->where('id', $id)->first();
        return view('backend.volunteer-edit-form', ['volunteer' => $volunteer]);

    }

    // Volunteer Edit form Process
    public function volunteer_edit_form_process(Request $request, $id){

        // process images and then move to uploads folder
        if($request->hasFile('volunteer_image')){

            $image = $request->file('volunteer_image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/volunteers'), $image_name);


            //all data for new campaign
            $volunteer_data = array(
                'volunteer_name'    => $request->volunteer_name,
                'designation' => $request->designation,
                'short_description' => $request->bio,
                'volunteer_image'    => $image_name
            );

            DB::table('volunteers')->where('id', $id)->update($volunteer_data);
            return redirect('/volunteers')->with('volunteer_update_success', 'Volunteer Updated successfully');
        }else{

            //all data for new campaign
            $volunteer_data = array(
                'volunteer_name'    => $request->volunteer_name,
                'designation' => $request->designation,
                'short_description' => $request->bio,
                'volunteer_image'    => $image_name
            );

            DB::table('volunteers')->where('id', $id)->update($volunteer_data);
            return redirect('/volunteers')->with('volunteer_update_success', 'Volunteer Updated successfully');
        }

    }

}
