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
    <div>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Product</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Customer Name</th>
                            <th>Customer email</th>
                            <th>Shipping Name</th>
                            <th>Shipping Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($manage_order as $single_order)
                        <tr>
                            <td class="center">1</td>
                            <td class="center">{{ $single_order->name }}</td>
                            <td class="center">{{ $single_order->email }}</td>
                            <td class="center">{{ $single_order->shipping_name }}</td>
                            <td class="center">{{ $single_order->shipping_phone }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('order_details/'.$single_order->order_id) }}">
                                    <i class="halflings-icon white info-sign"></i>                                            
                                </a>
                            </td>
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