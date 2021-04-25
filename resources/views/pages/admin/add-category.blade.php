@extends('master.master-admin')

@section('content')
    <div class="card col-12">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <div class="row">


                </div>


            </div>
        </div>
        <div class="card-body">

            <form class="form-horizontal" action="" method="post">
                @csrf
                <div class="form-group row">
                    <label class="control-label col-sm-3 align-self-center" for="email">Nama Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your  email">
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
