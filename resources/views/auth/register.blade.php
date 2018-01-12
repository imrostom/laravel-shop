@include('frontend/inc/header')

<section id="cart_items">
    <div class="container">
        <h2 class="title text-center">Register Here</h2>


        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="register-req">
                        <p>Please Register To Crate Your Account</p>
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
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Your Name">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                            <input type="password" name="password" placeholder="Enter Your Password">
                            <input type="password" name="password_confirmation" placeholder="Enter Your confirmed Password">
                            <input class="btn btn-primary" type="submit"  value="Register" >

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