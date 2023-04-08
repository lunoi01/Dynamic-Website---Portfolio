<?php

namespace App\Http\Controllers\Home;
use App\Models\WPTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;

class WPTitleController extends Controller
{
    public function WPTitle(){
        $service = WPTitle::latest()->get();
        return view('admin.working_process.wp_Title',compact('service'));
    }

     public function EditWPTitle($id){
         $service = WPTitle::findOrFail($id);
       
         $categories = WPTitle::orderBy('wp_title','ASC')->get();
         
         return view('admin.working_process.edit_wptitle',compact('service','categories'));
     }// End Method



     public function UpdateWPTitle(Request $request){

        $wp_id = $request->id;

       if ($request->file('logo')) {
           $image = $request->file('logo');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(430,327)->save('upload/work_process/'.$name_gen);
           $save_url = 'upload/work_process/'.$name_gen;

           WPTitle::findOrFail($wp_id)->update([
            'wp_title' => $request->wp_title,
            'wp_desc' => $request->wp_desc,
            'logo' => $save_url,

           ]); 
           $notification = array(
           'message' => 'WP Updated with Image Successfully', 
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification); 

       } else{

           WPTitle::findOrFail($wp_id)->update([
            'wp_title' => $request->wp_title,
            'wp_desc' => $request->wp_desc, 

           ]); 

           $notification = array(
           'message' => 'WP Updated without Image Successfully', 
           'alert-type' => 'success'
       );

       return redirect()->route('WP.title')->with($notification);
           } // end Else

        } // End Method

        public function DeleteWP($id){

            $WPT = WPTitle::findOrFail($id);
            $img = $WPT->logo;
            unlink($img);

            WPTitle::findOrFail($id)->delete();

                $notification = array(
                'message' => 'Work Process Deleted Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('WP.title')->with($notification);    

        } // End Method 
}
    



