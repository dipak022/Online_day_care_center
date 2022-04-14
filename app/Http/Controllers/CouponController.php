<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Coupon;
class CouponController extends Controller
{
    public function Coupon(){
        return view('backend.coupon.addCoupon');
    }
   

    public function CouponStore(Request $request){
        //return dd($request->all());
        $coupon = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->cart_min_value = $request->cart_min_value;
        $coupon->expired_on = $request->expired_on;
        $coupon->coupon_status = $request->coupon_status;
        $coupon->added_on = $request->added_on;
        $done = $coupon->save();

        if ($done) {
            $notification = array(
                'message' => 'Coupon Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Coupon Added Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function CouponManage(){
        $coupons= Coupon::all();
        return view('backend.coupon.manageCoupon',compact('coupons'));
    }

    public function CouponActive($id){
        $coupon = Coupon::find($id);
        //$category = new Category();
        $coupon->coupon_status = 0;
        $done = $coupon->save();
        if ($done) {
            $notification = array(
                'message' => 'Coupon Status Inactive Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Coupon Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function CouponInactive($id){
        $coupon = Coupon::find($id);
        $coupon->coupon_status = 1;
        $done = $coupon->save();
        if ($done) {
            $notification = array(
                'message' => 'Coupon Status Active Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Coupon Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function CouponDelete($id){
        $coupon = Coupon::find($id);
        $done = $coupon->delete();
        if ($done) {
            $notification = array(
                'message' => 'Coupon Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Coupon Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function CouponUpdate(Request $request){
        $coupon = Coupon::find($request->id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->cart_min_value = $request->cart_min_value;
        $coupon->expired_on = $request->expired_on;
        $coupon->added_on = $request->added_on;
        $done = $coupon->save();
        if ($done) {
            $notification = array(
                'message' => 'Coupon Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Coupon Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }
}
