<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceTitle;
use Image;
use Illuminate\Support\Carbon;

class ServiceTitleController extends Controller
{
    public function ServiceTitle(){
        $service = ServiceTitle::latest()->get();
        return view('admin.service.service_title',compact('service'));
    }

    public function EditServiceTitle($id){
        $service = ServiceTitle::findOrFail($id);;
        return view('admin.service.Editservice_title',compact('service'));
    }

    public function UpdateServiceTitle(Request $request){

        $service = $request->id;


           ServiceTitle::findOrFail($service)->update([
               'service_title' => $request->service_title

           ]); 

           $notification = array(
           'message' => 'Service Updated Successfully', 
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification); 

       } // end method
}
