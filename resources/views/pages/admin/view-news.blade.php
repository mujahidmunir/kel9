@extends('master.master-admin')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Daftar Berita</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table data-table table-striped table-bordered" >
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $key => $data)
                        <tr>
                            <td class="text-center">{{$key + 1}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->cat_name}}</td>
                            <td class="text-center">
                                <a href="{{url('dashboard/news/edit', $data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{url('dashboard/news/delete', $data->id)}}" class="btn btn-danger btn-sm">Delete</a>

                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
