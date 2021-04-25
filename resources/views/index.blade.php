@extends('master.master')
@section('head')
    <link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">
@endsection
@section('slider')
    @include('layouts.assets.slider')
@endsection
@section('content')
    @include('layouts.assets.home')
@endsection

@section('js')
    <script src="{{URL::to('assets/js/style.js')}}"></script>
@endsection
