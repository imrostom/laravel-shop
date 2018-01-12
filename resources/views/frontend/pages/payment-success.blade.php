@include('frontend/inc/header')

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="total_area" style="padding-left:20px">
                    <h2 class="title text-center">Order Success</h2>
                    <p>Your Payment Order Successfully Done.We Contact You As Soon As Possible</p>
                    <p>You Can Download Boucher Here</p>
                    <a class="btn btn-primary btn-lg pull-center" href="{{ url('/pdf/'.session('order_id')) }}">Download Boucher Now</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@include('frontend/inc/footer')