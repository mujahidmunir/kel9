<!doctype html>
<html lang="en">
@include('layouts.assets.head')
<body class=" ">
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->

<div class="wrapper">
    <section class="login-content">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-12">
                    @error('email')
                    <div class="alert text-white bg-danger" role="alert">
                        <div class="iq-alert-icon">
                            <i class="fa fa-remove"></i>
                        </div>
                        <div class="iq-alert-text">E-mail dan password yang anda masukan tidak tersedia</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
                        </button>
                    </div>
                    @enderror
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h2 class="mb-5 text-center">Sign In</h2>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{url('auth/google')}}" class="btn btn-danger btn-block"><i class="fa fa-google">&nbsp;</i>Login
                                        With Google</a>
                                </div>
                                <div class="col-6">
                                    <a href="" class="btn btn-primary btn-block"><i class="fa fa-facebook">&nbsp;</i>Login
                                        With Facebook</a>
                                </div>
                            </div>

                            <div class="text-center mb-3 mt-5">
                                <label class="text-center font-weight-bold">OR</label><br>
                            </div>

                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input type="email"
                                                class="floating-input form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input type="password"
                                                class="floating-input form-control @error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" required autocomplete="password"
                                                autofocus>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <label>Password</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <a href="auth-recoverpw.html" class="text-primary float-right">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 btn-block">Sign In</button>
                                <div class="float-right">

                                </div>

                                <p class="mt-3">
                                    Create an Account <a href="{{url('register')}}" class="text-primary">&nbsp;
                                        Register</a>
                                </p>
                            </form>
                        </div>
                        <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                            <img src="{{URL::to('assets/images/login/01.png')}}" class="img-fluid w-80" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('layouts.assets.js')
</body>
</html>

