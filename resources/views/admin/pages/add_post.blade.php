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
            <a href="<?php echo url('/add/post'); ?>">Add Post</a>
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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Post</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo url('/save/post'); ?>" method="post" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Post Title</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="post_title" placeholder="Enter Post Title" id="typeahead"/>                            </div>
                        </div>         
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Post Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="post_description" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Post Image</label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" name="post_image" id="typeahead"/>                            </div>
                        </div> 

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Post Category</label>
                            <div class="controls">
                                <select name="post_category">
                                    @foreach($category_lists as $single_category)
                                    <option value="{{ $single_category->category_id }}">{{ $single_category->category_name }}</option>
                                    @endforeach
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

@endsection