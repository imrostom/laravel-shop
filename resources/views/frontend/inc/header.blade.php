<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Shopper</title>
        <link href="{{asset('public/frontend')}}/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('public/frontend')}}/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{asset('public/frontend')}}/css/prettyPhoto.css" rel="stylesheet">
        <link href="{{asset('public/frontend')}}/css/price-range.css" rel="stylesheet">
        <link href="{{asset('public/frontend')}}/css/animate.css" rel="stylesheet">
        <link href="{{asset('public/frontend')}}/css/main.css" rel="stylesheet">
        <link href="{{asset('public/frontend')}}/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="{{asset('public/frontend')}}/js/html5shiv.js"></script>
        <script src="{{asset('public/frontend')}}/js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="{{asset('public/frontend')}}/images/home/logo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=255762141567694';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="tel:{{ theme_option('header_phone')}}"><i class="fa fa-phone"></i> {{ theme_option('header_phone')}}</a></li>
                                    <li><a href="mailto:{{ theme_option('header_email')}}"><i class="fa fa-envelope"></i> {{ theme_option('header_email')}} </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ theme_option('facebook_url')}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ theme_option('twitter_url')}}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ theme_option('linkin_url')}}"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="{{ theme_option('google_url')}}"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="{{ url('/') }}"><img src="{{ asset('public/storage/images/'.theme_option('theme_logo')) }}" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    @if(!empty(Cart::count()))
                                    <li><a class="{{ Request::is('checkout') ? 'active' : '' }}" href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <li><a class="{{ Request::is('cart') ? 'active' : '' }}" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    @endif;
                                    @guest
                                    <li><a class="{{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                                    <li><a class="{{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a></li>
                                    @else
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                                    <li><a class="{{ Request::is('shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a></li> 
                                    <li><a class="{{ Request::is('blog') ? 'active' : '' }}" href="{{ url('/blog') }}">Blog</a></li>
                                    <li><a class="{{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <form action="{{ url('/search')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" name="search" placeholder="Search Product Here"/>
                                    <input type="submit" value="Submit"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->