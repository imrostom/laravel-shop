@include('frontend/inc/header')

<section id="advertisement">
    <div class="container">
        <img src="{{asset('public/frontend')}}/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @include('frontend/inc/sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">All Items</h2>
                    @foreach($all_products as $single_product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('public/storage/images/'.$single_product->product_image) }}" alt="" />
                                    <h2>Tk {{ $single_product->product_price }}</h2>
                                    <p>{{ $single_product->product_title }}</p>
                                    <a href="{{ url('/product-details/'.$single_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>Tk {{ $single_product->product_price }}</h2>
                                        <p>{{ $single_product->product_title }}</p>
                                        <a href="{{ url('/product-details/'.$single_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <br/>
                    <div class="row">
                    <div class="col-sm-12">
                        {{ $all_products->links() }}
                    </div>
                    </div>
                    <br/>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

@include('frontend/inc/footer')