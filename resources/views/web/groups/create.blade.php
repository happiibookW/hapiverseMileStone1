<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
.form-control {
    display: block;
    border: none;
    border-radius: 5px!important;
    background-color: #ffffff!important;
    padding: 10px 18px;
    font-size: 12px;
    box-shadow: none;
    border: 1px solid #d5d5d5 !important;
    height: 38px;
    margin-bottom: 12px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: 1px solid #d5d5d5 !important;
    outline: 0;
    border-radius: 5px!important;
    background-color: #ffffff!important;
}
.input-wrapper {
    margin-bottom: 12px!important;
}
label.control-label {
    font-size: 13px;
}
.input-wrapper .uploadfeild {
    margin-left: 10px;
    border: 1px dotted #d5d5d5;
    padding: 10px;
    width: calc(100% - 88px);
    border-radius: 5px;
}
.submit-btns {
    display: flex;
    gap: 20px;
    align-items: center;
}
a.mtr-btn {
    background-color: #caaf66;
    padding: 6px 20px;
    border-radius: 5px;
    color: #fff;
    font-size: 13px;
}
button.mtr-btn {
    background-color: #caaf66;
    padding: 6px 20px;
    border-radius: 5px;
    color: #fff;
    font-size: 13px;
    border: 0px;
}
a.mtr-btn:hover {
    background-color: #0e0a75;
    color: #fff;
}
button.mtr-btn:hover {
    background-color: #0e0a75;
    color: #fff;
}
</style>

@if(Auth::user()->userTypeId==1)
@include('user-web.layouts.head')

@include('user-web.layouts.header')
@else
@include('business.layouts.head')
@include('business.layouts.header')
@endif

@php
if(Auth::user()->userTypeId==1){

    $user=Auth::user();
    $userDetail=$user->getUserDetail ?? '';
    $images=$userDetail->postImages;
    $userIntrest=$user->getUserDetail->userIntrests ?? '';
    $profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";
}
else{


    $userDetail=Auth::user()->getBusinessDetail ?? '';
    $images=$userDetail->postImages ?? '';
    $userIntrest=$user->getBuinessDetail->userIntrests ?? '';
    $profileImage=$userDetail->getBuinessDetail->profileImageUrl ?? "";
}



@endphp
<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif


                <div class="col-lg-6">



                    <div class="card">

                        <div class="card-body">

                            <h3 class="card-title">Create Group</h3>
                            <form method="post" action="{{ route('group.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Group Name</label><i class="mtrl-select"></i>
                                    <input class="form-control" type="text" id="input" name="groupName" value="" />

                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Group Members</label><i class="mtrl-select"></i>
                                    <select name="groupMemberId[]" multiple class="form-control js-example-basic-multiple">
                                        @foreach($users as $member)
                                        <option value="{{$member->userId}}">{{$member->userName}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
                                    <textarea class="form-control" rows="4" id="textarea" required="required" name="groupDescription"></textarea>

                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Group Privacy</label><i class="mtrl-select"></i>
                                    <select name="groupPrivacy" class="form-control">
                                        <option value="Private">Private</option>
                                        <option value="Public">Public</option>
                                    </select>

                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Cover Photo</label><i class="mtrl-select"></i>
                                    <input type="file" class="uploadfeild" id="input" name="groupImageUrl" />

                                </div>

                                <div class="submit-btns">
                                    <a href="{{route('dashboard')}}" class="mtr-btn"><span>Cancel</span></a>
                                    <button type="submit" class="mtr-btn"><span>Save</span></button>
                                </div>
                            </form>
                            <div class="row photos-gallery">




                            </div>

                        </div>

                    </div>





                </div>



            </div>

        </div>

    </section>

</div>
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.footer')
@else
    @include('business.layouts.footer')
@endif

