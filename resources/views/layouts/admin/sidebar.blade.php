<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="index-2.html" class="header-logo">
            <img src="{{URL::to('images/logo/logo.png')}}" class="img-fluid rounded-normal light-logo" alt="logo">
            SMK Mahaputra
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{ request()->is('dashboard') ? 'active' : ''}}">
                    <a href="{{url('/dashboard')}}"  aria-expanded="false">
                        Dashboards
                    </a>
                </li>

                <li class="{{ request()->is('dashboard/category') ? 'active' : ''}}">
                    <a href="{{url('dashboard/category')}}" aria-expanded="false">
                        Category
                    </a>
                </li>

                <li class=" ">
                    <a href="#news" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        News
                    </a>
                    <ul id="news" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('dashboard/news/add') ? 'active' : ''}}">
                            <a href="{{url('dashboard/news/add')}}">Add News</a>
                        </li>
                        <li class="{{ request()->is('dashboard/news/view') ? 'active' : ''}}">
                            <a href="{{url('dashboard/news/view')}}">List News</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>



            </ul>
        </nav>

        <div class="p-3"></div>
    </div>
</div>
