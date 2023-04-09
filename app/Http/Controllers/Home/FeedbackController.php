<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\FeedImages;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

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

    public function FeedMultiImage(){

        return view('admin.feedback.multimage');
    } // End Method

    public function StoreFeedImage(Request $request){

        $image = $request->file('feed_image');

        foreach ($image as $feed_image) {

           $name_gen = hexdec(uniqid()).'.'.$feed_image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($feed_image)->resize(220,220)->save('upload/feed_image/'.$name_gen);
            $save_url = 'upload/feed_image/'.$name_gen;

            FeedImages::insert([

                'feed_image' => $save_url,
                'created_at' => Carbon::now()

            ]); 

             } // End of the froeach


            $notification = array(
            'message' => 'Feed Image Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.feed.image')->with($notification);

    } // End Method

    public function AllFeedImage(){

        $feed_img = FeedImages::all();
        return view('admin.feedback.all_multimage',compact('feed_img'));
    }

    public function EditFeedImage($id){

        $feed_img = FeedImages::findOrFail($id);
        return view('admin.feedback.edit_feed_image',compact('feed_img'));

    }//End Method

    public function UpdateFeedImage(Request $request){

        $feed_img_id = $request->id;

     if ($request->file('feed_image')) {
         $image = $request->file('feed_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

         Image::make($image)->resize(220,220)->save('upload/feed_image/'.$name_gen);
         $save_url = 'upload/feed_image/'.$name_gen;

         FeedImages::findOrFail($feed_img_id)->update([

             'feed_image' => $save_url,

         ]); 
         $notification = array(
         'message' => 'Feed Image Updated Successfully', 
         'alert-type' => 'success'
     );

     return redirect()->route('all.feed.image')->with($notification);

     }
  }// End Method 

  public function DeleteFeedImage($id){

    $feed = FeedImages::findOrFail($id);
    $img = $feed->feed_image;
    unlink($img);
    
    FeedImages::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Feed Image Deleted Successfully', 
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}// End Method
}
