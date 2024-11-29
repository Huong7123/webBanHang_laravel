<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{

    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id','asc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id','asc')->get();

        $all_product = DB::table('tbl_product')->where('product_status',1)->orderby('product_id','desc')->limit(6)->get();

        return view("layout.web.home")->with('category',$cate_product)->with('brand',$brand_product)->
            with('all_product',$all_product);
    }

    public function search(Request $request){

        $keyword = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id','desc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id','desc')->get();
        
        $search_product = DB::table('tbl_product')
            ->where('product_status',1)
            ->where('product_name','like','%'.$keyword.'%')->get();

        return view("layout.web.product.search")->with('category',$cate_product)->with('brand',$brand_product)->
            with('search_product',$search_product);
    }

    public function list_product(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id','asc')->get(); 
        
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id','asc')->get();

        $all_product = DB::table('tbl_product')->where('product_status',1)->orderby('product_id','asc')->get();
        return view("layout.web.product.list_product")->with('category',$cate_product)->with('brand',$brand_product)->
        with('all_product',$all_product);
    }

    public function login(){
        return view('layout.web.login');
    }

    public function login_home(Request $request){
        $email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('tbl_customers')
			->where('customer_email',$email)
			->where('customer_password',$password)->first();
    	if($result){
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/');
    	}else{
            Session::put('message','Vui long kiem tra lai thong tin dang nhap');
    		return Redirect::to('/login');
    	}
    }

    public function logout_home(){
        Session::forget('customer_id');
    	return Redirect::to('/login');
    }

}
