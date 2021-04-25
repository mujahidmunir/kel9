<div class="row d-none d-lg-flex d-xl-flex d-sm-flex">
    <div class="carousel-item active">
        @if(Request::segment(1) == 'events')
        <img src="{{URL::to('images/banner/event.jpeg')}}" class="d-block w-100" alt="#">
        @else
            <img src="{{URL::to('images/banner/event.jpeg')}}" class="d-block w-100" alt="#">
        @endif
    </div>
</div>
