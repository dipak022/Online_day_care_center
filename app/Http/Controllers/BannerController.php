<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Banner;
use DB;
class BannerController extends Controller
{
    public function Banner(){
        return view('backend.banner.add');
    }

    public function BannerStore(Request $request){
        //return dd($request->all());
        $imageName = $request->file('image');
        $image = $imageName->getClientOriginalName();
        $directory = 'images/banner/';
        $imgUrl = $directory.$image;
        $imageName->move($directory,$image);



        $banner = new Banner();
        $banner->title = $request->title;
        $banner->Short_title = $request->Short_title;
        $banner->offer_percentage = $request->offer_percentage;
        $banner->duration = $request->duration;
        $banner->image = $imgUrl;
        $banner->banner_status = $request->banner_status;
        $done = $banner->save();

        if ($done) {
            $notification = array(
                'message' => 'Banner Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Added Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function BannerManage(){
        $banners= Banner::all();
        return view('backend.banner.manage',compact('banners'));
    }

    public function BannerActive($id){
        $banner = Banner::find($id);
        //$category = new Category();
        $banner->banner_status = 0;
        $done = $banner->save();
        if ($done) {
            $notification = array(
                'message' => 'Banner Status Inactive Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function BannerInactive($id){
        $banner = Banner::find($id);
        $banner->banner_status = 1;
        $done = $banner->save();
        if ($done) {
            $notification = array(
                'message' => 'Banner Status Active Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function BannerDelete($id){
        $banner = Banner::find($id);
        $done = $banner->delete();
        if ($done) {
            $notification = array(
                'message' => 'Banner Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function BannerUpdate(Request $request){

        $check_image= $request->file('image');
        if($check_image){
            $oldImage = $request->oldimage;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $banner = Banner::find($request->id);
            $imageName = $request->file('image');
            $image = $imageName->getClientOriginalName();
            $directory = 'images/banner/';
            $imgUrl = $directory.$image;
            $imageName->move($directory,$image);


            $banner->title = $request->title;
            $banner->Short_title = $request->Short_title;
            $banner->offer_percentage = $request->offer_percentage;
            $banner->duration = $request->duration;
            $banner->image = $imgUrl;
            $done = $banner->save();
            

        }else{
            $banner = Banner::find($request->id);
            $banner->title = $request->title;
            $banner->Short_title = $request->Short_title;
            $banner->offer_percentage = $request->offer_percentage;
            $banner->duration = $request->duration;
            $done = $banner->save();

        }
        


        if ($done) {
            $notification = array(
                'message' => 'Banner Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Banner Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }
}
