<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {

    public function add_category() {
        return view('admin/pages/add_category');
    }

    public function manage_category(){
        $category_lists = DB::table('tbl_category')
                ->select('*')
                ->get();
        return view('admin/pages/manage_category',compact('category_lists'));
    }

    public function save_category(Request $request) {

        $request->validate([
            'category_name' => 'required|unique:tbl_category|max:255',
            'category_description' => 'required',
            'publication_status' => 'required',
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        $result = DB::table('tbl_category')
                ->insert($data);

        if ($result) {
            return redirect('manage/category')->with('message', 'Category Inserted Sucesfully');
        } else {
            return redirect('add/category')->with('message', 'Category Inserted Failed');
        }
    }
    
    public function published_category($category_id){
        $data = array();
        $data['publication_status']=1;
        $result = DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);

        if ($result) {
            return redirect('manage/category')->with('message', 'Category Published Sucesfully');
        } else {
            return redirect('manage/category')->with('message', 'Category Published Failed');
        }
    }
    
    public function unpublished_category($category_id){
        $data = array();
        $data['publication_status']=0;
        $result = DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);

        if ($result) {
            return redirect('manage/category')->with('message', 'Category UnPublished Sucesfully');
        } else {
            return redirect('manage/category')->with('message', 'Category UnPublished Failed');
        }
    }
    
    public function delete_category($category_id){
        $result = DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->delete();

        if ($result) {
            return redirect('manage/category')->with('message', 'Category Deleted Sucesfully');
        } else {
            return redirect('manage/category')->with('message', 'Category Deleted Failed');
        }
    }
    
    public function edit_category($category_id){
        $category_info = DB::table('tbl_category')
                ->select('*')
                ->where('category_id',$category_id)
                ->first();
        return view('admin/pages/edit_category',compact('category_info'));
    }
    
    public function update_category(Request $request,$category_id) {
        
        $request->validate([
            'category_name' => 'required|unique:tbl_category|max:255',
            'category_description' => 'required',
            'publication_status' => 'required',
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        $result = DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);

        if ($result) {
            return redirect('manage/category')->with('message', 'Category Updated Sucesfully');
        } else {
            return redirect('add/category')->with('message', 'Category Updated Failed');
        }
    }
    

}
