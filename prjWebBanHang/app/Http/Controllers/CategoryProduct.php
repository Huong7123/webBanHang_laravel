<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function add_category_product(){
        $this->AuthLogin();
    	return view('layout.admin.add_category_product');
    }

    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
    	$manager_category_product  = view('layout.admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('layout-admin')->with('layout.admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request){
        $request->validate([
            'category_product_name' => 'required|string|max:255',
            'category_product_desc' => 'nullable|string',
            'category_product_status' => 'required|integer|in:0,1',
        ]);

        $category = CategoryModel::create([
            'category_name' => $request->input('category_product_name'),
            'category_desc' => $request->input('category_product_desc'),
            'category_status' => (int)$request->input('category_product_status'), 
        ]);
        return response()->json(['message' => 'Thêm danh mục sản phẩm thành công','data' => $category], 201);
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Ẩn kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Hiển thị danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();

        $manager_category_product  = view('layout.admin.edit_category_product')->with('edit_category_product',$edit_category_product);

        return view('layout-admin')->with('layout.admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        //$data['meta_keywords'] = $request->category_product_keywords;
        //$data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    //End function Admin page
    public function show_category_home($category_id){

        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id','asc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id','asc')->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('product_status',1)
        ->where('tbl_product.category_id',$category_id)->get();
        return view('layout.web.category.show_category')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('category_by_id',$category_by_id)
            ->with('category_name',$category_name);
    }


}
