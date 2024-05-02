@php

$userDetail=\Auth::user() ?? "";

$user=$userDetail->getUserDetail ?? '';

$profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";
$profileUrl=env('APPLICATION_URL').$profileImage;
@endphp

<div class="col-lg-3">

    <div class="card d-none d-lg-block profile-basic-card">

        <div class="card-body">

            <div class="d-flex justify-content-center">

            @if(\Illuminate\Support\Facades\File::exists(public_path($profileImage)))
                <img src="{{ env('APPLICATION_URL') . $profileImage }}"  alt="" class="card-img">
            @else
                <img src="https://hapiverse.com/ci_api/public/{{ $profileImage }}"  alt="" class="card-img">
            @endif
                <!-- <img src="{{$profileUrl}}" alt="" class="card-img"> -->

            </div>


            <h3 class="card-title">{{GoogleTranslate::trans($user->userName ?? "")}}</h3>

            <p class="lead">User</p>



            <div class="d-flex align-items-center admin-profile">

                <h4 class="card-title">

                </h4>

            </div>

        </div>

        <ul class=" side-menu">

            <li>

                <a class="{{ request()->is('dashboard*') ? 'active' : '' }}" href="{{route('dashboard')}}" title="Post">

                    <img src="assets/img/svg/home-ico-dark.svg" alt="">

                    {{__('msg.home')}}

                </a>

            </li>
            <li>

                <a class="{{ request()->is('my-profile*') ? 'active' : '' }}" href="{{route('my-profile')}}" title="">

                    <img src="assets/img/svg/profile-ico.svg" alt="">

                    {{__('msg.my_profile')}}

                </a>

            </li>
            <!-- <li>

                <a href="{{route('about')}}" title="My Profile">

                    <img src="assets/img/svg/profile-ico.svg" alt="">

                    My Profile

                </a>

            </li> -->

            <li>

                <a class="{{ request()->is('friends*') ? 'active' : '' }}" href="{{route('friends')}}" title="Friends">

                    <img src="assets/img/svg/friends-ico.svg" alt="">

                    {{__('msg.friends')}}

                </a>

            </li>

            <li>

                <a class="{{ request()->is('photos*') ? 'active' : '' }}" href="{{route('photos')}}" title="Photos">

                    <img src="assets/img/svg/gallery-ico.svg" alt="">

                    {{__('msg.photos')}}

                </a>

            </li>

            <li>

                <a class="{{ request()->is('videos*') ? 'active' : '' }}" href="{{route('videos')}}" title="Videos">

                    <img src="assets/img/svg/video-ico.svg" alt="">

                    {{__('msg.videos')}}

                </a>

            </li>

            <li>

                <a class="{{ request()->is('musics*') ? 'active' : '' }}" href="{{route('musics')}}" title="Music">

                    <img src="assets/img/svg/music-ico.svg" alt="">

                    {{__('msg.music')}}

                </a>

            </li>

            <li>

                <a class="{{ request()->is('groups*') ? 'active' : '' }}" href="{{route('groups')}}" title="">

                    <img src="assets/img/svg/group-ico.svg" alt="">

                    {{__('msg.groups')}}

                </a>

            </li>

            <li>

                <a class="{{ request()->is('orders*') ? 'active' : '' }}" href="{{route('orders')}}" title="">

                    <img src="assets/img/svg/order-ico.svg" alt="">

                    {{__('msg.orders')}}

                </a>

            </li>

            <li>
                <a class="{{ request()->is('business-events*') ? 'active' : '' }}" href="{{route('business-events')}}" title="">
                    <img src="assets/img/svg/events-ico.svg" alt="">
                    {{__('msg.events')}}
                </a>
            </li>

            <li>

                <a class="{{ request()->is('movies*') ? 'active' : '' }}" href="{{route('movies.index')}}" title="">

                    <img src="assets/img/svg/movies-ico.svg" alt="">

                    {{__('msg.movies')}}

                </a>

            </li>

            <li>

                <a class="{{ request()->is('places*') ? 'active' : '' }}" href="{{url('places')}}" title="">

                    <img src="assets/img/svg/places-ico.svg" alt="">

                    {{__('msg.places')}}

                </a>

            </li>

             <li>

                <a class="{{ request()->is('HapiMart*') ? 'active' : '' }}" href="{{url('HapiMart')}}" title="">

                    <img src="assets/img/svg/market-ico.svg" alt="">

                    Hapimart

                </a>

            </li>
            <li>
                <a class="{{ request()->is('calendar*') ? 'active' : '' }}" href="{{url('calendar')}}" title="">
                    <img src="assets/img/svg/calendar.svg" alt="">
                    {{__('msg.calender')}}
                </a>
            </li>
            <li>
                <a class="{{ request()->is('bulletinBoard*') ? 'active' : '' }}" href="{{url('bulletinBoard')}}" title="">
                    <img src="assets/img/svg/bulletin-board.svg" alt="">
                    {{__('msg.bulletin_board')}}
                </a>
            </li>

            <li>
                <a class="{{ request()->is('jobView*') ? 'active' : '' }}" href="{{url('jobView')}}" title="">
                    <img src="assets/img/svg/jobs.svg" alt="">
                    {{__('msg.jobs')}}
                </a>
            </li>
            <li>
                <a class="{{ request()->is('translate*') ? 'active' : '' }}" href="{{url('translate')}}" title="">
                    <img src="assets/img/svg/translator.svg" alt="">
                    {{__('msg.translator')}}
                </a>
            </li>
            <li>
                <a class="{{ request()->is('locationTracking*') ? 'active' : '' }}" href="{{url('locationTracking')}}" title="">
                    <img src="assets/img/svg/translator.svg" alt="">
                    Location Tracking
                </a>
            </li>

            <li>
                <a class="{{ request()->is('locationSharing*') ? 'active' : '' }}" href="{{url('locationSharing')}}" title="">
                    <img src="assets/img/svg/translator.svg" alt="">
                    Location Sharing
                </a>
            </li>

            <li>
                <a class="{{ request()->is('rewardCenter*') ? 'active' : '' }}" href="{{url('rewardCenter')}}" title="">
                    <img src="assets/img/svg/translator.svg" alt="">
                    Reward Center
                </a>
            </li>
            <!-- <li>-->
            <!--    <a href="{{url('chatgpt')}}" title="">-->
            <!--        <img src="assets/img/svg/translator.svg" alt="">-->
            <!--        Hapi AI Chat-->
            <!--    </a>-->
            <!--</li>-->
            <li>

                <a class="{{ request()->is('logout*') ? 'active' : '' }}" href="{{route('logout.perform')}}" title="">

                    <img src="assets/img/svg/logout-ico.svg" alt="">

                    {{__('msg.logout')}}

                </a>

            </li>

        </ul>

    </div>





</div>
