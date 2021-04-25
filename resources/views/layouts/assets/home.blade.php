<div class="row">
    {{--    <div class="container">--}}
    {{--        <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"--}}
    {{--             data-owl-options="{--}}
    {{--    						'dots': false,--}}
    {{--    						'nav': true--}}
    {{--    					}">--}}
    {{--            @foreach($news as $key => $data)--}}
    {{--                <div class="card card-block card-stretch card-height blog blog-date">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <div class="image-block position-relative">--}}
    {{--                            <img src="{{URL::to('images/news/thumb/'.$data->thumb)}}" class="img-fluid rounded w-100"--}}
    {{--                                 alt="blog-img">--}}
    {{--                            <div class="blog-meta-date">--}}
    {{--                                <div class="date">{{date('d', strtotime($data->created_at))}}</div>--}}
    {{--                                <div class="month">{{date('M', strtotime($data->created_at))}}</div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="blog-description mt-3">--}}
    {{--                            <div class="blog-meta d-flex align-items-center justify-content-between mb-2">--}}
    {{--                                <div class="author">bank bjb</div>--}}
    {{--                            </div>--}}
    {{--                            <h5 class="mb-2">{{$data->title}}</h5>--}}
    {{--                            <p>{!!$data->thumb_desc!!}</p>--}}
    {{--                            <a href="#" tabindex="-1">Read More <i--}}
    {{--                                    class="ri-arrow-right-s-line"></i></a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div><!-- End .featured-proucts -->--}}
    {{--    </div>--}}

    <div style="margin-top: 50px; padding: 20px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="title-product">
                        <div class="text-product">
                            <div class="text-left">
                                Informasi Terbaru
                            </div>
                        </div>
                    </div>
                    <div class="text-product-right mt-4">
                        <a href="" class="btn btn-primary btn-xl"
                           style="padding: 7px 20px 7px 20px; border-radius: 2vh 0 2vh 0;">Lihat Semua</a>
                    </div>
                </div>
            </div>
            @foreach($news as $key => $data)
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-block card-stretch card-height blog blog-date">
                        <div class="card-body">
                            <div class="image-block position-relative">
                                <a href="{{url('news/'.$data->news_slug)}}">
                                    <img src="{{URL::to('images/news/thumb/'.$data->thumb)}}"
                                         class="img-fluid rounded w-100"
                                         alt="blog-img">
                                    <div class="blog-meta-date">
                                        <div class="date">{{date('d', strtotime($data->NewsCreated))}}</div>
                                        <div class="month">{{date('M', strtotime($data->NewsCreated))}}</div>
                                    </div>
                                </a>
                            </div>
                            <div class="blog-description mt-3">
                                <h5 class="mb-2">{{$data->title}}</h5>
                                <div class="blog-meta d-flex align-items-center justify-content-between mb-2">
                                    <div class="author">Smk Mahaputra</div>
                                </div>
                                <p>{{\Illuminate\Support\Str::limit($data->desc, 150, $end='...')}}</p>
                                <a href="{{url('news/'.$data->news_slug)}}" tabindex="-1">Read More <i
                                        class="ri-arrow-right-s-line"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

</div>

