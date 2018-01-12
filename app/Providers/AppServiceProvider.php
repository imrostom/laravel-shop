<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('frontend.inc.sidebar',function($view){
            $all_category = DB::table('tbl_category')->select('*')->where('publication_status',1)->get();
            $all_manufacture = DB::table('tbl_manufacture')->select('*')->where('publication_status',1)->get();
            
            $view->with('category_lists',$all_category)->with('manufacture_lists',$all_manufacture);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
