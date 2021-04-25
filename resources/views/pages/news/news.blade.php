@extends('master.master')
@section('slider')
    @include('layouts.assets.banner')
@endsection
@section('content')

   <div class="content-page-1">
       <div class="row">
           <div class="col-12 container mt-3 mb-3">
               <div class="title-product">
                   <div class="text-product">
                       Informasi Terbaru
                   </div>
               </div>
           </div>
           @foreach($news as $data)
           <div class="col-lg-6">
               <div class="card card-block card-stretch card-height blog blog-list">
                   <div class="card-body">
                       <div class="d-flex flex-wrap align-items-center">
                           <div class="col-md-6 p-0">
                               <div class="image-block pr-md-3">
                                   <img src="{{URL::to('images/news/thumb', $data->thumb)}}" class="img-fluid rounded w-100" alt="blog-img">
                               </div>
                           </div>
                           <div class="col-md-6 mt-3 mt-md-0 p-0">
                               <div class="blog-description">
                                   <div class="blog-meta-date mb-2">
                                       <div class="date"><a href="#" tabindex="-1">{{date('d M Y', strtotime($data->NewsCreated))}}</a>
                                       </div>
                                   </div>
                                   <h5 class="mb-2">{{$data->title}}</h5>
                                   <div class="blog-meta d-flex align-items-center pb-2 mb-2 border-bottom">
                                       <div class="author mr-3"><i class="ri-user-fill pr-2"></i>By: {{$data->name}}</div>
                                       <div class="hit"><i class="las la-heart pr-2"></i>0 Hits</div>
                                   </div>
                                   <p>{{\Illuminate\Support\Str::limit($data->desc, 150, $end='...')}}</p> <a href="{{url('news', $data->news_slug)}}" tabindex="-1">Read More <i class="ri-arrow-right-s-line"></i></a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           @endforeach

       </div>
   </div>
@endsection
