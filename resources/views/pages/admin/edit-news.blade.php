@extends('master.master-admin')

@section('content')
    <div class="card col-12">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Berita</h4>
            </div>
        </div>
        <div class="card-body">

            <form class="form-horizontal" action="{{url('dashboard/news/update', $news->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center" for="email">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" value="{{$news->title}}" required>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center" for="email">Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="cat_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($cat as $data)
                                <option @if($news->cat_id == $data->id) selected @endif value="{{$data->id}}">{{$data->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center" for="email">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" rows="5" name="desc" required>{{$news->desc}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center" for="email">Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="img" placeholder="Enter Your  email">
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn bg-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
