@include('frontend/inc/header')

<section>
    <div class="container">
        <div class="row">
            @include('frontend/inc/sidebar')
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Latest From our Blog</h2>
                    @if($all_posts)
                    @foreach($all_posts as $single_post)
                    <div class="single-blog-post">
                        <h3><a href="{{ url('blog-details/'.$single_post->post_id) }}">{{ $single_post->post_title }}</a></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> {{ $single_post->admin_name }}</li>
                                <li><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($single_post->created_at)->format('h:i:s A') }} </li>
                                <li><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($single_post->created_at)->format('d-M-Y') }} </li>
                            </ul>
                        </div>
                        <a href="">
                            <img src="{{ asset('public/storage/images/'.$single_post->post_image) }}" alt="">
                        </a>
                        <p>{{ $single_post->post_description }}</p>
                    </div>
                    @endforeach
                    @else
                    <h2>Your Post Not found</h2>
                    @endif
                    <div class="pagination-area">
                        {{ $all_posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend/inc/footer')