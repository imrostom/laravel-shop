@extends('admin/master')

@section('maincontent')

<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo url('/'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo url('/manage/product'); ?>">Manage Product</a></li>
    </ul>
    
    <div class="row-fluid sortable">		
        <div class="box span4">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Info</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Customer Name</td>
                            <td>{{ $customer_info->name }}</td>
                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            <td class="center">Customer Email</td>
                            <td class="center">{{ $customer_info->email }}</td>
                        </tr>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->
        
        <div class="span4">
            
        </div><!--/span-->
        
        <div class="box span4">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Product</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>{{ $shipping_info->shipping_name}}</td>
                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            <td class="center">Email</td>
                            <td class="center">{{ $shipping_info->shipping_email}}</td>
                        </tr>
                        <tr>
                            <td class="center">Phone</td>
                            <td class="center">{{ $shipping_info->shipping_phone}}</td>
                        </tr>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->
    
    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Product</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Product Name</th>
                            <th>Product Images</th>
                            <th>Product Pricc</th>
                            <th>Product Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($product_lists as $single_order)
                        <tr>
                            <td class="center">1</td>
                            <td class="center">{{ $single_order->product_name }}</td>
                            <td class="center"><img style="width:200px;height:100px" src="{{ url('public/storage/images/'.$single_order->product_image) }}"/></td>
                            <td class="center">{{ $single_order->product_price }}</td>
                            <td class="center">{{ $single_order->product_sales_qty }}</td>
                            <td class="center">{{ $single_order->product_price * $single_order->product_sales_qty }} Tk</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->

@endsection