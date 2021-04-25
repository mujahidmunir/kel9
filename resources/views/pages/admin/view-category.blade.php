@extends('master.master-admin')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-10 float-left">
                    <h4 class="card-title">Daftar Kategori</h4>
                </div>
                <div class="col-2 float-right">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addCategory">Tambah Kategori</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table data-table table-striped table-bordered" >
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Nama Kategory</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cat as $key => $data)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td>{{$data->cat_name}}</td>
                            <td class="text-center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#EditCategory{{$data->id}}">Edit</button>
                                <a href="{{url('dashboard/category/delete', $data->id)}}" class="btn btn-danger">Delete</a>

                            </td>

                        </tr>

                        <div class="modal fade" id="EditCategory{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby=""
                             aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-gradient-warning">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kategori</h5>
                                        <button type="button" data-toggle="modal" data-target="#addCategory" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('dashboard/category/update', $data->id)}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Kategory</label>
                                                <input type="text" name="cat_name" value="{{$data->cat_name}}" class="form-control">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="Submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kategori</h5>
                <button type="button" data-toggle="modal" data-target="#addCategory" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategory</label>
                        <input type="text" name="cat_name" class="form-control">
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

