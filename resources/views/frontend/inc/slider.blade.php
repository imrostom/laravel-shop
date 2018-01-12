<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <?php
                    $slider_products = DB::table('tbl_product')->where('publication_status', 1)->take(5)->get();
                    ?>
                    <ol class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < count($slider_products); $i++) {
                            ?>
                            <li data-target="#slider-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if ($i == 0) {
                            echo "active";
                        } ?>"></li>
<?php } ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        foreach ($slider_products as $single_slider_product) {
                            ?>
                            <div class="item <?php if ($i == 0) {
                                echo "active";
                            } ?>">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h3><?php echo Str::words($single_slider_product->product_title, 5); ?></h3>
                                    <p><?php echo Str::words($single_slider_product->product_description, 15); ?></p>
                                    <a href="{{ url('/product-details/'.$single_slider_product->product_id)}}" class="btn btn-default get">Get it now</a>
                                </div>
                                <div class="col-sm-6">
                                    <img style="width:350px;height:400px" src="{{ asset('public/storage/images/'.$single_slider_product->product_image)}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend')}}/images/home/pricing.png"  class="pricing" alt="" />
                                    <p class="myprice">{{ $single_slider_product->product_price }} Tk</p>
                                </div>
                            </div>
    <?php $i++;
} ?>

                    </div>
                    <style type="text/css">
                        .myprice{
                            position: relative;
                            top: -85px;
                            left: 37%;
                            color: #E74C3C !important;
                            font-weight: bold !important
                        }
                    </style>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->