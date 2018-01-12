<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Dashboard for E-Shopper</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Md Rostom ali">
        <meta name="keyword" content="Dashboard For Blog Template">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="<?php echo asset('public/admin') ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo asset('public/admin') ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="<?php echo asset('public/admin') ?>/css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="<?php echo asset('public/admin') ?>/css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <link id="ie-style" href="<?php echo asset('public/admin') ?>/css/ie.css" rel="stylesheet">
        <![endif]-->

        <!--[if IE 9]>
                <link id="ie9style" href="<?php echo asset('public/admin') ?>/css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: Favicon -->
        <link rel="shortcut icon" href="<?php echo asset('public/admin') ?>/img/avatar.jpg">
        <!-- end: Favicon -->




    </head>

    <body>
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo url('/dashboard'); ?>"><span>E-Shopper Admin Panel</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                            <!-- start: User Dropdown -->
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo Session::get('admin_name'); ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="<?php echo url('/dashboard'); ?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
                            <li><a href="<?php echo url('/add/category'); ?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Add Category</span></a></li>
                            <li><a href="<?php echo url('/manage/category'); ?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Category</span></a></li>
                            <li><a href="<?php echo url('/add/manufacture'); ?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Add Manufacture</span></a></li>
                            <li><a href="<?php echo url('/manage/manufacture'); ?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Manufacture</span></a></li>
                            <li><a href="<?php echo url('/add/post'); ?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> Add Post</span></a></li>
                            <li><a href="<?php echo url('/manage/post'); ?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Manage Post</span></a></li>
                            <li><a href="<?php echo url('/add/product'); ?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> Add Product</span></a></li>
                            <li><a href="<?php echo url('/manage/product'); ?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Manage Product</span></a></li>
                            <li><a href="<?php echo url('/manage-order'); ?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Manage Order</span></a></li>
                            <li><a href="<?php echo url('/option'); ?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Theme Options</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                @yield('maincontent')

            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <div class="clearfix"></div>

        <footer>

            <p>
                <span style="text-align:left;float:left">&copy; 2013 <a href="http://www.imrostom.com">All Designed By Rostom Ali</a></span>
            </p>

        </footer>

        <!-- start: JavaScript-->

        <script src="<?php echo asset('public/admin') ?>/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo asset('public/admin') ?>/js/jquery-migrate-1.0.0.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.ui.touch-punch.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/modernizr.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/bootstrap.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.cookie.js"></script>

        <script src='<?php echo asset("public/admin") ?>/js/fullcalendar.min.js'></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.dataTables.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/excanvas.js"></script>
        <script src="<?php echo asset('public/admin') ?>/js/jquery.flot.js"></script>
        <script src="<?php echo asset('public/admin') ?>/js/jquery.flot.pie.js"></script>
        <script src="<?php echo asset('public/admin') ?>/js/jquery.flot.stack.js"></script>
        <script src="<?php echo asset('public/admin') ?>/js/jquery.flot.resize.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.chosen.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.uniform.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.cleditor.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.noty.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.elfinder.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.raty.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.iphone.toggle.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.uploadify-3.1.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.gritter.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.imagesloaded.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.masonry.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.knob.modified.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/jquery.sparkline.min.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/counter.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/retina.js"></script>

        <script src="<?php echo asset('public/admin') ?>/js/custom.js"></script>
        <!-- end: JavaScript-->

    </body>
</html>
