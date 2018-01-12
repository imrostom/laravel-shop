@include('frontend/inc/header')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <h2 class="title text-center">Cart List Here</h2>
        <div>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td style="width:10%" class="id">Id</td>
                        <td style="width:10%" class="image">Item</td>
                        <td style="width:40%" class="description">Title</td>
                        <td style="width:10%" class="price">Price</td>
                        <td style="width:15%" class="quantity">Quantity</td>
                        <td style="width:15%" class="total">Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach (Cart::content() as $cart_product_item) {
                        $i++;
                        ?>
                        <tr>
                            <td class="cart_serial"><?php echo $i; ?></td>
                            <td class="cart_products">
                                <img style="width:150px;height:70px" src="{{asset('public/storage/images/'.$cart_product_item->options->product_image)}}" alt="">
                            </td>
                            <td class="cart_description">
                                <h4>{{ $cart_product_item->name }}</h4>
                            </td>
                            <td class="cart_price">
                                <p>Tk {{ $cart_product_item->price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="number" style="width:40px" name="qty" value="{{ $cart_product_item->qty }}"/>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Tk {{ $cart_product_item->total}}</p>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="total_area">
                    <h2 class="title text-center">Payment Option</h2>
                    <ul>
                        <li>Total Amount :<span>Tk <?php echo Cart::total(); ?></span></li>
                    </ul>
                    <div class="payment_option">
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
                        <form action="{{ url('/save/order') }}" method="post">
                            {{ csrf_field() }}
                            <input type="radio" value="cashon" name="payment_type" checked/> Cash On Delivary<br/>
                            <input type="radio" value="sslcommerz" name="payment_type"/> Ssl Commerz<br/>
                            <input type="radio" value="paypal" name="payment_type"/> Paypal<br/>
                            <input type="submit" value="Place Order" class="btn btn-primary btn-lg"/>
                        </form>
                    </div>
                    <style>
                        .payment_option{padding-left:50px}
                    </style>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@include('frontend/inc/footer')