<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Admin Panel</title>
        <meta name="description" content="Admin Dashboard">
        <meta name="author" content="Admin Rostom Ali">
        <meta name="keyword" content="Admin Panel">
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
        <link rel="shortcut icon" href="<?php echo asset('public/admin') ?>/img/avater.jpg">
        <!-- end: Favicon -->

        <style type="text/css">
            body { background: url(<?php echo asset('public/admin') ?>/img/bg-login.jpg) !important; }
        </style>



    </head>

    <body>
        <div class="container-fluid-full">
            <div class="row-fluid">

                <div class="row-fluid">
                    <div class="login-box">
                        <br/>
                        <br/>
                        <h2>Login to your account</h2>
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

                        <form class="form-horizontal" action="{{ url('/admin/login/check') }}" method="post">
                            <fieldset>
                                {{csrf_field()}}
                                <div class="input-prepend" title="Admin Email">
                                    <span class="add-on"><i class="halflings-icon user"></i></span>
                                    <input class="input-large span10" name="admin_email" id="username" type="text" placeholder="type admin email"/>
                                </div>
                                <div class="clearfix"></div>

                                <div class="input-prepend" title="Password">
                                    <span class="add-on"><i class="halflings-icon lock"></i></span>
                                    <input class="input-large span10" name="admin_password" id="password" type="password" placeholder="type admin password"/>
                                </div>
                                <div class="clearfix"></div>


                                <div class="button-login">	
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="clearfix"></div>
                        </form>
                        <hr>
                    </div><!--/span-->
                </div><!--/row-->


            </div><!--/.fluid-container-->

        </div><!--/fluid-row-->

    </body>
</html>
