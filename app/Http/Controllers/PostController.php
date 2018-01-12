<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {

    public function add_post() {
        $category_lists = DB::table('tbl_category')
                ->select('*')
                ->where('publication_status', 1)
                ->get();
        return view('admin/pages/add_post', compact('category_lists'));
    }

    public function manage_post() {
        $post_lists = DB::table('tbl_post')
                ->select('*')
                ->get();
        return view('admin/pages/manage_post', compact('post_lists'));
    }

    public function save_post(Request $request) {

        $request->validate([
            'post_title' => 'required|max:255',
            'post_description' => 'required',
            'post_image' => 'required | mimes:jpeg,jpg,png | max:1000',
            'post_category' => 'required',
            'publication_status' => 'required',
        ]);

        $post_image = $request->post_image->hashName();


        $data = array();
        $data['post_title'] = $request->post_title;
        $data['post_description'] = $request->post_description;
        $data['post_category'] = $request->post_category;
        $data['post_user'] = 1;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();
        if ($request->hasFile('post_image')) {
            $image_name = $request->post_image->store('public/images');
            $data['post_image'] = $post_image;
        }
        $result = DB::table('tbl_post')
                ->insert($data);

        if ($result) {
            return redirect('manage/post')->with('message', 'Post Inserted Sucesfully');
        } else {
            return redirect('add/post')->with('message', 'Post Inserted Failed');
        }
    }

    public function update_post(Request $request, $post_id) {

        $request->validate([
            'post_title' => 'required|max:255',
            'post_description' => 'required',
            'post_category' => 'required',
            'publication_status' => 'required',
        ]);

        $post_image = $request->post_image->hashName();


        $data = array();
        $data['post_title'] = $request->post_title;
        $data['post_description'] = $request->post_description;
        $data['post_category'] = $request->post_category;
        $data['post_user'] = 1;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        if ($request->hasFile('post_image')) {
            $request->validate([
                'post_image' => 'required | mimes:jpeg,jpg,png | max:1000',
            ]);
            $image_name = $request->post_image->store('public/images');
            $data['post_image'] = $post_image;
        }


        $result = DB::table('tbl_post')
                ->where('post_id', $post_id)
                ->update($data);

        if ($result) {
            return redirect('manage/post')->with('message', 'Post Updated Sucesfully');
        } else {
            return redirect('add/post')->with('message', 'Post Updated Failed');
        }
    }

    public function published_post($post_id) {
        $data = array();
        $data['publication_status'] = 1;
        $result = DB::table('tbl_post')
                ->where('post_id', $post_id)
                ->update($data);

        if ($result) {
            return redirect('manage/post')->with('message', 'Post Published Sucesfully');
        } else {
            return redirect('manage/post')->with('message', 'Post Published Failed');
        }
    }

    public function unpublished_post($post_id) {
        $data = array();
        $data['publication_status'] = 0;
        $result = DB::table('tbl_post')
                ->where('post_id', $post_id)
                ->update($data);

        if ($result) {
            return redirect('manage/post')->with('message', 'Post UnPublished Sucesfully');
        } else {
            return redirect('manage/post')->with('message', 'Post UnPublished Failed');
        }
    }

    public function delete_post($post_id) {
        $result = DB::table('tbl_post')
                ->where('post_id', $post_id)
                ->delete();

        if ($result) {
            return redirect('manage/post')->with('message', 'Post Deleted Sucesfully');
        } else {
            return redirect('manage/post')->with('message', 'Post Deleted Failed');
        }
    }

    public function edit_post($post_id) {
        $category_lists = DB::table('tbl_category')
                ->select('*')
                ->get();
        $post_info = DB::table('tbl_post')
                ->select('*')
                ->where('post_id', $post_id)
                ->first();
        return view('admin/pages/edit_post', compact('post_info', 'category_lists'));
    }

}
