@include('frontend/inc/header')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->
        <h2 class="title text-center">Shipping Here <?php echo Auth::id();?></h2>

        <div class="register-req">
            <p>Please Register Shipping Address And Checkout to easily get access to your order history</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="shopper-info">
                        <p>Register Your Shipping Address</p>
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
                        <form action="{{ url('/save/product/shipping')}}" method="post">
                            {{ csrf_field()}}
                            <input type="text" placeholder="Shipping Name" name="shipping_name">
                            <input type="text" placeholder="Shipping Email" name="shipping_email">
                            <input type="text" placeholder="Shipping Phone" name="shipping_phone">
                            <textarea name="shipping_address" placeholder="Shipping Address" rows="5"></textarea>
                            <input type="submit" value="Save And Next" class="btn btn-primary" />
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