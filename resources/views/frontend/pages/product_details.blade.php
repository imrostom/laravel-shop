@include('frontend/inc/header')

<section>
    <div class="container">
        <div class="row">

            @include('frontend/inc/sidebar')

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ asset('public/storage/images/'.$product_info->product_image)}}" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            @if($product_info->product_condition==1)
                            <img src="{{asset('public/frontend')}}/images/product-details/new.jpg" class="newarrival" alt="" />
                            @endif
                            <h2>{{ $product_info->product_title }}</h2>
                            <p>Product Key: {{ $product_info->product_key }}</p>
                            <span>
                                <span>Tk {{ $product_info->product_price }}</span>
                                <label>Quantity:</label>
                                <form action="{{ url('/add_to_cart') }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    <input type="number" value="1" name="qty" />
                                    <input type="hidden" value="{{ $product_info->product_id }}" name="product_id" />
                                    <input type="submit" style="width:130px;display: inline-block" value="Add To Cart" class="add-to-cart"/>
                                </form>
                            </span>
                            <p><b>Availability:</b> 
                                @if($product_info->product_aviality==1)
                                In Stock
                                @else
                                Out Of Stock
                                @endif
                            </p>
                            <p><b>Condition:</b>
                                @if($product_info->product_condition==1)
                                New/Fresh
                                @else
                                Old/Unfresh
                                @endif
                            </p>
                            <p><b>Brand:</b> {{ $product_info->manufacture_name }}</p>
                            <div>
                                <a>Share This Item: </a>
                                <a href="" class="fa fa-facebook"></a>
                                <a href="" class="fa fa-twitter"></a>
                                <a href="" class="fa fa-google-plus"></a>
                            </div>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Product Details</a></li>
                            <li><a href="#tag" data-toggle="tab">Related Product</a></li>
                            <li><a href="#reviews" data-toggle="tab">Product Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active fade in" id="details" >
                            <div class="col-sm-12">
                                <p>{{ $product_info->product_description}}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tag" >
                            
                            <?php 
                            $manufacture_list_products = manufacture_list_products($product_info->manufacture_id);
                            foreach($manufacture_list_products as $single_manufacture_item){
                            ?>
                            
                            <div class="col-sm-3">
                                <div class="product-image-wrapper" style="height:auto">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('public/storage/images/'.$single_manufacture_item->product_image)}}" alt="" />
                                            <h2>Tk {{ $single_manufacture_item->product_price }}</h2>
                                            <p>{{ $single_manufacture_item->product_title }}</p>
                                            <a href="{{ url('/product-details/'.$single_manufacture_item->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                          <?php }?>

                        </div>

                        <div class="tab-pane fade" id="reviews" >
                            <div class="myfacebook_comment">
                                <style type="text/css">
                                    .fb-comments{width:100% !important;padding-top: 30px}
                                    .fb-comments span{width:100% !important}
                                    .fb-comments span iframe{width:100% !important}
                                </style>
                                <div class="fb-comments" data-href="<?php echo url()->full(); ?>" data-numposts="10"></div>

                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

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