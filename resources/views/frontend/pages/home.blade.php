@include('frontend/inc/header')

@include('frontend/inc/slider')



<section>
    <div class="container">
        <div class="row">
            
            @include('frontend/inc/sidebar')
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    
                    @foreach($features_products as $single_product)
                    
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
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach

                </div><!--features_items-->


                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                           <?php 
                          //dd($new_products);
                            $new_products_chunk = array_chunk($new_products,3);
                            $i=0;
                            foreach($new_products_chunk as $single_new_product_chunk){
                           ?>
                            
                            <div class="item <?php if($i==0){ echo "active";}?>">	
                                <?php foreach($single_new_product_chunk as $single_new_product){?>
                                
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('public/storage/images/'.$single_new_product["product_image"]) }}" alt="" />
                                                <h2>Tk {{ $single_new_product["product_price"] }}</h2>
                                                <p>{{ $single_new_product["product_title"] }}</p>
                                                <a href="{{ url('/product-details/'.$single_new_product["product_id"])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            <?php 
                            $i++;
                            }
                            ?>

                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>			
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

@include('frontend/inc/footer')