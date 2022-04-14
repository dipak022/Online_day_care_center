<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Order_details;
use Response;
use Auth;
use Session;
use DB;
class CheckoutController extends Controller
{
    public function Checkout(){
        if (Auth::check()) {
            $cart=Cart::content();
            $categorys = Category::where('categoty_status',1)->get();
            return view('frontend.home.checkout',compact('cart','categorys'));
        }else{
            return redirect()->route('login');
        }
    }
 
    public function CheckoutStore(Request $request){
        $data=array();
		$data['first_name']= $request->first_name;
        $data['last_name']= $request->last_name;
        $data['address']= $request->address;
        $data['city']= $request->city;
        $data['county']= $request->county;
        $data['phone']= $request->phone;
        $data['email']= $request->email;
        $data['note']= $request->note;
        $seeping_id=DB::table('shippings')->insertGetId($data);

        $order=array();
        $order['user_id']= Auth::id();
        $order['seeping_id']=$seeping_id;
        $order['payment_type']=$request->payment_type;
        $order['total']=$request->total;
        $order['status']="panding";
        $order['date']=date('d-m-y');
        $order['month']=date('F');
        $order['year']=date('Y');
        $order_id=DB::table('orders')->insertGetId($order);

        $content=Cart::content();
        $details=array();
        foreach ($content as $row) {
            $details['oder_id']= $order_id;
            $details['product_id']=$row->id;
            $details['name']=$row->name;
            $details['quantity']=$row->qty;
            $details['price']=$row->price;
            $details['totalprice']=$row->qty * $row->price;
            DB::table('order_details')->insert($details);
        }

        Cart::destroy();
        return redirect()->route('home');

    }
}
