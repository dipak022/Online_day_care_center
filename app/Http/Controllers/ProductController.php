<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Delivery_boy;
use App\Models\Coupon;
use App\Models\Product;
use DB;
class ProductController extends Controller
{
    public function Product(){
        $categorys = Category::where('categoty_status',1)->get();
        return view('backend.product.add',compact('categorys'));
    }

    public function ProductStore(Request $request){
        //return dd($request->all());
        $imageName = $request->file('image');
        $image = $imageName->getClientOriginalName();
        $directory = 'images/product_image/';
        $imgUrl = $directory.$image;
        $imageName->move($directory,$image);



        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->image = $imgUrl;
        $product->status = $request->status;
        $done = $product->save();

        if ($done) {
            $notification = array(
                'message' => 'Food Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Food Added Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function ProductManage(){
        //$products= Product::all();
        $categorys = Category::where('categoty_status',1)->get();
        $products=DB::table('products')
                           ->join('categories','products.category_id','categories.id')
                           ->select('products.*','categories.categoty_name')
                           ->get();

        return view('backend.product.manage',compact('products','categorys'));
    }

    public function ProductActive($id){
        $product = Product::find($id);
        //$category = new Category();
        $product->status = 0;
        $done = $product->save();
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

    public function ProductInactive($id){
        $product = Product::find($id);
        $product->status = 1;
        $done = $product->save();
        if ($done) {
            $notification = array(
                'message' => 'product Status Active Successfully.',
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

    public function ProductDelete($id){
        $product = Product::find($id);
        $done = $product->delete();
        if ($done) {
            $notification = array(
                'message' => 'product Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'product Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function ProductUpdate(Request $request){

        $check_image= $request->file('image');
        if($check_image){
            $oldImage = $request->oldimage;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $product = Product::find($request->id);
            $imageName = $request->file('image');
            $image = $imageName->getClientOriginalName();
            $directory = 'images/product_image/';
            $imgUrl = $directory.$image;
            $imageName->move($directory,$image);


            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->details = $request->details;
            $product->image = $imgUrl;
            $done = $product->save();
            

        }else{
            $product = Product::find($request->id);
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->details = $request->details;
            $done = $product->save();

        }
        


        if ($done) {
            $notification = array(
                'message' => 'Product Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Product Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }
}
