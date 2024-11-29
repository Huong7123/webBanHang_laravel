<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function add_brand_product(){
        $this->AuthLogin();
    	return view('layout.admin.add_brand_product');
    }

    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand')->get();
    	$manager_brand_product  = view('layout.admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('layout-admin')->with('layout.admin.all_brand_product', $manager_brand_product);
    }

    public function save_brand_product(Request $request){
        $request->validate([
            'brand_product_name' => 'required|string|max:255',
            'brand_product_desc' => 'nullable|string',
            'brand_product_status' => 'required|integer|in:0,1',
        ]);

        $brand = BrandModel::create([
            'brand_name' => $request->input('brand_product_name'),
            'brand_desc' => $request->input('brand_product_desc'),
            'brand_status' => (int)$request->input('brand_product_status'), 
        ]);
        return response()->json(['message' => 'Thêm danh mục sản phẩm thành công','data' => $brand], 201);
    }

    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Ẩn kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();

        $manager_brand_product  = view('layout.admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('layout-admin')->with('layout.admin.edit_brand_product', $manager_brand_product);
    }

    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        //$data['meta_keywords'] = $request->brand_product_keywords;
        //$data['slug_brand_product'] = $request->slug_brand_product;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    //end function admin-page
    public function show_brand_home($brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id','asc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id','asc')->get();

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();

        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('product_status',1)
        ->where('tbl_product.brand_id',$brand_id)->get();
        return view('layout.web.brand.show_brand')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('brand_by_id',$brand_by_id)
            ->with('brand_name',$brand_name);
    }
}
