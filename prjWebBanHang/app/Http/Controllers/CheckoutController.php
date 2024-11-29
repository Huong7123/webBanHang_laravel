<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{

	public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function login_checkout(Request $request){
        return view('layout.web.checkout.login_checkout');

    }

    public function add_customer(Request $request){
        $data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);

    	$customer_id = DB::table('tbl_customers')->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return Redirect::to('/checkout');
    }

    public function checkout(){
        return view('layout.web.checkout.show_checkout');
    }

    public function order_place(Request $request){
		//insert shipping
		$shipping = array();
    	$shipping['shipping_email'] = $request->shipping_email;
    	$shipping['shipping_name'] = $request->shipping_name;
    	$shipping['shipping_address'] = $request->shipping_address;
    	$shipping['shipping_phone'] = $request->shipping_phone;
    	$shipping['shipping_notes'] = $request->shipping_notes;

    	$shipping_id = DB::table('tbl_shipping')->insertGetId($shipping);

    	Session::put('shipping_id',$shipping_id);

		//insert order
		$order = array();
		$order['customer_id'] = Session::get('customer_id');
    	$order['shipping_id'] = Session::get('shipping_id');
    	$order['payment_method'] = $request->paymen_option;
    	$order['order_status'] = 'Thành công';
    	$order['created_at'] = now();

		
    	$order_id = DB::table('tbl_order')->insertGetId($order);
		//insert order_details
		$data = $request->all();
        $order_details = Session::get('cart');
		$subtotal=0;
		$order_total=0;
		foreach ($order_details as $key => $value) {
			$orders = array(
				'order_id' => $order_id,
				'product_id' => $value['product_id'],
				'product_name' => $value['product_name'],
				'product_price' => $value['product_price'],
				'product_sales_quantity' => $value['product_qty'],
			);
			$subtotal=$value['product_price'] * $value['product_qty'];
			$order_total+=$subtotal;
			$order_details_id = DB::table('tbl_order_details')->insertGetId($orders);
		}
		
		DB::table('tbl_order')
		->where('order_id', $order_id)
		->update(['order_total' => $order_total]);
		
		Session::remove('cart');
    	return Redirect::to('/');
    }

    public function logout_checkout(){
    	Session::forget('customer_id');
    	return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request){
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('tbl_customers')
			->where('customer_email',$email)
			->where('customer_password',$password)->first();
    	if($result){
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}

    }

	public function manage_order(){
        $this->AuthLogin();
		$all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
		->select('tbl_order.*','tbl_shipping.shipping_name','tbl_shipping.shipping_phone','tbl_shipping.shipping_address')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order  = view('layout.admin.manage_order')->with('all_order',$all_order);
		return view('layout-admin')->with('layout.admin.manage_order', $manager_order);
	}

	public function view_order($order_id){
		$this->AuthLogin();
		$all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
		->select('tbl_order.*','tbl_shipping.shipping_name','tbl_shipping.shipping_phone','tbl_shipping.shipping_address',
			'tbl_order_details.product_id','tbl_order_details.product_name','tbl_order_details.product_price',
			'tbl_order_details.product_sales_quantity')
		->where('tbl_order.order_id',$order_id)
        ->orderby('tbl_order.order_id','desc')->get();
        $view_order  = view('layout.admin.view_order')->with('all_order',$all_order);

		return view('layout-admin')->with('layout.admin.view_order', $view_order);
		
	}


}
