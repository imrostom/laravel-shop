<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderManageController extends Controller {

    public function manage_order() {
        $manage_order = DB::table('tbl_order')
                ->join('users', 'tbl_order.user_id', '=', 'users.id')
                ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
                ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
                ->select('*')
                ->get();
        return view('admin/pages/manage_order',compact('manage_order'));
        
    }
    
    public function order_details($order_id){
        $order_info = DB::table('tbl_order')->where('order_id',$order_id)->first();
        $customer_id = $order_info->user_id;
        $shipping_id = $order_info->shipping_id;
        $payment_id = $order_info->payment_id;

        $data = array();
        $data['product_lists'] = DB::table('tbl_order_details')->where('order_id',$order_id)->get();
        $data['customer_info'] = DB::table('users')->where('id',$customer_id)->first();
        $data['shipping_info'] = DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->first();
        
        $pdf = PDF::loadView('admin/pages/pdf',$data);
        return $pdf->stream('invoice.pdf');
    }

}
