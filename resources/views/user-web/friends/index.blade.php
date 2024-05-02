@php

$user=Auth::user() ?? "";

$userDetail=$user->getUserDetail??"";

@endphp

@include('user-web.layouts.head')

@include('user-web.layouts.header')



<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">

                @include('user-web.layouts.sidebar')

                <div class="col-lg-9">

                    <div class="card friends-card">

                        <div class="card-body">

                            <h3 class="card-title">{{__('msg.friends')}}</h3>
                                <div class="row">
                                @foreach($friendDetail as $friend)
                                @foreach($friend as $friend)

                                @php
                                $table=$friend->getTable();

                                array_push($friendNames,$friend->userName );
                                @endphp
                                    <div class="col-lg-3">
                                        <a href="">
                                            <div class="card friend-card border border-radius-10">
                                                @if($friend->getTable() =='mstuser')
                                                @php
                                                $friendImage=$friend->profileImageUrl ?? '';
                                                $url=env('APPLICATION_URL').$friendImage;
                                                @endphp
                                                @if(\Illuminate\Support\Facades\File::exists(public_path($friendImage)))
                                                    <img class="card-img" src="{{ env('APPLICATION_URL') . $friendImage }}">
                                                @else
                                                    <img class="card-img" src="https://hapiverse.com/ci_api/public/{{ $friendImage }}">
                                                @endif
                                                <!-- <img src="{{$url}}" alt="" class="card-img"> -->


                                                @elseif($friend->getTable() =='mstbusiness')
                                                @php
                                                $busienssImage=$friend->logoImageUrl ?? '';
                                                $urlBusiness=env('APPLICATION_URL').$busienssImage;
                                                @endphp
                                                <img src="{{$urlBusiness}}" alt="" class="card-img">
                                                @endif
                                                <div class="card-body p-2">
                                                    @if($friend->getTable() =='mstuser')
                                                    @php
                                                    @endphp

                                                    <h3 class="card-title">{{$friend->userName ?? ''}}</h3>
                                                    <p class="card-text">{{$friend->address}}, {{$friend->country}}</p>
                                                    <div class="d-flex flex-column gap-2">
                                                        <a href="{{url('friendProfile/'.$friend->userId)}}"class="btn btn-primary btn-small">View Profile</a>
                                                        <a href="{{url('unfriend/'.$friend->userId ?? '')}}" class="btn btn-light btn-small">Unfriend</a>
                                                    @elseif($friend->getTable() =='mstbusiness')
                                                    @php
                                                    @endphp
                                                    <h3 class="card-title">{{$friend->businessName ?? ''}} (Business)</h3>
                                                    <p class="card-text">{{$friend->UserCity->city}}, {{$friend->userCountry->country}}</p>
                                                    <div class="d-flex flex-column gap-2">
                                                        <a href="{{url('view-profile/'.$friend->businessId.'/business')}}"class="btn btn-primary btn-small">View Profile</a>
                                                        <a href="{{url('unfriend/'.$friend->businessId ?? '')}}" class="btn btn-light btn-small">Unfriend</a>
                                                    @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                @endforeach
                                </div>

                        </div>

                    </div>
                    <div class="card friends-card">

                        <div class="card-body">
                            <h3 class="card-title">Friends Suggestions</h3>
                            <div class="row">
                            @foreach($users as $user)
                            @php

                            if($user->userName == $loggedIn->userName){
                            continue;
                            }
                            if (in_array($user->userName, $friendNames))
                              {
                              continue;
                              }

                            @endphp
                                    <div class="col-lg-3">
                                        <a href="">
                                            <div class="card friend-card border border-radius-10">
                                                @if(\Illuminate\Support\Facades\File::exists(public_path($user->profileImageUrl)))
                                                    <img class="card-img" src="{{ env('APPLICATION_URL') . $user->profileImageUrl }}">
                                                @else
                                                    <img class="card-img" src="https://hapiverse.com/ci_api/public/{{ $user->profileImageUrl }}">
                                                @endif
                                                <!-- <img src="{{env('APPLICATION_URL').$user->profileImageUrl}}" alt="" class="card-img"> -->
                                                <div class="card-body p-2">
                                                    <h3 class="card-title">{{$user->userName}}</h3>
                                                    <p class="card-text">{{$user->address}}, {{$user->country}}</p>
                                                    <div class="d-flex flex-column gap-2">
                                                        <a href="{{route('addfriend',[$user->userId])}}"class="btn btn-primary btn-small">Add Friend</a>
                                                        <a href="#" class="btn btn-light btn-small">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-3 d-none">
                <div class="card">
                      <div class="card-body">
                          <h3 class="card-title">Business Suggestions</h3>
                        <ul class="friends-list">
                                        @foreach($businesses as $business)
                                        @php

                                        if($business->businessName == $loggedIn->userName){
                                        continue;
                                        }
                                        if (in_array($business->businessName, $friendNames))
                                          {
                                          continue;
                                          }

                                        @endphp
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">

                                                    <img class="user-img" src="{{env('APPLICATION_URL').$business->logoImageUrl}}">

                                                    <div>
                                                        <h3 class="title">{{$business->businessName}}</h3>

                                                    </div>
                                                    <a href= "{{route('addfriend',[$business->businessId])}}" class="btn btn-primary btn-small">
                                                        <i class="fas fa-user-plus"></i>
                                                    </a>

                                                </a>
                                            </div>
                                        </li>
                                     @endforeach

                                    </ul>
                      </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

</div>



@include('user-web.layouts.footer')
