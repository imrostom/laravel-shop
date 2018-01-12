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
            <a href="<?php echo url('/option'); ?>">Option</a>
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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Options</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo url('/save/option'); ?>" enctype="multipart/form-data" method="post">
                    {{ csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <h2>Theme Header Option</h2>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Header Phone</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('header_phone') }}" class="span6 typeahead" name="header_phone" placeholder="Enter Header Phone" id="typeahead"/>                            
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="textarea2">Header Email</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('header_email') }}" class="span6 typeahead" name="header_email" placeholder="Enter Header Email" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <h2>Theme Header Social Icon</h2>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="textarea2">Facebook Url</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('facebook_url') }}" class="span6 typeahead" name="facebook_url" placeholder="Enter Header Url" id="typeahead"/>                            
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="textarea2">Twitter Url</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('twitter_url') }}"class="span6 typeahead" name="twitter_url" placeholder="Enter Twitter Url" id="typeahead"/>                            
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="textarea2">LinkedIn Url</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('linkin_url') }}"class="span6 typeahead" name="linkin_url" placeholder="Enter Linked Url" id="typeahead"/>                            
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="textarea2">GogglePlus Url</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('google_url') }}" class="span6 typeahead" name="google_url" placeholder="Enter Google Url" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <h2>Theme Logo Add Here</h2>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Theme Logo</label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" name="theme_logo" placeholder="Upload Theme Logo" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Show Theme Logo</label>
                            <div class="controls">
                                <img src="{{ asset('public/storage/images/'.theme_option('theme_logo')) }}" style="width: 300px;height: 200px"/>
                            </div>
                        </div>
                        

                        <div class="control-group">
                            <h2>Sidebar Add</h2>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Upload Sidebar Add Image</label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" name="sidebar_add_img" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Show Sidebar Add Image</label>
                            <div class="controls">
                                <img src="{{ asset('public/storage/images/'.theme_option('sidebar_add_img')) }}" style="width: 300px;height: 200px"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Sidebar Add Link</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('sidebar_add_link') }}" class="span6 typeahead" name="sidebar_add_link" id="typeahead" placeholder="Sidebar Add Image Link"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <h2>Footer Area</h2>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">About Us text </label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('about_us_text') }}" class="span6 typeahead" name="about_us_text" placeholder="Enter About Us Text" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Footer Contact Address </label>
                            <div class="controls">
                                <textarea class="cleditor" name="footer_contact_address">
                                    {{ theme_option('footer_contact_address') }}
                                </textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Copyright By</label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('copyright_by') }}" class="span6 typeahead" name="copyright_by" placeholder="Enter Copyright By" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Developed By </label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('developed_by') }}" class="span6 typeahead" name="developed_by" placeholder="Enter Developed By" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <h2>Contact Page</h2>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Map Latitude </label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('map_latitude') }}" class="span6 typeahead" name="map_latitude" placeholder="Enter Map Latitude" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Map Longitute </label>
                            <div class="controls">
                                <input type="text" value="{{ theme_option('map_longitute') }}" class="span6 typeahead" name="map_longitute" placeholder="Enter Map Longitute" id="typeahead"/>                            
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Contact Page Address </label>
                            <div class="controls">
                                <textarea class="cleditor" name="contact_page_address">
                                     {{ theme_option('contact_page_address') }}
                                </textarea>
                            </div>
                        </div>
                        
                        

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save Option</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

</div><!--/.fluid-container-->
<!-- end: Content -->

@endsection