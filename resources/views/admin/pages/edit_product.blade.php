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
            <a href="<?php echo url('/edit/product/'.$product_info->product_id); ?>">Edit Product</a>
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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo url('/update/product/'.$product_info->product_id); ?>" method="post" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Title</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" value="{{$product_info->product_title}}" name="product_title" placeholder="Enter Product Title" id="typeahead" />       
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="textarea2">Product Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_description" id="textarea2" rows="3">
                                    {{$product_info->product_description}}
                                </textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Image</label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" name="product_image" id="typeahead"/> 
                            </div>
                        </div> 
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Show Product Image</label>
                            <div class="controls">
                                <img style="width:500px;height:200px" src="{{ asset('public'.Storage::disk('local')->url($product_info->product_image)) }}"/> 
                            </div>
                        </div> 

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Manufacture</label>
                            <div class="controls">
                                <select id="product_manufacture" name="product_manufacture">
                                    @foreach($manufacture_lists as $single_manufacture)
                                    <option value="{{ $single_manufacture->manufacture_id }}">{{ $single_manufacture->manufacture_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Key</label>
                            <div class="controls">
                                <input type="text" value="{{$product_info->product_key}}" class="span6 typeahead" name="product_key" placeholder="Enter Product Key" id="typeahead"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Price</label>
                            <div class="controls">
                                <input type="text" value="{{$product_info->product_price}}" class="span6 typeahead" name="product_price" placeholder="Enter Product Price" id="typeahead"/>    
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Quantity</label>
                            <div class="controls">
                                <input type="text" value="{{$product_info->product_quantity}}" class="span6 typeahead" name="product_quantity" placeholder="Enter Product Quantity" id="typeahead"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Aviality</label>
                            <div class="controls">
                                <select id="product_aviality" name="product_aviality">
                                    <option value="1">Stock Avialable</option>
                                    <option value="0">Stock Not</option>
                                </select>                             
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Condition</label>
                            <div class="controls">
                                <select id="product_condition" name="product_condition">
                                    <option value="1">New</option>
                                    <option value="0">Old</option>
                                </select>                           
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                <select id="publication_status" name="publication_status">
                                    <option value="1">Published</option>
                                    <option value="0">UnPublished</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Post</button>
                            <a class="btn btn-danger" href="<?php echo url('/manage/post'); ?>">Show All Post List</a>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

</div><!--/.fluid-container-->
<!-- end: Content -->

<script>
    document.getElementById('product_manufacture').value = {{ $product_info->product_manufacture }};
    document.getElementById('product_aviality').value = {{ $product_info->product_aviality }};
    document.getElementById('product_condition').value = {{ $product_info->product_condition }};
    document.getElementById('publication_status').value = {{ $product_info->publication_status }};
</script>

@endsection