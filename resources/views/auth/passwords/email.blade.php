@include('frontend/inc/header')

<section id="cart_items">
    <div class="container">
        <h2 class="title text-center">Reset Here</h2>


        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="register-req">
                        <p>Please Enter Your Email To Reset Yout Password</p>
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
                        <form method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <input placeholder="Enter You Email" type="email" name="email" value="{{ old('email') }}">
                            <input class="btn btn-primary" type="submit" value="Send Password Reset Link">

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