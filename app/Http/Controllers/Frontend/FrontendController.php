<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Setting;
use App\Models\Product;
use DB;
use Auth;
class FrontendController extends Controller
{
    public function index(){
        $categorys = Category::where('categoty_status',1)->get();
        $products= Product::where('status',1)->get();
        return view('frontend.home.index',compact('categorys','products'));
    }

    public function CategoeyWiseProductShow($id){
        $categorys = Category::where('categoty_status',1)->get();
        $categoryproducts= Product::where('category_id',$id)
                                    ->where('status',1)
                                    ->get();
        if($categoryproducts){
            return view('frontend.home.product',compact('categorys','categoryproducts'));
        }
        

    }

    public function ProductDetails($id){
        $categorys = Category::where('categoty_status',1)->get();
        $productdetails= Product::where('category_id',$id)
                                    ->where('status',1)
                                    ->first();
                                    
        //dd($productdetails);                            
       
        return view('frontend.home.product_details',compact('categorys','productdetails'));

    }

    public function profile(){
        $categorys = Category::where('categoty_status',1)->get();
        $orders=DB::table('orders')
                           ->join('users','orders.user_id','users.id')
                           ->where('orders.user_id',auth()->user()->id)
                           ->select('orders.*','users.name')
                           ->get();
        return view('frontend.home.profile',compact('orders','categorys'));

    }
    

}
