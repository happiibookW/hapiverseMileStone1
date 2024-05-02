@php
$user=Auth::user() ?? "";
$businessDetail=$user->getBusinessDetail;
$rating=$businessDetail->rating->avg('rating');
$bracket=count($businessDetail->rating);
@endphp
<div class="col-lg-3">
    <div class="card d-none d-lg-block profile-basic-card profile-basic-card">
        <div class="card-body">
            <div class="d-flex justify-content-center">
            @if(\Illuminate\Support\Facades\File::exists(public_path($businessDetail->logoImageUrl)))
                <img src="{{ env('APPLICATION_URL') . $businessDetail->logoImageUrl }}"  alt="" class="card-img">
            @else
                <img src="https://hapiverse.com/ci_api/public/{{ $businessDetail->logoImageUrl }}"  alt="" class="card-img">
            @endif

                <!-- <img src="{{env('APPLICATION_URL').$businessDetail->logoImageUrl}}" alt="" class="card-img"> -->
            </div>
            <h3 class="card-title">{{$businessDetail->businessName}} </h3>
            <p>Owner</p>
            <p class="lead">Business :{{$businessDetail->businessType}}</p>

            <ul class="ratings">

                @if($rating == 0)
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                @elseif($rating == 1 || $rating < 2)
                <li class="list-item active"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                @elseif($rating == 2 || $rating < 3)
                <li class="list-item active"><i class="fas fa-star"></i></li>
                <li class="list-item active"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                <li class="list-item"><i class="fas fa-star"></i></li>
                        @elseif($rating == 3 || $rating < 3) <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item"><i class="fas fa-star"></i></li>
                            <li class="list-item"><i class="fas fa-star"></i></li>

                            @elseif($rating==4 || $rating < 4) <li class="list-item active"><i class="fas fa-star"></i></li>
                                <li class="list-item active"><i class="fas fa-star"></i></li>
                                <li class="list-item active"><i class="fas fa-star"></i></li>
                                <li class="list-item active"><i class="fas fa-star"></i></li>
                                <li class="list-item"><i class="fas fa-star"></i></li>


                                @elseif($rating==5 || $rating < 5) <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item active"><i class="fas fa-star"></i></li>

                                    @endif
                                    &nbsp;&nbsp;({{$bracket}})&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" data-toggle="modal" data-target="#see-rating" class="" data-id="">See all</a>
            </ul>

            <div class="d-flex align-items-center admin-profile">
                <h4 class="card-title">
                </h4>
            </div>
        </div>
        <ul class=" side-menu">
            <li>
                <a class="{{ request()->is('dashboard*') ? 'active' : '' }}"  href="{{route('dashboard')}}" title="Post">
                    <img src="assets/img/svg/home-ico.svg" alt="">
                    Home
                </a>
            </li>
            <li>
                <a class="{{ request()->is('business-profile*') ? 'active' : '' }}" href="{{route('business-profile')}}" title="">
                    <img src="assets/img/svg/profile-ico.svg" alt="">
                    My Profile
                </a>
            </li>
            <!-- <li>
                <a href="{{route('about')}}" title="My Profile">
                    <img src="assets/img/svg/profile-ico.svg" alt="">
                    My Profile
                </a>
            </li> -->
            <li>
                <a class="{{ request()->is('business-friends*') ? 'active' : '' }}" href="{{route('business-friends')}}" title="Friends">
                    <img src="assets/img/svg/friends-ico.svg" alt="">
                    Friends
                </a>
            </li>
            <li>
                <a class="{{ request()->is('business-photos*') ? 'active' : '' }}" href="{{route('business-photos')}}" title="Photos">
                    <img src="assets/img/svg/gallery-ico.svg" alt="">
                    Photos
                </a>
            </li>
            <li>
                <a class="{{ request()->is('business-videos*') ? 'active' : '' }}" href="{{route('business-videos')}}" title="Videos">
                    <img src="assets/img/svg/video-ico.svg" alt="">
                    Videos
                </a>
            </li>
            <li>
                <a class="{{ request()->is('musics*') ? 'active' : '' }}" href="{{route('musics')}}" title="Music">
                    <img src="assets/img/svg/music-ico.svg" alt="">
                    Music
                </a>
            </li>
            <li>
                <a class="{{ request()->is('groups*') ? 'active' : '' }}" href="{{route('groups')}}" title="">
                    <img src="assets/img/svg/group-ico.svg" alt="">
                    Groups
                </a>
            </li>
            <li>
                <a class="{{ request()->is('orders*') ? 'active' : '' }}" href="{{route('orders')}}" title="">
                    <img src="assets/img/svg/order-ico.svg" alt="">
                    Orders
                </a>
            </li>

            <li>
                <a class="{{ request()->is('business-events*') ? 'active' : '' }}" href="{{route('business-events')}}" title="">
                    <img src="assets/img/svg/events-ico.svg" alt="">
                    Events
                </a>
            </li>

            <li>
                <a class="{{ request()->is('business-products*') ? 'active' : '' }}" href="{{route('business-products')}}" title="">
                    <img src="assets/img/svg/products-ico.svg" alt="">
                    Products
                </a>
            </li>
            <li>
                <a class="{{ request()->is('places*') ? 'active' : '' }}" href="{{url('places')}}" title="">
                    <img src="assets/img/svg/places-ico.svg" alt="">
                    Places
                </a>
            </li>
            <li>
                <a class="{{ request()->is('calendar*') ? 'active' : '' }}" href="{{url('calendar')}}" title="">
                    <img src="assets/img/svg/places-ico.svg" alt="">
                    Calendar
                </a>
            </li>
            <li>
                <a class="{{ request()->is('bulletinBoard*') ? 'active' : '' }}" href="{{url('bulletinBoard')}}" title="">
                    <img src="assets/img/svg/places-ico.svg" alt="">
                    Bulletin Board
                </a>
            </li>
            <li>
                <a class="{{ request()->is('job*') ? 'active' : '' }}" href="{{url('job')}}" title="">
                    <img src="assets/img/svg/places-ico.svg" alt="">
                    Add Jobs
                </a>
            </li>
            <li>
                <a class="{{ request()->is('translate*') ? 'active' : '' }}" href="{{url('translate')}}" title="">
                    <img src="assets/img/svg/places-ico.svg" alt="">
                    Translator
                </a>
            </li>
            <li>
                <a class="{{ request()->is('chatgpt*') ? 'active' : '' }}" href="{{url('chatgpt')}}" title="">
                    <img src="assets/img/svg/translator.svg" alt="">
                    Hapi AI Chat
                </a>
            </li>
            <li>
                <a class="{{ request()->is('logout.perform*') ? 'active' : '' }}" href="{{route('logout.perform')}}" title="">
                    <img src="assets/img/svg/logout-ico.svg" alt="">
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body pb-2">
            <div class="card-title">Tools</div>
        </div>
        <ul class="side-menu">
            <li>
                <button type="button" data-bs-toggle="modal" data-bs-target="#add-product">
                    <img src="assets/img/svg/add-product.svg" alt="">
                    Add Product
                </button>
            </li>
            <li>
                <button type="button" data-bs-toggle="modal" data-bs-target="#add-event">
                    <img src="assets/img/svg/add-event.svg" alt="">
                    Add Event
                </button>
            </li>
            <li>
                <button type="button" data-bs-toggle="modal" data-bs-target="#sponsoring-acc">
                    <img src="assets/img/svg/sponsor-ico.svg" alt="">
                    Sponsoring Account
                </button>
            </li>
        </ul>
    </div>
</div>
