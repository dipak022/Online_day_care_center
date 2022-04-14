<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
class SignUpController extends Controller
{
    
    public function SignUp(){
        $categorys = Category::where('categoty_status',1)->get();
        return view('frontend.home.auth.register',compact('categorys'));
    }

    public function CustomerStore(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $done = $customer->save();
        //dd("done");
      
    }
}
