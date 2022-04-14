<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Setting;
use App\Models\Product;
use DB;
class SeetingController extends Controller
{
    
    public function Seeting(){
       $setting = Setting::find(1);
        return view('backend.seeting.update',compact('setting'));
    }
    
    public function SettingUpdate(Request $request){

        $check_image= $request->file('image');
        if($check_image){
            $oldImage = $request->oldimage;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $setting = Setting::find($request->id);
            $imageName = $request->file('image');
            $image = $imageName->getClientOriginalName();
            $directory = 'images/setting/';
            $imgUrl = $directory.$image;
            $imageName->move($directory,$image);


            $setting->email = $request->email;
            $setting->phone = $request->phone;
            $setting->detail = $request->detail;
            $setting->facebookb_link = $request->facebookb_link;
            $setting->twiter_link = $request->twiter_link;
            $setting->instragram_link = $request->instragram_link;
            $setting->linkdin_link = $request->linkdin_link;
            $setting->image = $imgUrl;
            $done = $setting->save();
            

        }else{
            $setting = Setting::find($request->id);
            $setting->email = $request->email;
            $setting->phone = $request->phone;
            $setting->detail = $request->detail;
            $setting->facebookb_link = $request->facebookb_link;
            $setting->twiter_link = $request->twiter_link;
            $setting->instragram_link = $request->instragram_link;
            $setting->linkdin_link = $request->linkdin_link;
            $done = $setting->save();

        }
        


        if ($done) {
            $notification = array(
                'message' => 'Setting Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'setting Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }
}
