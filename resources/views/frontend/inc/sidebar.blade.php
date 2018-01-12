<div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($category_lists as $single_category)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ url('category-post/'.$single_category->category_id) }}">{{ $single_category->category_name}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($manufacture_lists as $single_manufacture)
                                <li><a href="{{ url('manufacture-post/'.$single_manufacture->manufacture_id) }}"> <span class="pull-right">(<?php count_manufacture($single_manufacture->manufacture_id);?>)</span><?php echo $single_manufacture->manufacture_name;?></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="shipping text-center"><!--shipping-->
                        <a href="{{ theme_option('sidebar_add_link')}}"><img src="{{asset('public/storage/images/'.theme_option('sidebar_add_img'))}}" alt="" /></a>
                    </div><!--/shipping-->

                </div>
            </div>