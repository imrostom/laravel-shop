<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Post;
use Illuminate\Support\Facades\Input;
use PDF;

class WebController extends Controller {

    public function pdf($order_id = 1) {
        $order_info = DB::table('tbl_order')->where('order_id', $order_id)->first();
        $customer_id = $order_info->user_id;
        $shipping_id = $order_info->shipping_id;
        $payment_id = $order_info->payment_id;

        $data = array();
        $data['product_lists'] = DB::table('tbl_order_details')->where('order_id', $order_id)->get();
        $data['customer_info'] = DB::table('users')->where('id', $customer_id)->first();
        $data['shipping_info'] = DB::table('tbl_shipping')->where('shipping_id', $shipping_id)->first();

        //return view('admin/pages/pdf',$data);

        $pdf = PDF::loadView('admin/pages/pdf', $data);
        return $pdf->stream('invoice.pdf');
    }

    public function home() {
        $features_products = DB::table('tbl_product')->where('publication_status', 1)->take(9)->get();
        $new_products = Product::where('publication_status', 1)->take(15)->get()->toArray();

        $data = array();
        $data['features_products'] = $features_products;
        $data['new_products'] = $new_products;

        return view('frontend.pages.home', $data);
    }

    public function shop() {

        $all_products = DB::table('tbl_product')->where('publication_status', 1)->paginate(12);

        $data = array();
        $data['all_products'] = $all_products;

        return view('frontend.pages.shop', $data);
    }

    public function product_details($product_id) {
        $product_info = DB::table('tbl_product')
                ->join('tbl_manufacture', 'tbl_product.product_manufacture', '=', 'tbl_manufacture.manufacture_id')
                ->join('tbl_admin', 'tbl_product.product_user', '=', 'tbl_admin.admin_id')
                ->select('*')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_product.product_id', $product_id)
                ->first();

        $new_products = Product::where('publication_status', 1)->take(15)->get()->toArray();

        $data = array();
        $data['product_info'] = $product_info;
        $data['new_products'] = $new_products;

        return view('frontend.pages.product_details', $data);
    }

    public function contact() {
        return view('frontend.pages.contact');
    }

    public function blog() {

        $all_posts = DB::table('tbl_post')
                ->join('tbl_category', 'tbl_post.post_category', '=', 'tbl_category.category_id')
                ->join('tbl_admin', 'tbl_post.post_user', '=', 'tbl_admin.admin_id')
                ->select('*')
                ->where('tbl_post.publication_status', 1)
                ->paginate(4);

        $data = array();
        $data['all_posts'] = $all_posts;

        return view('frontend.pages.blog', $data);
    }

    public function blog_details($post_id) {

        $post_details = DB::table('tbl_post')
                ->join('tbl_category', 'tbl_post.post_category', '=', 'tbl_category.category_id')
                ->join('tbl_admin', 'tbl_post.post_user', '=', 'tbl_admin.admin_id')
                ->select('*')
                ->where('tbl_post.publication_status', 1)
                ->where('tbl_post.post_id', $post_id)
                ->first();

        if (empty($post_details)) {
            return redirect('/blog');
        }


        $next = Post::where('post_id', '>', $post_id)->where('publication_status', 1)->orderBy('post_id', 'asc')->first();
        $prev = Post::where('post_id', '<', $post_id)->where('publication_status', 1)->orderBy('post_id', 'desc')->first();
        $data = array();
        $data['post_details'] = $post_details;
        $data['next'] = $next;
        $data['prev'] = $prev;
        return view('frontend.pages.blog-details', $data);
    }

    public function cart() {
        return view('frontend.pages.cart');
    }

    public function checkout() {
        return view('frontend.pages.checkout');
    }

    public function raf() {
        return view('frontend.pages.shipping');
    }

    public function search() {
        $search = Input::get('search');
        if (empty($search)) {
            return redirect('/');
        }
        $product_info = DB::table('tbl_product')
                ->join('tbl_manufacture', 'tbl_product.product_manufacture', '=', 'tbl_manufacture.manufacture_id')
                ->join('tbl_admin', 'tbl_product.product_user', '=', 'tbl_admin.admin_id')
                ->select('*')
                ->where('tbl_product.publication_status', 1)
                ->where('tbl_manufacture.publication_status', 1)
                ->where('tbl_product.product_title', 'LIKE', '%' . $search . '%')
                ->orWhere('tbl_product.product_description', 'LIKE', '%' . $search . '%')
                ->orWhere('tbl_manufacture.manufacture_name', 'LIKE', '%' . $search . '%')
                ->paginate(5);
        $product_info->appends(['search' => $search]);

        if (count($product_info) > 0) {
            $data = array();
            $data['all_products'] = $product_info;
            return view('frontend.pages.search', $data);
        } else {
            return redirect('/');
        }
    }

    public function category_post($category_id) {
        $all_posts = DB::table('tbl_post')
                ->join('tbl_category', 'tbl_post.post_category', '=', 'tbl_category.category_id')
                ->join('tbl_admin', 'tbl_post.post_user', '=', 'tbl_admin.admin_id')
                ->select('*')
                ->where('tbl_post.publication_status', 1)
                ->where('tbl_post.post_category',$category_id)
                ->paginate(4);

        $data = array();
        $data['all_posts'] = $all_posts;

        return view('frontend.pages.category', $data);
    }
    
    public function manufacture_post($category_id) {

        $all_products = DB::table('tbl_product')
                ->where('publication_status', 1)
                ->where('product_manufacture',$category_id)
                ->paginate(12);

        $data = array();
        $data['all_products'] = $all_products;

        return view('frontend.pages.manufacture', $data);
    }
    
    

}
