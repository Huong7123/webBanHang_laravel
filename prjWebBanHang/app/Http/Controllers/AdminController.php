<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/manage-order');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function index(){
        return view('layout.admin.login');
    }

    public function showDashboard(){
        $this->AuthLogin();
        return view('layout.admin.manage-order');
    }

    public function dashboard(Request $request){
        $admin_email = $request->get('admin_email');
        $admin_password = md5(string: $request->get('admin_password'));

        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)->first();
        
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/manage-order');
        }else{
            Session::put('message','Vui long kiem tra lai thong tin dang nhap');
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }

}
