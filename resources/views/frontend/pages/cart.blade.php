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
                        <td style="width:4%" class="id">Id</td>
                        <td style="width:10%" class="image">Item</td>
                        <td style="width:40%" class="description">Title</td>
                        <td style="width:10%" class="price">Price</td>
                        <td style="width:15%" class="quantity">Quantity</td>
                        <td style="width:15%" class="total">Total</td>
                        <td style="width:6%">Delete</td>
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
                                <a href="{{ url('/product-details/'.$cart_product_item->id)}}"><img style="width:150px;height:70px" src="{{asset('public/storage/images/'.$cart_product_item->options->product_image)}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ url('/product-details/'.$cart_product_item->id)}}">{{ $cart_product_item->name }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>Tk {{ $cart_product_item->price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{ url('/cart-update')}}" method="post">
                                        {{ csrf_field()}}
                                        <input class="cart_quantity_input" type="number" style="width:40px" name="qty" value="{{ $cart_product_item->qty }}"/>
                                        <input class="cart_quantity_input" type="hidden" style="width:40px" name="rowId" value="{{ $cart_product_item->rowId }}"/>
                                        <input class="cart_quantity_input" type="submit" style="width:70px" value="Update"/>
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Tk {{ $cart_product_item->total}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ url('/cart-remove/'.$cart_product_item->rowId)}}"><i class="fa fa-times"></i></a>
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
                    <ul>
                        <li>Cart Sub Total <span>Tk <?php echo Cart::subtotal(); ?></span></li>
                        <li>Eco Tax <span>Tk <?php echo Cart::tax(); ?></span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>Tk <?php echo Cart::total(); ?></span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{ url('/shop') }}">Continue Shopping</a>
                    @if(empty(auth()->user()->id))
                    <a class="btn btn-default check_out" href="{{ url('/checkout') }}">Check Out</a>
                    @else
                    <a class="btn btn-default check_out" href="{{ url('/product-shipping') }}">CheckOut</a>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@include('frontend/inc/footer')