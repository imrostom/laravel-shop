<?php

    /* Web Route */
    Route::get('/', 'WebController@home');
    Route::get('/shop', 'WebController@shop');
    Route::get('/product-details/{id}', 'WebController@product_details');
    Route::get('/contact', 'WebController@contact');
    Route::get('/blog', 'WebController@blog');
    Route::get('/blog-details/{id}', 'WebController@blog_details');
    Route::get('/cart', 'WebController@cart');
    Route::get('/checkout', 'WebController@checkout');
    Route::get('/category-post/{id}', 'WebController@category_post');
    Route::get('/manufacture-post/{id}', 'WebController@manufacture_post');

    //Shopping Controller
    Route::post('/add_to_cart', 'ShoppingController@add_to_cart');
    Route::get('/cart-remove/{rowid}', 'ShoppingController@cart_remove');
    Route::post('/cart-update', 'ShoppingController@cart_update');
    Route::get('/product-shipping', 'ShoppingController@product_shipping');
    Route::post('/save/product/shipping', 'ShoppingController@save_shipping');
    Route::get('/payment-option', 'ShoppingController@payment_option');
    Route::post('/save/order', 'ShoppingController@save_order');
    Route::get('/payment-success', 'ShoppingController@payment_success');
    
    //Auth Class Registration
    Route::post('/checkout-login', 'ShoppingController@checkout_login');
    Route::post('/checkout-register', 'ShoppingController@checkout_register');

    //Search Route
    Route::any('/search', 'WebController@search');

    //Pdf route
    Route::get('/pdf/{id}', 'WebController@pdf');


    //Dashboard Login Process
    Route::get('/admin', 'AdminController@admin_login');
    Route::post('/admin/login/check', 'AdminController@admin_login_check');

Route::group(['middleware' => ['adminlogin']], function () {

    /* Admin Route */
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/admin/logout', 'AdminController@admin_logout');

    /* Category Route */
    Route::get('/add/category', 'CategoryController@add_category');
    Route::get('/manage/category', 'CategoryController@manage_category');
    Route::post('/save/category', 'CategoryController@save_category');
    Route::get('/published/category/{id}', 'CategoryController@published_category');
    Route::get('/unpublished/category/{id}', 'CategoryController@unpublished_category');
    Route::get('/delete/category/{id}', 'CategoryController@delete_category');
    Route::get('/edit/category/{id}', 'CategoryController@edit_category');
    Route::post('/update/category/{id}', 'CategoryController@update_category');

    /* MAnufacture Route */
    Route::get('/add/manufacture', 'ManufactureController@add_manufacture');
    Route::get('/manage/manufacture', 'ManufactureController@manage_manufacture');
    Route::post('/save/manufacture', 'ManufactureController@save_manufacture');
    Route::get('/published/manufacture/{id}', 'ManufactureController@published_manufacture');
    Route::get('/unpublished/manufacture/{id}', 'ManufactureController@unpublished_manufacture');
    Route::get('/delete/manufacture/{id}', 'ManufactureController@delete_manufacture');
    Route::get('/edit/manufacture/{id}', 'ManufactureController@edit_manufacture');
    Route::post('/update/manufacture/{id}', 'ManufactureController@update_manufacture');


    /* Post Route */
    Route::get('/add/post', 'PostController@add_post');
    Route::get('/manage/post', 'PostController@manage_post');
    Route::post('/save/post', 'PostController@save_post');
    Route::get('/published/post/{id}', 'PostController@published_post');
    Route::get('/unpublished/post/{id}', 'PostController@unpublished_post');
    Route::get('/delete/post/{id}', 'PostController@delete_post');
    Route::get('/edit/post/{id}', 'PostController@edit_post');
    Route::post('/update/post/{id}', 'PostController@update_post');

    /* Product Route */
    Route::get('/add/product', 'ProductController@add_product');
    Route::get('/manage/product', 'ProductController@manage_product');
    Route::post('/save/product', 'ProductController@save_product');
    Route::get('/published/product/{id}', 'ProductController@published_product');
    Route::get('/unpublished/product/{id}', 'ProductController@unpublished_product');
    Route::get('/delete/product/{id}', 'ProductController@delete_product');
    Route::get('/edit/product/{id}', 'ProductController@edit_product');
    Route::post('/update/product/{id}', 'ProductController@update_product');

    //Manage order
    Route::get('/manage-order', 'OrderManageController@manage_order');
    Route::get('/order_details/{id}', 'OrderManageController@order_details');

    /* Theme Option */
    Route::get('/option', 'AdminController@option');
    Route::post('/save/option', 'ThemeOptionController@save_option');
});


//Auth class Proces
Auth::routes();

