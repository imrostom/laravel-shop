<?php

use Illuminate\Support\Facades\DB;

function count_manufacture($manufacture_id){
    $count_manufacture = DB::table('tbl_product')->select('*')->where('publication_status', 1)->where('product_manufacture',$manufacture_id)->count();
    echo $count_manufacture;
}

function manufacture_list_products($manufacture_id){
    return DB::table('tbl_product')->select('*')->where('publication_status', 1)->where('product_manufacture',$manufacture_id)->take(8)->get();
}

function theme_option($key){
    $result = DB::table('tbl_option')->select('*')->where('id',1)->first();
    return $result->$key;
    
}

?>