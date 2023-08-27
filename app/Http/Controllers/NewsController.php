<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    public function dash_news_index(){

        $all_news = DB::table('latest_news')->get();

        return view('backend.news', ['all_news' => $all_news]);
    }

    // add new form
    public function dash_news_add_new_form_view(){
        return view('backend.news-add-new-form');
    }

    // post news
    public function dash_news_add_new_form_process(Request $request){

        // process images and then move to uploads folder
        if($request->hasFile('news_thumbnail')){

            $image = $request->file('news_thumbnail');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $image_name);


            //all data for new campaign
            $news_data = array(
                'title'    => $request->news_title,
                'description' => $request->news_description,
                'post_date' => $request->post_date,
                'thumbnail'    => $image_name,
                
            );

            $response = DB::table('latest_news')->insert($news_data);

            return redirect('/news')->with('news_add_success', 'New News Added successfully');
        }

    }

    // News Delete
    public function dash_news_delete($id){

        $news = DB::table('latest_news')->where('id', $id)->first();
        if($news){
            if($news->thumbnail){
                $image_file = public_path('uploads/news/'.$news->thumbnail);

                if(File::exists($image_file)){
                    File::delete($image_file);
                }
            }

            DB::table('latest_news')->where('id', $id)->delete();
            return redirect()->back();
        }

    }

    // News Edit form
    public function dash_news_edit_form($id){

        $s_news = DB::table('latest_news')->where('id', $id)->first();

        return view('backend.news-edit-form', ['s_news' => $s_news]);

    }

    // News Edit Form Process
    public function dash_news_edit_form_process(Request $request, $id){
        // process images and then move to uploads folder
        if($request->hasFile('news_thumbnail')){

            $image = $request->file('news_thumbnail');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $image_name);


            //all data for new campaign
            $news_data = array(
                'title'    => $request->news_title,
                'description' => $request->news_description,
                'post_date' => $request->post_date,
                'thumbnail'    => $image_name,
                
            );

            DB::table('latest_news')->where('id', $id)->update($news_data);

            return redirect('/news')->with('news_updated_success', 'News updated successfully');
        }
    }

    

}
