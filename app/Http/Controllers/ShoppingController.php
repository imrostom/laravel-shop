<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;

class ShoppingController extends Controller {

    public function add_to_cart(Request $request) {
        $data = array();
        $product_id = $request->product_id;
        $qty = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id', $product_id)->first();

        $data['id'] = $product_id;
        $data['name'] = $product_info->product_title;
        $data['qty'] = $qty;
        $data['price'] = $product_info->product_price;
        $data['options'] = array(
            'product_image' => $product_info->product_image
        );

        Cart::add($data);

        return redirect('/cart');
    }

    public function cart_remove($rowId) {
        Cart::remove($rowId);
        return redirect('/cart')->with('message', 'Data Remove Form Cart Item');
    }

    public function cart_update(Request $request) {

        Cart::update($request->rowId, $request->qty);
        return redirect('/cart')->with('message', 'Data Update Form Cart Item');
    }

    public function product_shipping() {
        return view('frontend.pages.shipping');
    }

    public function payment_option() {
        return view('frontend.pages.payment');
    }

    public function payment_success() {
        return view('frontend.pages.payment-success');
    }

    public function checkout_login(Request $request) {
        if (empty($request->user_email) or empty($request->user_password)) {
            return redirect('/checkout')->with('message', 'Your Email And Password Field Not Be Empty');
        }

        if (Auth::attempt(['email' => $request->user_email, 'password' => $request->user_password])) {
            return redirect('/product-shipping');
        } else {
            return redirect('/checkout')->with('message', 'Your Email And Password Not Match');
        }
    }

    public function save_shipping(Request $request) {
        $request->validate([
            'shipping_name' => 'required',
            'shipping_email' => 'required',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',
        ]);

        $data = array();
        $data['customer_id'] = Auth::id();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['updated_at'] = \Carbon\Carbon::now();
        $data['created_at'] = \Carbon\Carbon::now();

        $result = DB::table('tbl_shipping')->insertGetId($data);
        if ($result) {
            session(['shipping_id' => $result]);
            return redirect('/payment-option');
        } else {
            return redirect('/product-shipping')->with('message', 'Cannot Register Shipping Address');
        }
    }

    public function save_order(Request $request) {

        $request->validate([
            'payment_type' => 'required',
        ]);

        $pdata = array();
        $pdata['payment_type'] = $request->payment_type;
        $pdata['payment_action'] = 'pending';
        $pdata['updated_at'] = \Carbon\Carbon::now();
        $pdata['created_at'] = \Carbon\Carbon::now();

        $payment_id = DB::table('tbl_payment')->insertGetId($pdata);


        $odata = array();
        $odata['user_id'] = Auth::id();
        $odata['shipping_id'] = session('shipping_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::total();
        $odata['order_action'] = 'pending';
        $odata['updated_at'] = \Carbon\Carbon::now();
        $odata['created_at'] = \Carbon\Carbon::now();

        $order_id = DB::table('tbl_order')->insertGetId($odata);

        $all_order_products = Cart::content();

        foreach ($all_order_products as $single_product) {
            $oddata = array();
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $single_product->id;
            $oddata['product_name'] = $single_product->name;
            $oddata['product_price'] = $single_product->price;
            $oddata['product_sales_qty'] = $single_product->qty;
            $oddata['product_image'] = $single_product->options->product_image;
            $odata['updated_at'] = \Carbon\Carbon::now();
            $odata['created_at'] = \Carbon\Carbon::now();

            $order_details = DB::table('tbl_order_details')->insert($oddata);


            if ($order_details) {
                Cart::destroy();
                return redirect('/payment-success')->with('order_id', $order_id);
                ;
            } else {
                return redirect('/payment-option')->with('message', 'Cannot Payment Sucessfully');
            }
        }
    }

    public function checkout_register(Request $request) {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->remember_token = $request->get('_token');
        $user->save();
        
        
        Auth::login($user);
        
        return redirect('/product-shipping');
    }

}
