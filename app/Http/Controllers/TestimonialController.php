<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;

class TestimonialController extends Controller
{
    public function dash_testimonials_index(){

        $testimonials = DB::table('testimonials')->get();

        return view('backend.testimonials', ['testimonials' => $testimonials]);
    }

    // new testimoinal adding form
    public function dash_testimonial_add_new_form_view(){
        return view('backend.testimonial-add-new-form');
    }

    //new testimonial add form process
    public function dash_testimonial_add_new_form_process(Request $request){


        // process images and then move to uploads folder
        if($request->hasFile('provider_image')){

            $image = $request->file('provider_image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'), $image_name);


            //all data for new campaign
            $testimoinals_data = array(
                'provider_name'    => $request->provider_name,
                'designation' => $request->designation,
                'feedback' => $request->feedback,
                'provider_image'    => $request->provider_image,
                
            );

            $response = DB::table('testimonials')->insert($testimoinals_data);

            return redirect('/testimonials')->with('testimonials_add_success', 'New Testimonials Added successfully');
        }
    }

    // Testimonial Edit Form View
    public function dash_testimonial_edit_form_view($id){

        $testimonial = DB::table('testimonials')->where('id', $id)->first();

        return view('backend.testimonial-edit-form', ['testimonial' => $testimonial]);

    }

    // Testimonial Edit form process
    public function dash_testimonial_edit_form_process(Request $request, $id){
        
        // process images and then move to uploads folder
        if($request->hasFile('provider_image')){

            $image = $request->file('provider_image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'), $image_name);


            //all data for new campaign
            $testimoinals_data = array(
                'provider_name'    => $request->provider_name,
                'designation' => $request->designation,
                'feedback' => $request->feedback,
                'provider_image'    => $image_name,
                
            );

            $response = DB::table('testimonials')->where('id', $id)->update($testimoinals_data);

            return redirect('/testimonials')->with('testimonials_update_success', 'New Testimonials updated successfully');
        }

    }

    // Testimonial Delete
    public function dash_testimonial_delete($id){

        $testimonial = DB::table('testimonials')->where('id', $id)->first();

        if($testimonial){
            if($testimonial->provider_image){
                $image_file = public_path('uploads/testimonials/'.$testimonial->provider_image);

                if(File::exists($image_file)){
                    File::delete($image_file);
                }
            }

            DB::table('testimonials')->where('id', $id)->delete();
            return redirect()->back();
        }

    }

}

