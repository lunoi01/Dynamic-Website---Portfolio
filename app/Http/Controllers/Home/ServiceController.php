<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Image;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    

       public function AddServiceInfo(){

        $categories = Service::orderBy('service_category','ASC')->get();
        return view('admin.service.serviceInfo_add',compact('categories'));
    }// End Method


    public function StoreServiceInfo(Request $request){

        $image = $request->file('service_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

           Image::make($image)->resize(430,327)->save('upload/service/'.$name_gen);
           $save_url = 'upload/service/'.$name_gen;

           Service::insert([
                'service_category' => $request->service_category,
                'service_description' => $request->service_description,
                'service_point' => $request->service_point,
                'service_image' => $save_url,
               'created_at' => Carbon::now(),

           ]); 
           $notification = array(
           'message' => 'Service Inserted Successfully', 
           'alert-type' => 'success'
       );

       return view('admin.service.serviceInfo_add')->with($notification);
    }


       public function AllServiceInformation(){
        $service = Service::orderBy('id','ASC')->get();
        return view('admin.service.service_information',compact('service'));
        }

        public function EditServiceinfo($id){

            $service = Service::findOrFail($id);
            
            return view('admin.service.service_edit',compact('service'));
        }// End Method


         public function UpdateServiceInfo(Request $request){

            $service = $request->id;

            if ($request->file('service_image')) {
            $image = $request->file('service_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020,519)->save('upload/service/'.$name_gen);
            $save_url = 'upload/service/'.$name_gen;
    
               Service::findOrFail($service)->update([
                   'service_category' => $request->service_category,
                   'service_description' => $request->service_description,
                   'service_point' => $request->service_point,
                    'service_image' => $save_url,
               ]); 
    
               $notification = array(
               'message' => 'Service Updated Successfully', 
               'alert-type' => 'success'
               );
    
           return redirect()->route('service.info')->with($notification);
            }else{

                Service::findOrFail($service)->update([
                    'service_category' => $request->service_category,
                    'service_description' => $request->service_description,
                    'service_point' => $request->service_point,
                ]); 
    
                $notification = array(
                'message' => 'Service Updated without Image Successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('service.info')->with($notification);
            } // End Else
    
        } // end method

        public function DeleteService($id){

            $service = Service::findOrFail($id);
            $img = $service->service_image;
            unlink($img);

            Service::findOrFail($id)->delete();

                $notification = array(
                'message' => 'Service Deleted Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);       

        } // End Method 
        
}
