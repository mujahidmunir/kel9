
<!doctype html>
<html lang="en">
@include ('layouts.assets.head')
<body class="  ">

<div class="wrapper">
    @include('layouts.admin.sidebar')
    @include('layouts.admin.header')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6 text-right">
                SMK Mahaputra Cerdas Utama
            </div>
        </div>
    </div>
</footer>
@include('layouts.assets.js')
@include('sweetalert::alert')
</body>
</html>
