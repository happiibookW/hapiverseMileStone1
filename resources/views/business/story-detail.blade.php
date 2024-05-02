@php

use App\Models\MstUser;
use App\Models\Business;
@endphp
@if(Auth::user()->userTypeId==1)
    @php $close=url('/dashboard'); @endphp
@else
    @php $close=url('/business-dashboard'); @endphp
@endif
<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-free-5.15.4-web/css/all.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">

    <link rel="stylesheet" href="{{asset('assets/scss/style1.css')}}">
    @if(Auth::user()->userTypeId==1)
        <title>Hapiverse User</title>
    @else
        <title>Hapiverse Business</title>
    @endif





</head>
<style>
#story-text{
    min-height: 76px;
    padding: 20px;
    position: absolute;
    width: 100%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: transparent;
    border: none;
    border: none;
    box-shadow: none;
    text-align: center;
    color: #fff;
    outline: none;
    font-size: 22px;
    resize: none;
}
#storyLabel{
    width: 100%;
    height: 100%;
    min-height: 617px;
    background-size: cover;
    background-position: center center;
    border-radius: 16px;
}
.text-with-bg{
    border-radius: 16px;
    overflow: hidden;
    position: relative;
}
.story-img-with-text{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    color: #fff;
    font-size: 20px;
    text-shadow: 2px 2px 8px #00000047;
}
.slider-main-item video {
    width: 100%;
    height: 100%;
}
</style>

<body>

    <div class="main">

        <div class="main-content">

            <div class="story-content-wrapper">

                <div class="story-sidebar d-none d-lg-block">

                    <div class="sidebar-header d-flex align-items-center">

                        <a href="{{$close}}" class="btn">X</a>

                        <a href="" class="logo"><img src="assets/img/svg/happiverse-logo.svg" alt=""></a>

                    </div>

                    <div class="main-wrapper">

                        <h3 class="main-title">

                            Stories

                        </h3>

                        <ul class="story-side-menu">
                            @foreach($stories as $story)
                            @php
                            if ($story->first()->isBusiness == 1) {
                                $user = Business::where('businessId', $story->first()->userId)->first();
                                $userName = $user->businessName ?? '';
                                $userImage = $user->logoImageUrl;
                                $userPic = env('APPLICATION_URL') . ($user->logoImageUrl ?? '');
                                $userId = $user->businessId;
                            } else {
                                $user = MstUser::where('userId', $story->first()->userId)->first();
                                $userName = $user->userName ?? '';
                                $userImage = $user->profileImageUrl;
                                $userPic = env('APPLICATION_URL') . ($user->profileImageUrl ?? '');
                                $userId = $story->first()->userId;
                            }
                            @endphp
                            <li class="list-item {{($story->first()->userId==$userId_)? 'active' : '' }}">
                                <a class="active" href="{{route('story-detail',$userId ?? '')}}">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="user-img">
                                            @if(\Illuminate\Support\Facades\File::exists(public_path($userImage)))
                                                <img src="{{ env('APPLICATION_URL') . $userImage}}">
                                            @else
                                                <img src="https://hapiverse.com/ci_api/public/{{ $userImage }}">
                                            @endif
                                            <!-- <img src="{{$userPic}}" alt=""> -->

                                        </div>
                                        <div>
                                            <h3 class="title">{{$userName??''}}</h3>
                                            <p class="lead">{{ \Carbon\Carbon::parse($story->first()->posted_date)->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </a>

                            </li>

                            @endforeach



                        </ul>

                    </div>



                </div>

                <div class="story-content-wrapper">



                    <div class="story-content">
                        <div class="stroy-main-slider">
                            @foreach ($userStories as $story)
                            @php $class="";
                                 $text=0;
                            if($story->content_type=='story' && $story->postType=='text'){
                                if($story->text_back_ground=='red' || $story->text_back_ground=='green' || $story->text_back_ground=='blue'){
                                    $class="story-text-with-bg";
                                    $text=1;
                                }
                            }
                            $user=Business::where('businessId',$userId_)->first();
                            if($user){
                                $user=Business::where('businessId',$userId_)->first();
                                $userName=$user->businessName?? '';
                                $userImage = $user->logoImageUrl;
                                $userPic=env('APPLICATION_URL').$user->logoImageUrl;
                            }else{
                                $user=MstUser::where('userId',$userId_)->first();
                                $userName=$user->userName??'';
                                $userImage = $user->profileImageUrl;
                                $userPic=env('APPLICATION_URL').$user->profileImageUrl;
                            }
                            @endphp
                            <div class="slider-main-item {{$class}}">
                                <div class="progress-wrapper">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="user-controls">
                                    <div class="user-info d-flex align-items-center gap-1">
                                    @if(\Illuminate\Support\Facades\File::exists(public_path($userImage)))
                                        <img class="user-pic" src="{{ env('APPLICATION_URL') . $userImage}}">
                                    @else
                                        <img class="user-pic" src="https://hapiverse.com/ci_api/public/{{$userImage}}">
                                    @endif
                                        <!-- <img src="{{$userPic}}" alt="" class="user-pic"> -->

                                        <h3 class="title">{{$userName}}</h3>
                                    </div>
                                    <div class="story-controls">
                                        <button class="btn play-btn">
                                            <img class="pause" src="assets/img/svg/pause.svg" alt="">
                                            <img class="play" src="assets/img/svg/play.svg" alt="">
                                        </button>
                                        <button class="btn mute-btn">
                                            <img class="pause" src="assets/img/svg/mute.svg" alt="">
                                            <img class="play" src="assets/img/svg/unmute.svg" alt="">
                                        </button>
                                    </div>
                                </div>
                            @foreach ($story->postImage as $image)
                            @php

                            $fileType = mime_content_type($image->postFileUrl);

                            $url=env('APPLICATION_URL').$image->postFileUrl;

                            if(\Illuminate\Support\Facades\File::exists(public_path($image->postFileUrl))){
                                $img_url = env('APPLICATION_URL') . $image->postFileUrl;
                            }else{
                                $img_url = 'https://hapiverse.com/ci_api/public/'. $image->postFileUrl;
                            }
                            @endphp
                            @if (strpos($fileType, 'image/') === 0)
                                @if ($text != 1)
                                    <h3 class="story-img-with-text">{{ $story->caption }}</h3>
                                @endif
                                <img class="img" src="{{ $img_url }}" alt="">
                            @elseif (strpos($fileType, 'video/') === 0)
                                @if ($text != 1)
                                    <h3 class="story-img-with-text">{{ $story->caption }}</h3>
                                @endif
                                <video class="lazy" controls autoplay muted preload="none" data-src="{{  $img_url }}">
                                    <source src="{{  $img_url }}" type="{{ $fileType }}">
                                </video>
                            @endif
                                <div class="story-backdrop {{$text}}"></div>

                            @endforeach
                            @if($text==1)
                                <div class="custom-text-area text-with-bg">
                                    <label id="storyLabel" class="label" for="story-text" style="background-color:{{$story->text_back_ground}}"></label>
                                    <textarea disabled rows="1" id="story-text">{{$story->caption}}</textarea>
                                </div>
                                <div class="story-backdrop {{$text}}"></div>
                            @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/slick.min.js')}}"></script>

    <script src="{{asset('assets/js/aos.js')}}"></script>

    <script src="{{asset('assets/js/file-uploader.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/custom-sliders.js')}}"></script>

</body>



</html>
