<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FeedbackController extends Controller
{
    public function AllFeedback(){
        $feed = Feedback::latest()->get();
        return view('admin.feedback.all_feedback',compact('feed'));
    }

    public function AddFeedback(){
        return view('admin.feedback.add_feedback');
    }

    public function StoreFeedback(Request $request){

           Feedback::insert([
                'feedback_text' => $request->feedback_text,
                'feedback_name' => $request->feedback_name,
               'created_at' => Carbon::now(),

           ]); 
           $notification = array(
           'message' => 'Feedback Inserted Successfully', 
           'alert-type' => 'success'
       );

       return redirect()->route('all.feedback')->with($notification);
    }

    public function EditFeedback($id){

        $feed = Feedback::findOrFail($id);

        return view('admin.feedback.edit_feedback',compact('feed'));
    }// End Method

    public function UpdateFeedback(Request $request){

        $feed = $request->id;


           Feedback::findOrFail($feed)->update([
               'feedback_text' => $request->feedback_text,
               'feedback_name' => $request->feedback_name,

           ]); 
           $notification = array(
           'message' => 'Feedback Updated Successfully', 
           'alert-type' => 'success'
       );

       return redirect()->route('all.feedback')->with($notification);

       } 

    public function DeleteFeedback($id){

        Feedback::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Feedback Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);       

    } // End Method
}
