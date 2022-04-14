<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Coupon;
use App\Models\Product;
use DB;
use Cart;
class CartController extends Controller
{
    public function AddToCart(Request $request){
        $product= Product::where('id',$request->id)->first();
        $data=array();
        $data['id']=$product->id;
        $data['name']=$product->name;
        $data['qty']=1;
        $data['price']= $product->price;          
        $data['weight']=1;
        $data['options']['image']=$product->image;
        
       Cart::add($data);
       //return response()->json(['success' => 'Successfully Added on your Cart']);
       //dd("done");

        return redirect()->route('cart_show')->with('');


    }

    public function ShowCart(){
        $cart=Cart::content();
        $categorys = Category::where('categoty_status',1)->get();
        return view('frontend.home.cart',compact('categorys','cart'));

    }

    public function removeCart($rowId)
    {
        $done=Cart::remove($rowId);
        return redirect()->back()->with('');
    }

    public function UpdateCart(Request $request)
    {
        $rowId =$request->productid;
        $qty=$request->qty;
        Cart::update($rowId, $qty);
        return redirect()->back()->with('');
       
            
        
    }
}
