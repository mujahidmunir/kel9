@extends('master.master')
@section('content')
    <div class="content-page-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-product">
                    <div class="text-product">
                        <div class="text-left">
                            {{$news->title}}
                        </div>
                    </div>
                </div>
                <div class="card card-block card-stretch card-height blog blog-detail">

                    <div class="card-body">
                        <div class="image-block">
                            <img src="{{URL::to('images/news/origin', $news->thumb)}}" class="img-fluid rounded w-100"
                                 alt="blog-img">
                        </div>
                        <div class="blog-description mt-3">
                            <div class="blog-meta d-flex align-items-center mb-3">
                                <div class="float-left">
                                    <div class="date mr-4"><i class="ri-calendar-2-fill pr-2"></i>
                                        {{date('d M Y', strtotime($news->NewsCreated))}}
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="author mr-4 d-none d-lg-flex d-sm-flex d-xl-flex"><i
                                            class="ri-user-fill pr-2"></i>By {{$news->name}}
                                    </div>
                                </div>

                            </div>
                            <p>{{$news->desc}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-block card-stretch card-height blog user-comment">
                    <div class="card-header bg-light-light">
                        <div class="row">
                            <div class="col-9">
                                <h4 class="card-title">Comment</h4>
                            </div>
                            <div class="col-lg-3">
                                <button href="" class="btn btn-primary text-center btn-block" style="text-align: right"
                                        data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-edit"></i>Tulis
                                    Komentar
                                </button>
                            </div>
                        </div>
                    </div>
                    @foreach($comment as $data)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-transparent card-block card-stretch card-height blog">
                                        <div class="card-body p-0">
                                            <div class="media mb-4">
                                                @if($data->google_id ==  null)
                                                    <img src="{{URL::to('images/avatar', $data->avatar)}}"
                                                         class="align-self-start mr-3 avatar-70 img-fluid rounded" alt="#">
                                                @else
                                                    <img src="{{$data->avatar}}"
                                                         class="align-self-start mr-3 avatar-70 img-fluid rounded" alt="#">
                                                @endif
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{$data->name}}</h5>
                                                    <div class="float-right">
                                                        <span class="text-light text-right">{{date('d M Y', strtotime($news->NewsCreated))}}</span>
                                                    </div>
                                                    <span class="text-light">{{$data->email}}</span>


                                                    <p>{{$data->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

@endsection

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('create-comment')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" value="{{$news->NewsId}}" name="id">
                <div class="form-group">
                    <label>Tulis Komentar Anda</label>
                    <textarea name="comment" rows="5" class="form-control"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

