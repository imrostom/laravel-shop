@include('frontend/inc/header')
<section>
    <div class="container">
        <div class="row">
            @include('frontend/inc/sidebar')
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Blog Info</h2>
                    <div class="single-blog-post">
                        <h3>{{ $post_details->post_title }}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> {{ $post_details->admin_name }}</li>
                                <li><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($post_details->created_at)->format('h:i:s A') }} </li>
                                <li><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($post_details->created_at)->format('d-M-Y') }} </li>
                            </ul>
                        </div>
                        <a href="">
                            <img src="{{ asset('public/storage/images/'.$post_details->post_image) }}" alt="">
                        </a>
                        {{ $post_details->post_description }}
                        <div class="pager-area">
                            <ul class="pager pull-right">
                                @if(isset($prev->post_id))
                                <li><a href="{{ url('blog-details/'.$prev->post_id) }}">Prev</a></li>
                                @endif
                                @if(isset($next->post_id))
                                <li><a href="{{ url('blog-details/'.$next->post_id) }}">Next</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div><!--/blog-post-area-->

                <div class="rating-area">
                    <ul class="ratings">
                        <li class="rate-this">Share this item:</li>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?url=<?php echo url()->full(); ?>">Facebook</a></li>
                        <li><a href="https://twitter.com/intent/tweet?text=<?php echo $post_details->post_title?>&amp;url=<?php echo url()->full(); ?>">Twitter</a></li>
                        <li><a href="https://plus.google.com/share?url=<?php echo url()->full(); ?>">Google Plus</a></li>
                    </ul>
                    <ul class="tag">
                        <li>TAG:</li>
                        <li><a class="color" href="">{{$post_details->category_name}}</a></li>
                    </ul>
                </div><!--/rating-area-->

                <div class="response-area">
                    <style type="text/css">
                        .fb-comments{width:100% !important;padding-top: 30px}
                        .fb-comments span{width:100% !important}
                        .fb-comments span iframe{width:100% !important}
                    </style>
                    <div class="fb-comments" data-href="<?php echo url()->full(); ?>" data-numposts="10"></div>
                </div><!--/Response-area-->
            </div>	
        </div>
    </div>
</section>

@include('frontend/inc/footer')