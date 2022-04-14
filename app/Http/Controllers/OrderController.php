<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Order;
use DB;
class OrderController extends Controller
{
    
    public function ManageReport(){
        $orders=DB::table('orders')
                           ->join('users','orders.user_id','users.id')
                           ->select('orders.*','users.name')
                           ->get();
        return view('backend.report.manage',compact('orders'));
    }

    
    
    public function deliveryDone($id){
        $order = Order::find($id);
        $order->status = "delivery";
        $done = $order->save();
        if ($done) {
            $notification = array(
                'message' => 'product Status Inactive Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'product Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function ReportDelete($id){

        $order = Order::find($id);
        $done = $order->delete();
        if ($done) {
            $notification = array(
                'message' => 'order Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'order Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }
}
