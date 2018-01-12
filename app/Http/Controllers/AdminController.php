<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller {

    public function dashboard() {
        return view('admin/pages/dashboard');
    }

    public function admin_login() {
        return view('admin/pages/login');
    }

    public function admin_login_check(Request $request) {
        $request->validate([
            'admin_email' => 'required',
            'admin_password' => 'required',
        ]);

        $data = array();
        $data['admin_email'] = $request->admin_email;
        $data['admin_password'] = md5($request->admin_password);

        $result = DB::table('tbl_admin')
                ->select('*')
                ->where($data)
                ->first();

        if ($result) {
            Session::put('admin_email', $result->admin_email);
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect('dashboard');
        } else {
            return redirect('admin')->with('message', 'Admin Email Or Password Not Match');
        }
    }

    public function admin_logout(){
        session()->forget('admin_email');
        session()->forget('admin_name');
        session()->forget('admin_id');
        return redirect('admin')->with('message', 'You Succesfully Logout ');
    }
    
    public function option(){
        return view('admin/pages/option');
    }

}
