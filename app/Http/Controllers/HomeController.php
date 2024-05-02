<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Covid;
use App\Models\Friend;
use App\Models\Post;
use App\Models\PostImages;
use App\Models\Album;
use App\Models\AlbumImage;
use App\Models\BackgoundImages;
use App\Models\Group;
use App\Models\GroupInvites;
use App\Models\MstAuthorization;
use App\Models\MstUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Education;
use App\Models\Occupation;
use App\Models\Order;
use App\Models\Event;
use App\Models\BusinessProduct;
use App\Models\Notifications;
use App\Models\Chats;
use App\Models\Intrest;
use App\Models\OccupationType;
use App\Models\SavePost;
use App\Models\UserInterest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{



    public function index()
    {
        return view('auth.login');
    }

    public  function dashboard()
    {

        return view('home.index');
    }

    public function about()
    {
        return view('users.about');
    }



    public function getPost(Request $request)
    {

        try {
            $stories = Post::where('content_type', 'story')->get()->groupBy('userId');
            $loggedIn = Auth::user()->getUserDetail->userId;


            $results = Post::orderBy('postId', 'DESC')->where('content_type', 'feeds')->paginate(5);
            $getSavedPosts = SavePost::where('userId',$loggedIn)->get();
            $artilces = '';
            // $url = 'env('APPLICATION_URL')public/';
            $url = '/';

            if ($request->ajax()) {
                $i = 0;
                foreach ($results as $result) {

                    $userId = $result->user->userId ?? "";
                    $artilces .= '
                    <div class="card post-card">
                    <div class="card-header">
                    <div class="info-wrapper">
                    <div class="d-flex align-items-center gap-2">

                    <img src="';

                    $profileImageUrl = isset($result->user) ? $result->user->profileImageUrl : $result->business->logoImageUrl;

                    if (\Illuminate\Support\Facades\File::exists(public_path($profileImageUrl))) {
                        $artilces .= env('APPLICATION_URL') . $profileImageUrl;
                    } else {
                        $artilces .= 'https://hapiverse.com/ci_api/public/' . $profileImageUrl;
                    }
                    // $artilces .= $result->user ?  $url . $result->user->profileImageUrl : $url . $result->business->logoImageUrl;
                    $artilces .= '" alt="" class="profile-pic">
                    <div>
                    <a href="';
                    $artilces .= url('friendProfile/' . $userId);
                    $artilces .= '"><h3 class="title"> ';
                    $artilces .= $result->user->userName ?? $result->business->businessName??'';


                    $artilces .= '</h3></a>
                    <p class="timeline">';
                    $artilces .=   \Carbon\Carbon::parse($result->posted_date)->diffForhumans();

                    $artilces .= '<span class="ms-1"><i class="fas fa-globe-americas"></i></span></p>
                    </div>
                    </div>
                    <div class="btn-group">
                    <a href="" class="more-option" data-bs-toggle="dropdown" aria-expanded="false"><img alt="" src="';
                    $artilces .= asset('libraries/images/svg/more-light.svg');

                    $artilces .= '"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="' . url("/post/Delete/" . $result->postId) . '" class="dropdown-item" type="button">Delete</a></li>
                  </ul>
                  </div>
                    </div>
                    <p class="post-text">';
                    $artilces .=  $result->caption ?? '';

                    $artilces .= '</p>
                    </div>
                    <div id="postModel" class="card-body" data-bs-toggle="modal"
                    data-bs-target="#post';
                    $artilces .= $result->postId;
                    $artilces .='"data-url="' . env('APPLICATION_URL') . 'public/postModal/';
                        $artilces .=  $result->postId;
                        $artilces .= '" style = "border:none">';


                    $artilces .= '<div class="post-slider">';
                    if(!empty($result-> text_back_ground)){
                    $artilces .= '<div>';
                    $artilces .= ' <div style = " width : 100%; height:100%; min-height: 500px; background-size:cover; background-image: url(';

                            $artilces .= $result->text_back_ground;
                            $artilces .=   ' ) "class ="card-img"><div style = "color:white;position: absolute; top: 50%;
        left: 50%; transform: translate(-50%, -50%); text-align: center; font-size: 22px;">';
                          $artilces .= $result->caption;
                        $artilces .= '</div></div>';
                         $artilces .= '</div>';

                    }

                    foreach ($result->postImage as $image) {
                        $artilces .= '<div>';
                        $background_image = $image -> background_images;



                        $fileName = $image->postFileUrl;
                        $fileNameParts = explode('.', $fileName);
                        $ext = end($fileNameParts);
                        if ($ext == "jpg" || $ext == "png" || $ext == "webp" || $ext == "jpeg") {
                            $artilces .= ' <div class="position-relative">';
                            // <img src="';
                            // $artilces .= env('APPLICATION_URL') . $image->postFileUrl;
                            // $artilces .= '" class="card-img">
                            $artilces .= '<img src="';

                            if (\Illuminate\Support\Facades\File::exists(public_path($image->postFileUrl))) {
                                $artilces .= env('APPLICATION_URL') . $image->postFileUrl;
                            } else {
                                $artilces .= 'https://hapiverse.com/ci_api/public/' . $image->postFileUrl;
                            }

                            $artilces .= '" class="card-img">
                            <div class="tags">
                                <div class="tag">
                                    <a href="#tagUsers" data-bs-toggle="modal">
                                        Will Proyer
                                    </a>
                                </div>
                            </div>
                        </div>';
                        }
                        if ($ext == "mp4" || $ext == "MOV") {
                            $artilces .= ' <div>';
                            // <video src="';
                            // $artilces .= '/' . $image->postFileUrl;
                            // $artilces .= '" class="card-img" controls> </video>
                            $artilces .= '<video src="';

                            if (\Illuminate\Support\Facades\File::exists(public_path($image->postFileUrl))) {
                                $artilces .= env('APPLICATION_URL') . $image->postFileUrl;
                            } else {
                                $artilces .= 'https://hapiverse.com/ci_api/public/' . $image->postFileUrl;
                            }

                            $artilces .= '" class="card-img" controls></video>
                        </div>';
                        }
                        $artilces .= '</div>';



                    }

                    $artilces .= '
                </div>
            </div>
            <div class="card-footer">
                <div class="action-center">
                    <ul class="icons-wrapper">
                        <li class="list-item">';


                    $artilces .= '<button  id="likedBtn"  onclick"" value="';
                    $artilces .=  $result->postId;
                    $artilces .= '"';
                    $class = false;
                    foreach($result->postlikes as $likedUsers){
                            $likedUser = $likedUsers -> userId ;
                            if ($likedUser == $loggedIn) {
                                $artilces .= 'class="heart active"';
                                $class = true;
                            }

                    }
                    if(!$class){
                        $artilces .= 'class="heart"';
                    }

                    // $likedUser = $result->postlike->userId ??  "";
                    // $artilces .= '" href="';
                    // $artilces .= url('like/' . $result->postId);
                    $artilces .= '">';

                    $artilces .= '<svg xmlns="http://www.w3.org/2000/svg" width="19.673" height="17.215" viewBox="0 0 19.673 17.215">
                                    <g id="heart-light" transform="translate(0.001 -2)">
                                        <path stroke="#1c2233" id="heartPath" data-name="Path 146" d="M9.4,19.031a.614.614,0,0,0,.875,0l7.865-7.969A5.328,5.328,0,0,0,14.424,2c-2.8,0-4.086,2.058-4.587,2.443C9.334,4.057,8.056,2,5.25,2a5.326,5.326,0,0,0-3.714,9.062Z" transform="translate(0 0)" fill="transparent" />
                                    </g>
                                </svg>
                            </button>

                        </li>
                        <li class="list-item">
                            <button id = "commentDisplay" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#commentModal" aria-expanded="true" data-id="'.$result->postId.'" aria-controls="commentAccordHead"  data-url="' . env('APPLICATION_URL') . 'public/dynamicModal/';
                        $artilces .=  $result->postId;
                        $artilces .= '"   >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.906" height="17.215" viewBox="0 0 20.906 17.215">
                                    <g id="comment-light" transform="translate(0 -0.5)">
                                        <path id="Path_147" data-name="Path 147" d="M16.619.5H4.287A4.292,4.292,0,0,0,0,4.787v6.622a4.218,4.218,0,0,0,3.033,4.055L5.1,17.535a.612.612,0,0,0,.866,0l1.9-1.9h8.749a4.292,4.292,0,0,0,4.287-4.287V4.787A4.292,4.292,0,0,0,16.619.5Zm3.062,10.848a3.066,3.066,0,0,1-3.062,3.062h-9a.613.613,0,0,0-.433.179L5.537,16.236,3.784,14.483a.612.612,0,0,0-.285-.161,3,3,0,0,1-2.274-2.913V4.787A3.066,3.066,0,0,1,4.287,1.725H16.619a3.066,3.066,0,0,1,3.062,3.062Zm0,0" fill="#1c2233" />
                                        <path id="Path_148" data-name="Path 148" d="M154.148,144.328H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0" transform="translate(-139.806 -137.955)" fill="#1c2233" />
                                        <path id="Path_149" data-name="Path 149" d="M154.148,197.352H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0" transform="translate(-139.806 -188.814)" fill="#1c2233" />
                                    </g>
                                </svg>
                            </button>
                        </li>

                        <li class="list-item" >
                            <button class="share-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512.00102" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g>
                                        <path d="m361.824219 344.394531c-24.53125 0-46.632813 10.59375-61.972657 27.445313l-137.972656-85.453125c3.683594-9.429688 5.726563-19.671875 5.726563-30.386719 0-10.71875-2.042969-20.960938-5.726563-30.386719l137.972656-85.457031c15.339844 16.851562 37.441407 27.449219 61.972657 27.449219 46.210937 0 83.804687-37.59375 83.804687-83.804688 0-46.210937-37.59375-83.800781-83.804687-83.800781-46.210938 0-83.804688 37.59375-83.804688 83.804688 0 10.714843 2.046875 20.957031 5.726563 30.386718l-137.96875 85.453125c-15.339844-16.851562-37.441406-27.449219-61.972656-27.449219-46.210938 0-83.804688 37.597657-83.804688 83.804688 0 46.210938 37.59375 83.804688 83.804688 83.804688 24.53125 0 46.632812-10.59375 61.972656-27.449219l137.96875 85.453125c-3.679688 9.429687-5.726563 19.671875-5.726563 30.390625 0 46.207031 37.59375 83.800781 83.804688 83.800781 46.210937 0 83.804687-37.59375 83.804687-83.800781 0-46.210938-37.59375-83.804688-83.804687-83.804688zm-53.246094-260.589843c0-29.359376 23.886719-53.246094 53.246094-53.246094s53.246093 23.886718 53.246093 53.246094c0 29.359374-23.886718 53.246093-53.246093 53.246093s-53.246094-23.886719-53.246094-53.246093zm-224.773437 225.441406c-29.363282 0-53.25-23.886719-53.25-53.246094s23.886718-53.246094 53.25-53.246094c29.359374 0 53.242187 23.886719 53.242187 53.246094s-23.882813 53.246094-53.242187 53.246094zm224.773437 118.949218c0-29.359374 23.886719-53.246093 53.246094-53.246093s53.246093 23.886719 53.246093 53.246093c0 29.359376-23.886718 53.246094-53.246093 53.246094s-53.246094-23.886718-53.246094-53.246094zm0 0" fill="#1c2233" data-original="#1c2233" class=""></path>
                                    </g>
                                </svg>
                            </button>
                        </li>
                    </ul>
                    <div id="dynamic-content"></div>';
                    $class = '';
                    $data_action = 'save';

                    if (isset($getSavedPosts[$i]) && $getSavedPosts[$i]->postId == $result->postId) {
                        $class = 'active';
                        $data_action = 'unsave';
                    }
                    $artilces .= '<a class="save-post-btn '.$class.'" data-action="'.$data_action.'" data-id="'.$result->postId.'">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 25 25" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <g id="Layer_21" data-name="Layer 21">
                                    <path d="M18.21,2H6.79A2.83,2.83,0,0,0,4,4.86V21.2a1.67,1.67,0,0,0,1,1.54,1.57,1.57,0,0,0,1.74-.27l5.35-4.74a.69.69,0,0,1,.86,0l5.35,4.74a1.59,1.59,0,0,0,1.74.27,1.67,1.67,0,0,0,1-1.54V4.86A2.83,2.83,0,0,0,18.21,2ZM20,21.2a.67.67,0,0,1-.39.63.61.61,0,0,1-.67-.1L13.59,17a1.69,1.69,0,0,0-2.18,0L6.06,21.73a.61.61,0,0,1-.67.1A.67.67,0,0,1,5,21.2V4.86A1.83,1.83,0,0,1,6.79,3H18.21A1.83,1.83,0,0,1,20,4.86Z" fill="#000000" data-original="#000000"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>

                    <div class="likes-wrapper">
                    <ul class="likes-list">
                    <div id =check';
                    $artilces .= $result->postId;
                    $artilces .= '></div></ul><p class="likes-status"><b>';
                    $artilces .=  "";
                    $artilces .= '</b><b class="count_likes" data-id="'.$result->postId.'" id=counts';
                    $artilces .= $result->postId;
                    $artilces .= '>';
                    $likesCount = count($result->postLikes);
                    $artilces .= ($likesCount > 1) ? number_format($likesCount) . " likes" :
                                 (($likesCount === 1) ? number_format($likesCount) . " like" :
                                 "");

                    $artilces .= '</b></p>';

                    $artilces .=  '
                </div>

              <div class="comments-wrapper">
                    <div class="comment-item">';
                            // Render parent comment
                        $artilces .= $this->renderComments($result->comment);
                        $artilces .= '<div class="comment sub-comment d-none">
                            <div class="d-flex gap-2">
                                <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                                <div class="w-100">
                                    <div class="text-wrapper">
                                        <p class="comment-text"><span class="user-title">Becca John</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quasi?</p>
                                    </div>
                                    <a class="comment-control" href="">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="commentAccordion" >
                    <div class="accordion-body">
                       <form method="post" onsubmit="return post();" action=" add-comment/';
                    $artilces .= $result->postId;
                    $artilces .= ' "><input type="hidden" name="_token" value="';
                    $artilces .= csrf_token();
                    $artilces .= '"><div class="d-flex align-items-center gap-2">
                    <input name="userId"  type="hidden" value="';
                    $artilces .= $loggedIn;
                    $artilces .=  '"><input name="postId"  type="hidden" value="';
                    $artilces .= $result->postId;
                    $artilces .=  '">
                    <input id="comment" class="form-control" placeholder="Add Comment Here" name="comment">
                            <button type="submit" style="border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g id="share.light" transform="translate(-0.013)">
                                        <path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#1c2233" />
                                    </g>
                                </svg>
                            </button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="comments-wrapper">';

                    $artilces .= '</div><div class="custom-share-box">
                    <div class="card">
                        <div class="card-body">
                            <ul class="sharing-links">
                                <li class="list-item share-in-timeline" data-id="'.$result->postId.'"><i class="far fa-window-restore me-1"></i>Share in
                                        Timeline</li>
                                <li class="list-item"><a href=""><i class="fab fa-facebook-messenger me-1"></i>Share in
                                        messenger</a></li>
                                <li class="list-item"><a href=""><i class="fas fa-users me-1"></i>Share in group</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        $i++;
                }
                return $artilces;
            }

            $loggedIn = Auth::user()->getUserDetail;
            $covid = Covid::where('userId', $loggedIn->userId)->first();
            return view('user-web.home', compact('stories', 'covid','results','loggedIn'));
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }


    }


    public function businessDashboard(Request $request)
    {
        try {
            $stories = Post::where('content_type', 'story')->get()->groupBy('userId');
            if(Auth::User()->userTypeId==1){
                $loggedIn = Auth::user()->getUserDetail->userId;
            }else{
                $loggedIn = Auth::user()->getBusinessDetail->businessId;
                $userName =  Auth::user()->getBusinessDetail->businessName;
            }
            // dd($loggedIn);

            $results = Post::orderBy('postId', 'DESC')->where('userId','!=',$loggedIn)->where('content_type', 'feeds')->get();

            $artilces = '';
            $url = env('APPLICATION_URL');

            $covid = Covid::where('userId', $loggedIn)->first();
            $loggedIn = Auth::user()->getBusinessDetail;
            if(Auth::User()->userTypeId==1){
                return view('user-web.home', compact('stories', 'covid','results','loggedIn'));
            }else{
                return view('business.home', compact('stories', 'covid','results','loggedIn'));
            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }


    }

    public function storyDetail($id)
    {
        try {
            $stories = Post::where('content_type', 'story')->get()->groupBy('userId');

            $userId_=$id;
            $userStories = Post::where('content_type', 'story')->where('userId', $id)->get();

            return view('business.story-detail', compact('userStories', 'stories','userId_'));
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }

    }

    public function myProfile()
    {
        try {
            $loggedInUser = Auth::user()->getUserDetail;

            // $users = MstUser::all();


            if (!empty($loggedInUser->lat) && !empty($loggedInUser->long)) {
                $query = DB::table('mstuser as m')
                    ->select('*', DB::raw('(ACOS(
                            COS(RADIANS(m.lat)) * COS(RADIANS(?)) * COS(RADIANS(m.long) - RADIANS(?)) +
                            SIN(RADIANS(m.lat)) * SIN(RADIANS(?))
                        ) * 6371) AS distance', [$loggedInUser->lat, $loggedInUser->long, $loggedInUser->lat]))
                    ->having('distance', '<=', 10000)
                    ->orderBy('distance');

                // Manually bind parameters
                $query->addBinding($loggedInUser->lat, 'select');
                $query->addBinding($loggedInUser->long, 'select');
                $query->addBinding($loggedInUser->lat, 'select');

                // Now execute the query
                $users = $query->get();


            } else {
                $users = MstUser::all();
            }




            $plans = Plan::where('planType', '1')->get();
            $planFeatures = PlanFeature::all();
            $loggedIn = Auth::user()->getUserDetail;
            $logged = Auth::user();
            $education=Education::where('userId',$loggedIn->userId)->get();
            $occupation=Occupation::where('userId',$loggedIn->userId)->first();
            $interests=UserInterest::where('userId',$loggedIn->userId)->get();
            // dd($occupation);
            $posts = Post::orderBy('postId', 'DESC')->where('content_type', 'feeds')
                ->where('userId', $loggedIn->userId)
                ->get();
            $results = $posts;


            $photos = Post::with('userPostMedia')->where('userId', $loggedIn->userId)
                ->where('postType', 'image')->where('content_type', 'feeds')->get();
            $postFile = array();
            foreach ($photos as $photo) {
                $postFile[] = PostImages::where('postId', $photo->postId)->first();
            }
            $videos = Post::with('userPostMedia')
                ->where('userId', $loggedIn->userId)
                ->where('postType', 'video')->get();
            $postVideo = [];
            foreach ($videos as $vid) {
                $postVideo[] = PostImages::where('postId', $vid->postId)->first();
            }

            $groups = Group::with('user', 'groupMembers')
                // ->where('userId', $loggedIn->userId)
                ->where('groupAdminId', $loggedIn->userId)
                ->get();
            $groupInvites = GroupInvites::where('userId', $loggedIn->userId)->get();

            foreach($groupInvites as $invite){
                $invites = MstUser::where('userId',$invite->inviterId)->get();
            }
            if(empty($invites)){
                $invites = "";
            }

            $userIntrest = $loggedIn->userIntrests ?? '';

            $intrest_category = Intrest::all();

            $getFollowingsList = Friend::where('userId', $loggedIn->userId)->where('type',3)->get();

            $getFollowersList = Friend::where('followerId', $loggedIn->userId)->where('type',2)->get();

            $getFriendList = Friend::where('userId', $loggedIn->userId)->where('type',1)->get();

            $followingFriendDetail = $followerFriendDetail = $userId = $friendId = $firendFriendDetail = [];
            $friendFriendDetail = [];
            $friendNames=[];
            $followeId=[];
            if($getFollowingsList){
                foreach ($getFollowingsList as $list) {
                    $followeId[] = $list->followerId;
                }
                $checkUserType = MstAuthorization::whereIn('userId', $followeId)->get();
                foreach ($checkUserType as $user) {
                    if ($user->userTypeId == 1) {
                        $followingFriendDetail[] = MstUser::where('userId', $user->userId)->get();
                    } else if ($user->userTypeId == 2) {
                        $followingFriendDetail[] = Business::where('businessId', $user->userId)->get();
                    }
                }
            }

            if($getFollowersList){
                foreach ($getFollowersList as $list) {
                    $userId[] = $list->userId;
                }

                $checkFollowerUserType = MstAuthorization::whereIn('userId', $userId)->get();
                foreach ($checkFollowerUserType as $user) {
                    if ($user->userTypeId == 1) {
                        $followerFriendDetail[] = MstUser::where('userId', $user->userId)->get();
                    } else if ($user->userTypeId == 2) {
                        $followerFriendDetail[] = Business::where('businessId', $user->userId)->get();
                    }
                }
            }

            if($getFriendList){
                foreach ($getFriendList as $list) {
                    $friendId[] = $list->followerId;
                }
                $checkFriendUserType = MstAuthorization::whereIn('userId', $friendId)->get();
                foreach ($checkFriendUserType as $user) {
                    if ($user->userTypeId == 1) {
                        $firendFriendDetail[] = MstUser::where('userId', $user->userId)->get();
                    } else if ($user->userTypeId == 2) {
                        $firendFriendDetail[] = Business::where('businessId', $user->userId)->get();
                    }
                }
            }



            /**
             * Get Folders
             */
            $currentYear = date('Y');
            $currentMonth = date('m');
            $currentDate = date('d');

            $folderData = [];


            //get albums
            $albumData = Album::where('userId', $loggedIn->userId)->get();
            $albumImages = [];
            foreach ($albumData as $value) {
                $images = AlbumImage::where('albumId', $value->albumId)->get();
                $albumImages[$value->albumId] = $images;
            }

            $occupation_types = OccupationType::all();

            $occupations = Occupation::where('userId',$loggedIn->userId)->get();
            return view('user-web.my-profile', compact('interests','occupation','occupations','education','occupation_types','loggedIn', 'logged', 'getFollowingsList','getFriendList','getFollowersList', 'followingFriendDetail','followerFriendDetail','firendFriendDetail','friendNames','posts', 'postFile', 'postVideo', 'groups', 'userIntrest','plans','planFeatures','groupInvites','invites','users','intrest_category','folderData','albumData','albumImages'));
        } catch (\Throwable $th) {
            echo"<pre>";
            print_r($th->getMessage());
            die();
            return redirect()->route('business-dashboard');
        }

    }
    public function saveUserProfile(Request $request){
        try {
            $userId=Auth::user()->getUserDetail->userId;
        $userName=$request->profileName;
        $city=$request->city;
        $country=$request->country;
        //education
        $title=$request->title;
        $startDate=$request->startDate;
        $endDate=$request->endDate;
        $level=$request->level;
        $location=$request->location;
        if($request->currently_studying!=""){$currently_studying=1;}else{$currently_studying=0;}
        //occupation
        $occupation_title=$request->occupation_title;
        $occupation_description=$request->occupation_description;
        $occupation_startDate=$request->occupation_startDate;
        $occupation_endDate=$request->occupation_endDate;
        if($request->current_working!=""){$current_working=1;}else{$current_working=0;}
        $occupation_location=$request->occupation_location;
        $martialStatus=$request->martialStatus;
        $gender=$request->gender;
        $height=$request->height;
        $profile_image=$request->profile_image;
        if(!empty($profile_image)){
            if ($request->hasFile('profile_image')) {

                $file = $request->file('profile_image');
                $fileName = time() . '.' . $request->profile_image->extension();

                // $url = $request->profile_image->move('../../userdoc', $fileName);

                $url = $request->profile_image->move(public_path('userdoc'), $fileName);

                $update=MstUser::where('userId',$userId)->update([
                        'profileImageUrl'=>'userdoc/'.$fileName,

                    ]);

            }
        }

        $update=MstUser::where('userId',$userId)->update([
            'userName'=>$userName,
            'city'=>$request->city,
            'country'=>$request->country,
            'martialStatus'=>$request->martialStatus,
            'gender'=>$request->gender,
            'height'=>$request->height
        ]);

        $update1=Education::where('userId',$userId)->update([
            'title'=>$title,
            'startDate'=>$startDate,
            'endDate'=>$endDate,
            'location'=>$location,
            'level'=>$level,
            'currently_studying'=>$currently_studying,

        ]);
        // $update2=Occupation::where('userId',$userId)->update([
        //     'title'=>$request->occupation_title,
        //     'description'=>$request->occupation_description,
        //     'startDate'=>$request->occupation_startDate,
        //     'endDate'=>$request->occupation_endDate,
        //     'current_working'=>$request->current_working,
        //     'location'=>$request->occupation_location,
        //     'occupation_id' => $request->occupation_type

        // ]);


        foreach ($request->occupation_type as $index => $occupationType) {
            // Find existing occupation for the user by type
            $occupation = Occupation::where('userId', $userId)
                                    ->where('occupation_id', $occupationType)
                                    ->first();

            // If occupation exists, update it; otherwise, create a new one
            if ($occupation) {
                $occupation->update([
                    'title' => $request->occupation_title[$index],
                    'description' => $request->occupation_description[$index],
                    'startDate' => $request->occupation_startDate[$index],
                    'endDate' => $request->occupation_endDate[$index],
                    'current_working' => $request->current_working[$index] ?? 0, // Default to 0 if not provided
                    'location' => $request->occupation_location[$index]
                ]);
            } else {
                Occupation::create([
                    'userId' => $userId,
                    'occupation_id' => $occupationType,
                    'title' => $request->occupation_title[$index],
                    'description' => $request->occupation_description[$index],
                    'startDate' => $request->occupation_startDate[$index],
                    'endDate' => $request->occupation_endDate[$index],
                    'current_working' => $request->current_working[$index] ?? 0, // Default to 0 if not provided
                    'location' => $request->occupation_location[$index]
                ]);
            }
        }
        // dd($update,$update1,$update1);
        return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }

    }
    public function addCovid(Request $request)
    {
        try {
            $userId = $request->userId;
            $covid = Covid::where('userId', $userId)->first();
            $data = [
                'hospitalName' => "null",
                'covidStatus' => $request->covidStatus,
                'date' => $request->date,

            ];
            if (empty($covid)) {

                $data['userId'] = $userId;
                $add = Covid::create($data);
            } else {

                $update = Covid::where('userId', $userId)->update($data);
            }
            return redirect('/dashboard')->with('success', "Covid information added successfully.");
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }

    }




    public function friendProfile($friendId) {

        try {
            $loggedIn = MstUser::where('userId', $friendId)->get();
            $logged = "";
            $posts = Post::where('content_type', 'feeds')
                ->where('userId', $friendId)
                ->get();
            $photos = Post::where('userId', $friendId)
                ->where('postType', 'image')
                ->where('content_type', 'feeds')
                ->get();
            $postFile = array();
            foreach ($photos as $photo) {
                $postFile[] = PostImages::where('postId', $photo->postId)->first();
            }
            $videos = Post::where('userId', $friendId)
                ->where('postType', 'video')
                ->where('content_type', 'feeds')
                ->get();
            $postVideo = [];
            foreach ($videos as $vid) {
                $postVideo[] = PostImages::where('postId', $vid->postId)->first();
            }
            $groups = Group::with('user', 'groupMembers')
                // ->where('userId', $loggedIn->userId)
                ->where('groupAdminId', $friendId)
                ->get();


            $getFriendsList = Friend::where('userId', $friendId)->get();
            $friendDetail = [];
            $followeId = [];
            foreach ($getFriendsList as $list) {
                $followeId[] = $list->followerId;
            }
            if(!empty($followeId)){
                $friendDetail[] = MstUser::where('userId', $followeId)->get();
            }

            return view('user-web.friend-profile', compact('loggedIn' ,'logged','getFriendsList', 'friendDetail', 'posts', 'photos','postFile', 'videos','postVideo', 'groups','friendId'));

        } catch (\Throwable $th) {

            return redirect()->route('business-dashboard');
        }

    }

    public function businessSearch(Request $request){
        try {
            if($request->ajax())
		{
		  $peoples=MstUser::where('userName','LIKE','%'.$request->search."%")->where('isActive',1)->get();
		  $business=Business::where('businessName','LIKE','%'.$request->search."%")->where('isActive',1)->where('businessId','!=',Auth::User()->getBusinessDetail->businessId)->get();
		  if($request->search!=""){
		    $list="<ul id='peopleListULAdd'>";
		    $list2="<ul id='businessListULAdd'>";
		      $i=0;
		      $j=0;
    		  if(count($peoples) > 0){
    		      $i=$i+1;
    		      foreach($peoples as $p => $people){
    		          $list.="<a style='color: black;' href='".url('view-profile/'.$people->userId.'/people')."'><li style='list-style-type: none; padding: 6px 10px;font-size: 13px; border-bottom: 1px solid #f7f7f7;border-top: 1px solid #f7f7f7;'><div class='avatar'><img src='" . env('APPLICATION_URL') . "/public/" . $people->profileImageUrl . "' style='width:32px ; height:32px; margin-right:5px'><span>".$people->userName."</span></div></li></a>";
    		      }
    		      $list.="</ul>";
    		  }
    		  if(count($business) > 0){
    		      $j=$j+1;
    		      foreach($business as $b => $bussn){
    		          $list2.="<a style='color: black;' href='".url('view-profile/'.$bussn->businessId.'/business')."'><li style='list-style-type: none; padding: 6px 10px;font-size: 13px; border-bottom: 1px solid #f7f7f7;border-top: 1px solid #f7f7f7;'><div class='avatar'><img src='" . env('APPLICATION_URL') . "/public/" . $bussn->logoImageUrl."' style='width:32px ; height:32px; margin-right:5px'><span>".$bussn->businessName."</span></div></li></a>";
    		      }
    		      $list2.="</ul>";
    		  }
		  }
		$array=array($i,$j,$list,$list2);
		return Response($array);
		}
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }


    }
    public function userSearch(Request $request){
        try {
            if($request->ajax())
		{
		  $peoples=MstUser::where('userName','LIKE','%'.$request->search."%")->where('userId','!=',Auth::user()->getUserDetail->userId)->where('isActive',1)->get();
		  $business=Business::where('businessName','LIKE','%'.$request->search."%")->where('isActive',1)->get();
		  if($request->search!=""){
		    $list="<ul id='peopleListULAdd'>";
		    $list2="<ul id='businessListULAdd'>";
		      $i=0;
		      $j=0;
    		  if(count($peoples) > 0){
    		      $i=$i+1;
    		      foreach($peoples as $p => $people){
    		          $list.="<a style='color: black;' href='".url('view-profile/'.$people->userId.'/people')."'><li style='list-style-type: none; padding: 6px 10px;font-size: 13px; border-bottom: 1px solid #f7f7f7;border-top: 1px solid #f7f7f7;'><div class='avatar'><img src='" . env('APPLICATION_URL') . "/public/" . $people->profileImageUrl."' style='width:32px ; height:32px; margin-right:5px'><span>".$people->userName."</span></div></li></a>";
    		      }
    		      $list.="</ul>";
    		  }
    		  if(count($business) > 0){
    		      $j=$j+1;
    		      foreach($business as $b => $bussn){
    		          $list2.="<a style='color: black;' href='".url('view-profile/'.$bussn->businessId.'/business')."'><li style='list-style-type: none; padding: 6px 10px;font-size: 13px; border-bottom: 1px solid #f7f7f7;border-top: 1px solid #f7f7f7;'><div class='avatar'><img src='" . env('APPLICATION_URL') . "/public/" . $bussn->logoImageUrl."' style='width:32px ; height:32px; margin-right:5px'><span>".$bussn->businessName."</span></div></li></a>";
    		      }
    		      $list2.="</ul>";
    		  }
		  }
		$array=array($i,$j,$list,$list2);
		return Response($array);
		}
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }


    }
    public function ViewProfile($id,$type){

        try {
            $products = BusinessProduct::where('businessId',$id)->get();

            $events = Event::all();
            $friendDetail = [];
            $users = MstUser::all();
            if($type=='business'){
                $business=Business::where('businessId',$id)->where('isActive',1)->first();
                $totalFollowers=$business->totalFollowers;
                $totalFollowing=$business->totalFollowing;
                $loggedIn=$business;
                $image=$business->logoImageUrl;
                $name=$business->businessName;
                $ownerName=$business->ownerName;
                $phoneNo=$business->businessContact;
                $plans = Plan::where('planType', '2')->get();

            }else{
                $people=MstUser::where('userId',$id)->where('isActive',1)->first();
                $totalFollowers=$people->follower;
                $totalFollowing=$people->following;
                $loggedIn=$people;
                $image=$people->profileImageUrl;
                $name=$people->userName;
                $ownerName='';
                $phoneNo=$people->phoneNo;
                $plans = Plan::where('planType', '1')->get();
            }
            $posts = Post::where('userId', $id)->where('content_type', 'feeds')->get();
            $photos = Post::where('userId', $id)->where('postType', 'image')->get();
            $videos = Post::where('userId', $id)->where('postType', 'video')->get();
            $videos = Post::where('userId', $id)->where('postType', 'video')->get();
            $getFriendsList = Friend::where('userId', $id)->get();
            $groups = Group::with('user', 'groupMembers')->where('groupAdminId', $id)->get();
            foreach ($getFriendsList as $list) {
                $followeId[] = $list->followerId;
            }
            if(!empty($followeId)){
            if($type=='people'){
                $checkUserType = MstAuthorization::whereIn('userId', $followeId)->get();
                // dd($checkUserType);
                foreach ($checkUserType as $user) {
                    if ($user->userTypeId == 1) {
                        $friendDetail[] = MstUser::where('userId', $user->userId)->get();
                    } else if ($user->userTypeId == 2) {
                        $friendDetail[] = Business::where('businessId', $user->userId)->get();
                    }
                }
            }

            }
            // dd(count($friendDetail));

            $planFeatures = PlanFeature::all();
            if($type=='business'){
                return view('business.other_profile', compact('products','users','image','name','ownerName','loggedIn','phoneNo', 'posts', 'photos', 'videos', 'getFriendsList', 'planFeatures', 'groups', 'plans','totalFollowers','totalFollowing','events'));
            }else{

                return redirect()->route('friend-profile', ['id' => $id]);

            }
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }


    }

    public function renderComments($comments, $parentId = null) {
        try {
            $output = '';

            foreach ($comments as $comment) {

                if ($comment['parent_id'] === $parentId) {

                    // Add the class 'sub-comment' if the comment matches the provided ID
                    $class = ($parentId !== null) ? 'sub-comment' : '';

                    $output .= '<div class="comment ' . $class . '">';
                    $output .= '<div class="d-flex gap-2">';
                    $output .= '<img src="';

                    if (!empty($comment->user['profileImageUrl'])) {
                        $output .= env('APPLICATION_URL') . $comment->user['profileImageUrl'];
                    } elseif (!empty($comment->business['logoImageUrl'])) {
                        $output .= env('APPLICATION_URL') . $comment->business['logoImageUrl'];
                    } else {
                        $output .= 'default_image_url.jpg';
                    }
                    $output .= '" alt="" class="user-img">';
                    $output .= '<div class="w-100">';
                    $output .= '<div class="text-wrapper">';
                    $output .= '<p class="comment-text"><span class="user-title">' .
                    (!empty($comment->user['userName']) ? $comment->user['userName'] : $comment->business['userName']) .
                        '</span>' . $comment['comment'] . '</p>';
                        $output .= '</div>';
                        $output .= '<span class="comment-control" data-userId="'.(!empty($comment->user['userId']) ? $comment->user['userId'] : $comment->business['businessId']).'" data-user_name="' .
                        (!empty($comment->user['userName']) ? $comment->user['userName'] : $comment->business['userName']) .
                        '" data-post_id="'.$comment['postId'].'" data-id="'.$comment['postCommentId'].'" data-parent_id="'.$comment['parent_id'].'" >Reply</span>';
                    $output .= '</div>';
                    $output .= '</div>';
                    // Recursively render sub-comments
                    $output .= $this->renderComments($comments, $comment['postCommentId']);
                    $output .= '</div>';


                }
            }

            return $output;
        } catch (\Throwable $th) {
            return redirect()->route('business-dashboard');
        }

    }


    public function checkFileExistence(Request $request)
    {
        $filePath = $request->query('file');
        $absoluteFilePath = public_path($filePath);
        if (File::exists($absoluteFilePath)) {
            return response()->json(['status' => 'exists']);
        } else {
            return response()->json(['status' => 'not_exists']);
        }
    }

    public function get_occupation_tpyes_ajax(Request $request){

        $occupationTypes = OccupationType::all(); // Assuming you have an OccupationType model

        return response()->json($occupationTypes);
    }
    public function follow_user(Request $request){
        try {
            $loggedIn = \Auth::User()->getUserDetail;
            Friend::create([
                'userId' =>  $loggedIn->userId,
                'followerId' => $request->userId,
                'type' => 3
            ]);

            return response()->json(['status' => 'true','message'=>'Follow successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'false','message'=> $th->getMessage()]);
        }
    }

}
