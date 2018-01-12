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
            <a href="<?php echo url('/add/manufacture'); ?>">Add Manufacture</a>
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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacture</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo url('/save/manufacture'); ?>" method="post">
                    {{ csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Manufacture Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="manufacture_name" placeholder="Enter Manufacture Name" id="typeahead"/>                            </div>
                        </div>         
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Manufacture Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="manufacture_description" id="textarea2" rows="3"></textarea>
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
                            <button type="submit" class="btn btn-primary">Add Manufacture</button>
                            <a class="btn btn-danger" href="<?php echo url('/manage/manufacture'); ?>">Show All Manufacture List</a>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

</div><!--/.fluid-container-->
<!-- end: Content -->

@endsection