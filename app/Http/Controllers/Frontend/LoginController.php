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
class LoginController extends Controller
{
    public function LogIn(){
        $categorys = Category::where('categoty_status',1)->get();
        return view('frontend.home.auth.login',compact('categorys'));
    }

    

}
