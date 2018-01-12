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
        <li><a href="<?php echo url('/manage/manufacture'); ?>">Manage Manufacture</a></li>
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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Manufacture</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Manufacture Name</th>
                            <th>Manufacture Description</th>
                            <th>Publication Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($manufacture_lists as $single_manufacture)
                        <tr>
                            <td>1</td>
                            <td class="center">{{ $single_manufacture->manufacture_name }}</td>
                            <td class="center">{{ $single_manufacture->manufacture_description }}</td>
                            <td class="center">
                                @if($single_manufacture->publication_status==1)
                                <span class="label label-warning">Published</span>
                                @else
                                <span class="label label-danger">Unpublished</span>
                                @endif
                            </td>
                            <td class="center">

                                @if($single_manufacture->publication_status==1)
                                <a class="btn btn-danger" href="<?php echo url('/unpublished/manufacture/'.$single_manufacture->manufacture_id); ?>">
                                    <i class="halflings-icon white thumbs-down"></i>                                            
                                </a>
                                @else
                                <a class="btn btn-success" href="<?php echo url('/published/manufacture/'.$single_manufacture->manufacture_id); ?>">
                                    <i class="halflings-icon white thumbs-up"></i>                                            
                                </a>
                                @endif

                                <a class="btn btn-info" href="<?php echo url('/edit/manufacture/'.$single_manufacture->manufacture_id); ?>">
                                    <i class="halflings-icon white edit"></i>                                            
                                </a>
                                <a class="btn btn-danger" href="<?php echo url('/delete/manufacture/'.$single_manufacture->manufacture_id); ?>">
                                    <i class="halflings-icon white trash"></i> 

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