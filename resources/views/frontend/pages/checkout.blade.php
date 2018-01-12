@include('frontend/inc/header')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->
        <h2 class="title text-center">Login/Register Here</h2>

        <div class="register-req">
            <p>Please Use Login/Register And Checkout to easily get access to your order history</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-5">
                    <div class="shopper-info">
                        <p>Login Here</p>
                        <div>
                            @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <form action="{{ url('/checkout-login') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" placeholder="User Email" name="user_email">
                            <input type="password" placeholder="User Password" name="user_password">
                            <input type="submit" value="Login And Next" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
                <div class="col-sm-7 clearfix">
                    <div class="shopper-info">
                        <p>Register Here</p>
                        <div>
                            @if (session('message2'))
                            <div class="alert alert-danger">
                                {{ session('message2') }}
                            </div>
                            @endif
                        </div>
                        <form action="{{ url('checkout-register')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" name="name" placeholder="Name">
                            <input type="text" name="email" placeholder="Email*">
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                            <input type="submit" value="Register And Next" class="btn btn-primary" />
                        </form>
                    </div>
                </div>				
            </div>
        </div>
        <br/>
        <br/>
    </div>
</section> <!--/#cart_items-->



@include('frontend/inc/footer')