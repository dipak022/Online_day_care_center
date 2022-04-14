<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
class CategoryController extends Controller
{
    public function Category(){
        return view('backend.category.addCategory');
    }

    public function CategoryStore(Request $request){
        //return dd($request->all());
        $category = new Category();
        $category->categoty_name = $request->categoty_name;
        $category->order_number = $request->order_number;
        $category->added_on = $request->added_on;
        $category->categoty_status = $request->categoty_status;
        $done = $category->save();

        if ($done) {
            $notification = array(
                'message' => 'Category Added Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Category Added Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function CategoryManage(){
        $categoryes= Category::all();
        return view('backend.category.manageCategory',compact('categoryes'));
    }

    public function CategoryActive($id){
        $category = Category::find($id);
        //$category = new Category();
        $category->categoty_status = 0;
        $done = $category->save();
        if ($done) {
            $notification = array(
                'message' => 'Category Status Inactive Successfully.',
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
        $category = Category::find($id);
        $category->categoty_status = 1;
        $done = $category->save();
        if ($done) {
            $notification = array(
                'message' => 'Category Status Active Successfully.',
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

    public function CategoryDelete($id){
        $category = Category::find($id);
        $done = $category->delete();
        if ($done) {
            $notification = array(
                'message' => 'Category Delete Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Category Delete Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function CategoryUpdate(Request $request){
        $category = Category::find($request->id);
        $category->categoty_name = $request->categoty_name;
        $category->order_number = $request->order_number;
        $done = $category->save();
        if ($done) {
            $notification = array(
                'message' => 'Category Update Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Category Update Unuccessfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    

    

}
