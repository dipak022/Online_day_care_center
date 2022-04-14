<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
class DeliveryBoyController extends Controller
{
    public function Delivery(){
        return view('backend.delivery.addDelivery');
    }

    
    public function DeliveryStore(Request $request){
        //return dd($request->all());
        $delivery_boy = new Delivery_boy();
        $delivery_boy->delivery_boy_name = $request->delivery_boy_name;
        $delivery_boy->delivery_boy_phone = $request->delivery_boy_phone;
        $delivery_boy->delivery_boy_password = Hash::make($request->delivery_boy_password);
        $delivery_boy->delivery_boy_status = $request->delivery_boy_status;
        $done = $delivery_boy->save();

        if ($done) {
            $notification = array(
                'message' => 'Create Account Delivery Boy Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Create Account Delivery Boy Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    
    public function DeliveryManage(){
        $delivery_boys= Delivery_boy::all();
        return view('backend.delivery.manageDelivery',compact('delivery_boys'));
    }

    
    public function DeliveryActive($id){
        $delivery_boy = Delivery_boy::find($id);
        //$category = new Category();
        $delivery_boy->delivery_boy_status = 0;
        $done = $delivery_boy->save();
        if ($done) {
            $notification = array(
                'message' => 'Delivery Status Inactive Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Category Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function DeliveryInactive($id){
        $delivery_boy = Delivery_boy::find($id);
        $delivery_boy->delivery_boy_status = 1;
        $done = $delivery_boy->save();
        if ($done) {
            $notification = array(
                'message' => 'Delivery Status Active Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Category Status Change Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function DeliveryDelete($id){
        $delivery_boy = Delivery_boy::find($id);
        $done = $delivery_boy->delete();
        if ($done) {
            $notification = array(
                'message' => 'Delivery Boy Account Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Delivery Boy Account Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function DeliveryUpdate(Request $request){
        $delivery_boy = Delivery_boy::find($request->id);
        $delivery_boy->delivery_boy_name = $request->delivery_boy_name;
        $delivery_boy->delivery_boy_phone = $request->delivery_boy_phone;
        $done = $delivery_boy->save();
        if ($done) {
            $notification = array(
                'message' => 'Delivery Boy Account Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Delivery Boy Account Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }
}
