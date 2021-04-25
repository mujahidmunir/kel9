<div class="dashboard2-header-style">
    <div class="iq-top-navbar analytic">
        <div class="container">
            <div class="iq-navbar-custom d-flex align-items-center justify-content-between">
                <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                    <i class="ri-menu-line wrapper-menu text-primary"></i>
                    <a href="index-2.html" class="header-logo">
                        <img src="{{URL::to('images/logo/logo.png')}}" class="img-fluid rounded-normal" alt="logo">
                    </a>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light px-0">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list align-items-center">
                            <li class="nav-item iq-full-screen"><a href="#" class="" id="btnFullscreen"><i
                                        class="ri-fullscreen-line text-primary"></i></a></li>
                            <li class="caption-content">
                                <a href="#" class="iq-user-toggle">
                                    @guest()

                                    @else
                                        @if(Auth::user()->google_id == null)
                                            <img src="{{URL::to('images/avatar', Auth::user()->avatar)}}" class="img-fluid rounded" alt="user">
                                        @else
                                            <img src="{{Auth::user()->avatar}}" class="img-fluid rounded" alt="user">
                                        @endif

                                    @endif
                                </a>
                                <div class="iq-user-dropdown">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                            <div class="header-title">
                                                <h4 class="card-title mb-0">Profile</h4>
                                            </div>
                                            <div class="close-data text-right badge badge-primary cursor-pointer"><i class="ri-close-fill"></i></div>
                                        </div>
                                        <div class="data-scrollbar" data-scroll="2">
                                            <div class="card-body">
                                                <div class="profile-header">
                                                    <div class="cover-container ">
                                                        <div class="media align-items-center mb-4">
                                                            <img src="{{URL::to('assets/images/user/1.jpg')}}" alt="profile-bg"
                                                                 class="rounded img-fluid avatar-80">
                                                            <div class="media-body profile-detail ml-3">
                                                                <h3>Bill Yerds</h3>
                                                                <div class="d-flex flex-wrap">
                                                                    <p class="mb-1">Web designer</p><a href="auth-sign-in.html" class=" ml-3">Sign
                                                                        Out</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                            <div class="profile-details text-center">
                                                                <a href="http://iqonic.design/themes/instadash/html/app/user-profile.html"
                                                                   class="iq-sub-card bg-primary-light rounded-small p-2">
                                                                    <div class="rounded iq-card-icon-small">
                                                                        <i class="ri-file-user-line"></i>
                                                                    </div>
                                                                    <h6 class="mb-0 ">My Profile</h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6  col-md-6 col-6">
                                                            <div class="profile-details text-center">
                                                                <a href="http://iqonic.design/themes/instadash/html/app/user-profile-edit.html"
                                                                   class="iq-sub-card bg-danger-light rounded-small p-2">
                                                                    <div class="rounded iq-card-icon-small">
                                                                        <i class="ri-profile-line"></i>
                                                                    </div>
                                                                    <h6 class="mb-0 ">Edit Profile</h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                            <div class="profile-details text-center">
                                                                <a href="http://iqonic.design/themes/instadash/html/app/user-account-setting.html"
                                                                   class="iq-sub-card bg-success-light rounded-small p-2">
                                                                    <div class="rounded iq-card-icon-small">
                                                                        <i class="ri-account-box-line"></i>
                                                                    </div>
                                                                    <h6 class="mb-0 ">Account</h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6  col-6">
                                                            <div class="profile-details text-center">
                                                                <a href="http://iqonic.design/themes/instadash/html/app/user-privacy-setting.html"
                                                                   class="iq-sub-card bg-info-light rounded-small p-2">
                                                                    <div class="rounded iq-card-icon-small">
                                                                        <i class="ri-lock-line"></i>
                                                                    </div>
                                                                    <h6 class="mb-0 ">Settings</h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="personal-details">
                                                        <h5 class="card-title mb-3 mt-3">Personal Details</h5>
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-sm-6">
                                                                <h6>Birthday</h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="mb-0">3rd March</p>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-sm-6">
                                                                <h6>Address</h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="mb-0">Landon</p>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-sm-6">
                                                                <h6>Phone</h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="mb-0">(010)987 543 201</p>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-sm-6">
                                                                <h6>Email</h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="mb-0"><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a8eac9dadad1e8cdd0c9c5d8c4cd86cbc7c5">[email&#160;protected]</a></p>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-sm-6">
                                                                <h6>Twitter</h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="mb-0">@Barry</p>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-sm-6">
                                                                <h6>Facebook</h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="mb-0">@Barry_Tech</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    @include ('layouts.assets.menu')
</div>
