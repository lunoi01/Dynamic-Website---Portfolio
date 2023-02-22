<?php

namespace App\Http\Controllers\Home;
use App\Models\WPTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WPTitleController extends Controller
{
    public function WPTitle(){
        $service = WPTitle::latest()->get();
        return view('admin.WorkingProcess.wp_Title',compact('service'));
    }

     public function EditWPTitle($id){
         $service = WPTitle::findOrFail($id);;
       
         $categories = WPTitle::orderBy('wp_title','ASC')->get();
         
         return view('admin.WorkingProcess.edit_wptitle',compact('service','categories'));
     }// End Method
    

     public function UpdateWPTitle(Request $request){

         $service = $request->id;


            WPTitle::findOrFail($service)->update([
                'wp_title' => $request->wp_title

            ]); 

            $notification = array(
            'message' => 'Working Process Title Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

        } // end method
}
