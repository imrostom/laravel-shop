<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {

    public function add_product() {
        $manufacture_lists = DB::table('tbl_manufacture')
                ->select('*')
                ->where('publication_status', 1)
                ->get();
        return view('admin/pages/add_product', compact('manufacture_lists'));
    }

    public function manage_product() {
        $product_lists = DB::table('tbl_product')
                ->select('*')
                ->get();
        return view('admin/pages/manage_product', compact('product_lists'));
    }

    public function save_product(Request $request) {
        $request->validate([
            'product_title' => 'required|max:255',
            'product_key' => 'required|unique:tbl_product|max:20',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_aviality' => 'required',
            'product_condition' => 'required',
            'product_description' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png|max:3000',
            'publication_status' => 'required',
        ]);

        $product_image = $request->product_image->hashName();

        $data = array();
        $data['product_title'] = $request->product_title;
        $data['product_description'] = $request->product_description;
        $data['product_manufacture'] = $request->product_manufacture;
        $data['product_key'] = $request->product_key;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_aviality'] = $request->product_aviality;
        $data['product_condition'] = $request->product_condition;
        $data['product_user'] = 1;
        $data['product_view'] = 0;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        if ($request->hasFile('product_image')) {
            $image_name = $request->product_image->store('public/images');
            $data['product_image'] = $product_image;
        }
        $result = DB::table('tbl_product')
                ->insert($data);

        if ($result) {
            return redirect('manage/product')->with('message', 'Product Inserted Sucesfully');
        } else {
            return redirect('add/product')->with('message', 'Product Inserted Failed');
        }
    }

    public function update_product(Request $request, $product_id) {

        $request->validate([
            'product_title' => 'required|max:255',
            'product_key' => 'required|unique:tbl_product|max:20',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_aviality' => 'required',
            'product_condition' => 'required',
            'product_description' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png|max:3000',
            'publication_status' => 'required',
        ]);

        $product_image = $request->product_image->hashName();

        $data = array();
        $data['product_title'] = $request->product_title;
        $data['product_description'] = $request->product_description;
        $data['product_manufacture'] = $request->product_manufacture;
        $data['product_key'] = $request->product_key;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_aviality'] = $request->product_aviality;
        $data['product_condition'] = $request->product_condition;
        $data['product_user'] = 1;
        $data['product_view'] = 0;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();
        if ($request->hasFile('product_image')) {
            $image_name = $request->product_image->store('public/images');
            $data['product_image'] = $product_image;
        }


        $result = DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update($data);

        if ($result) {
            return redirect('manage/product')->with('message', 'Product Updated Sucesfully');
        } else {
            return redirect('add/product')->with('message', 'Product Updated Failed');
        }
    }

    public function published_product($product_id) {
        $data = array();
        $data['publication_status'] = 1;
        $result = DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update($data);

        if ($result) {
            return redirect('manage/product')->with('message', 'Product Published Sucesfully');
        } else {
            return redirect('manage/product')->with('message', 'Product Published Failed');
        }
    }

    public function unpublished_product($product_id) {
        $data = array();
        $data['publication_status'] = 0;
        $result = DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update($data);

        if ($result) {
            return redirect('manage/product')->with('message', 'Product UnPublished Sucesfully');
        } else {
            return redirect('manage/product')->with('message', 'Product UnPublished Failed');
        }
    }

    public function delete_product($product_id) {
        $result = DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->delete();

        if ($result) {
            return redirect('manage/product')->with('message', 'Product Deleted Sucesfully');
        } else {
            return redirect('manage/product')->with('message', 'Product Deleted Failed');
        }
    }

    public function edit_product($product_id) {
        $manufacture_lists = DB::table('tbl_manufacture')
                ->select('*')
                ->where('publication_status', 1)
                ->get();
        $product_info = DB::table('tbl_product')
                ->select('*')
                ->where('product_id', $product_id)
                ->first();
        return view('admin/pages/edit_product', compact('product_info', 'manufacture_lists'));
    }

}
