<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManufactureController extends Controller {

    public function add_manufacture() {
        return view('admin/pages/add_manufacture');
    }

    public function manage_manufacture(){
        $manufacture_lists = DB::table('tbl_manufacture')
                ->select('*')
                ->get();
        return view('admin/pages/manage_manufacture',compact('manufacture_lists'));
    }

    public function save_manufacture(Request $request) {

        $request->validate([
            'manufacture_name' => 'required|unique:tbl_manufacture|max:255',
            'manufacture_description' => 'required',
            'publication_status' => 'required',
        ]);

        $data = array();
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        $result = DB::table('tbl_manufacture')
                ->insert($data);

        if ($result) {
            return redirect('manage/manufacture')->with('message', 'Manufacture Inserted Sucesfully');
        } else {
            return redirect('add/manufacture')->with('message', 'Manufacture Inserted Failed');
        }
    }
    
    public function published_manufacture($manufacture_id){
        $data = array();
        $data['publication_status']=1;
        $result = DB::table('tbl_manufacture')
                ->where('manufacture_id',$manufacture_id)
                ->update($data);

        if ($result) {
            return redirect('manage/manufacture')->with('message', 'Manufacture Published Sucesfully');
        } else {
            return redirect('manage/manufacture')->with('message', 'Manufacture Published Failed');
        }
    }
    
    public function unpublished_manufacture($manufacture_id){
        $data = array();
        $data['publication_status']=0;
        $result = DB::table('tbl_manufacture')
                ->where('manufacture_id',$manufacture_id)
                ->update($data);

        if ($result) {
            return redirect('manage/manufacture')->with('message', 'Manufacture UnPublished Sucesfully');
        } else {
            return redirect('manage/manufacture')->with('message', 'Manufacture UnPublished Failed');
        }
    }
    
    public function delete_manufacture($manufacture_id){
        $result = DB::table('tbl_manufacture')
                ->where('manufacture_id',$manufacture_id)
                ->delete();

        if ($result) {
            return redirect('manage/manufacture')->with('message', 'Manufacture Deleted Sucesfully');
        } else {
            return redirect('manage/manufacture')->with('message', 'Manufacture Deleted Failed');
        }
    }
    
    public function edit_manufacture($manufacture_id){
        $manufacture_info = DB::table('tbl_manufacture')
                ->select('*')
                ->where('manufacture_id',$manufacture_id)
                ->first();
        return view('admin/pages/edit_manufacture',compact('manufacture_info'));
    }
    
    public function update_manufacture(Request $request,$manufacture_id) {
        
        $request->validate([
            'manufacture_name' => 'required|unique:tbl_manufacture|max:255',
            'manufacture_description' => 'required',
            'publication_status' => 'required',
        ]);

        $data = array();
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        $result = DB::table('tbl_manufacture')
                ->where('manufacture_id',$manufacture_id)
                ->update($data);

        if ($result) {
            return redirect('manage/manufacture')->with('message', 'Manufacture Updated Sucesfully');
        } else {
            return redirect('add/manufacture')->with('message', 'Manufacture Updated Failed');
        }
    }
    

}
