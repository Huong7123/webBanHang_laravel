<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
        return view('layout.admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
    	$all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
    	$manager_product  = view('layout.admin.all_product')->with('all_product',$all_product);
    	return view('layout-admin')->with('layout.admin.all_product', $manager_product);

    }
    public function save_product(Request $request){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:tbl_category_product',
            'brand_id' => 'required|integer|exists:tbl_brand',
            'product_desc' => 'nullable|string',
            'product_content' => 'nullable|string',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'nullable|image',
            'product_status' => 'required|integer|in:0,1',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagePath = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $imagePath);
        }

        $product = ProductModel::create([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('product_cate'),
            'brand_id' => $request->input('brand_id'),
            'product_desc' => $request->input('product_desc'),
            'product_content' => $request->input('product_content'),
            'product_price' => $request->input('product_price'),
            'product_image' => $imagePath,
            'product_status' => (int)$request->input('product_status'),
        ]);

        return response()->json(['message' => 'Thêm sản phẩm thành công','data' => $product], 201);
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product  = view('layout.admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);

        return view('layout-admin')->with('layout.admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$product_id){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:tbl_category_product',
            'brand_id' => 'required|integer|exists:tbl_brand',
            'product_desc' => 'nullable|string',
            'product_content' => 'nullable|string',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'nullable|image',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagePath = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $imagePath);
        }

        $product = ProductModel::find($product_id);
        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy thương hiệu'], 404);
        }

        $product ->update([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('product_cate'),
            'brand_id' => $request->input('brand_id'),
            'product_desc' => $request->input('product_desc'),
            'product_content' => $request->input('product_content'),
            'product_price' => $request->input('product_price'),
            'product_image' => $imagePath,
        ]);
        $product->save();

        return response()->json(['message' => 'Thêm danh mục sản phẩm thành công','data' => $product], 201);
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //End Admin Page

    public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id','asc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id','asc')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }
       
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('layout.web.product.show_details')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('product_details',$details_product)
            ->with('related',$related_product);
        }
}
