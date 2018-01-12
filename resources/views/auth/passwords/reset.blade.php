@include('frontend/inc/header')
<section id="cart_items">
    <div class="container">
        <h2 class="title text-center">Shipping Here</h2>


        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="register-req">
                        <p>Please Register Shipping Address And Checkout to easily get access to your order history</p>
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
                        <form method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="email" name="email" value="{{ $email or old('email') }}" placeholder="Enter Your Email"/>
                            <input type="password" name="password" placeholder="Enter Your Password"/>
                            <input type="password" name="password_confirmation" placeholder="Enter Your Confirmed Password"/>
                            <input type="submit" class="btn btn-primary" value="Reset Password" />

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