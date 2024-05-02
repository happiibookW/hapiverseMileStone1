

<style>
img.card-img {
    max-height: 150px;
    height: 100%;
    object-fit: cover;
}

.chooseImg {
    position: relative;
    top: -30px;
    right: 0;
    background-color: #fff;
    z-index: 100;
}
.file {
    position: relative;
    display: flex;
    justify-content: end;
    align-items: center;
    top: -60px;
    right: 12px;
    border-radius: 50px !important;
}

.file > input[type='file'] {
  display: none
}

.file > label {
  font-size: 1rem;
  font-weight: 300;
  cursor: pointer;
  outline: 0;
  user-select: none;
  border-color: rgb(216, 216, 216) rgb(209, 209, 209) rgb(186, 186, 186);
  border-style: solid;
  border-radius: 50px;
  border-width: 0px;
  background-color: hsl(0, 0%, 100%);
  color: hsl(0, 0%, 29%);
  padding-left: 16px;
  padding-right: 16px;
  padding-top: 16px;
  padding-bottom: 16px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.file > label:hover {
  border-color: hsl(0, 0%, 21%);
}

.file > label:active {
  background-color: hsl(0, 0%, 96%);
}
.blockWrap label {
    display: block;
    font-size: 13px;
}
.blockWrap input {
    display: block;
    width: 100%;
    margin-bottom: 14px;
    font-size: 12px;
    padding: 6px 10px;
    border: 1px solid #e3e3e3;
    border-radius: 6px;
    height: 38px;
}
.form-group textarea {
    display: block;
    width: 100%;
    margin-bottom: 14px;
    font-size: 12px;
    padding: 6px 10px;
    border: 1px solid #e3e3e3;
    border-radius: 6px;
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

@php
$user=Auth::user();
$userDetail=$user->getUserDetail ?? '';
$images=$userDetail->postImages;
$userIntrest=$user->getUserDetail->userIntrests ?? '';
$profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";


@endphp
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif
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


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="post-tab-pane" role="tabpanel" aria-labelledby="post-tab" tabindex="0">
                            @include('auth.partials.messages')
                            <div class="card create-post-wrapper">
                                <form method="post" action="{{ route('group.update',$groupId) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="form-group">
                                        <label class="control-label" for="input">Group Image</label><i class="mtrl-select"></i>

                                        @if(\Illuminate\Support\Facades\File::exists(public_path($group->groupImageUrl)))
                                            <img class="card-img" src="{{ env('APPLICATION_URL') . $group->groupImageUrl}}">
                                        @else
                                            <img class="card-img" src="https://hapiverse.com/ci_api/public/{{ $group->groupImageUrl }}">
                                        @endif
                                        <div class='file'>
                                            <label for='input-file'>
                                            <i class="fas fa-camera"></i>
                                            </label>
                                            <input id='input-file' class="chooseImg" type='file' />
                                        </div>
                                        <!-- <input type="file" class="chooseImg" id="input" name="groupImageUrl"/> -->

                                    </div>
                                    <div class="form-group blockWrap">
                                        <label class="control-label" for="input">Group Name</label><i class="mtrl-select"></i>
                                        <input type="hidden" name="groupId" value="{{$groupId}}" />
                                        <input type="text" id="input" name="groupName" value="{{$group->groupName}}" />

                                    </div>

                                    <div class="form-group">
                                        <textarea rows="4" id="textarea" required="required" name="groupDescription">{{$group->groupDescription}}</textarea>
                                        <i class="mtrl-select"></i>
                                    </div>
                                    <div class="submit-btns">
                                        <a href="{{route('dashboard')}}" class="mtr-btn"><span>Cancel</span></a>
                                        <button type="submit" class="mtr-btn"><span>Update</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Results -->
                </div>

                    </div>

                </div><!-- centerl meta -->



            </div>

        </div>

    </section>

</div>




  @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.footer')
                @else
                    @include('business.layouts.footer')
                    @endif
