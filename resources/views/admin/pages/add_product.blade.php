@extends('admin/master')

@section('maincontent')
<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo url('/dashboard'); ?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo url('/add/product'); ?>">Add Product</a>
        </li>
    </ul>

    <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo url('/save/product'); ?>" method="post" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Title</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_title" placeholder="Enter Product Title" id="typeahead" />       
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="textarea2">Product Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_description" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Image</label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" name="product_image" id="typeahead"/>                            </div>
                        </div> 

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Manufacture</label>
                            <div class="controls">
                                <select name="product_manufacture">
                                    @foreach($manufacture_lists as $single_manufacture)
                                    <option value="{{ $single_manufacture->manufacture_id }}">{{ $single_manufacture->manufacture_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Key</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_key" placeholder="Enter Product Key" id="typeahead"/>                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Price</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_price" placeholder="Enter Product Price" id="typeahead"/>                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Quantity</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_quantity" placeholder="Enter Product Quantity" id="typeahead"/>                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Aviality</label>
                            <div class="controls">
                                <select name="product_aviality">
                                    <option value="1">Stock Avialable</option>
                                    <option value="0">Stock Not</option>
                                </select>                             
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Condition</label>
                            <div class="controls">
                                <select name="product_condition">
                                    <option value="1">New</option>
                                    <option value="0">Old</option>
                                </select>                           
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="1">Published</option>
                                    <option value="0">UnPublished</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <a class="btn btn-danger" href="<?php echo url('/manage/product'); ?>">Show All Product List</a>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

</div><!--/.fluid-container-->
<!-- end: Content -->

@endsection