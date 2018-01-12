@include('frontend/inc/header')
<section id="cart_items">
    <div class="container">
        <h2 class="title text-center">Login Here</h2>


        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="register-req">
                        <p>Please Login Here to easily get access to your Account</p>
                    </div><!--/register-req-->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="shopper-info">
                        <form method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Your Email"/>
                            <input name="password" type="password" class="form-control" placeholder="Enter Password"/>
                            <input style="width:auto;float: left;padding:2px" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>  Remember Me
                            
                            <input type="submit" class="btn btn-primary" value="Login"/>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>

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