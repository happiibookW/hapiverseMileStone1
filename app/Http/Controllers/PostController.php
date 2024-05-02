<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImages;
use App\Models\BackgroundImages;
use App\Models\PostLike;
use App\Models\Friend;
use App\Models\Comment;
use App\Models\Notifications;
use App\Models\SavePost;
use App\Models\Album;
use App\Models\AlbumImage;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Util\Blacklist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\MstUser;
use SebastianBergmann\CodeUnit\FunctionUnit;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('web.post.my-timeline-post');
    }
    public function myPost(Request $request)
    {
        // $loggedInUser = \Auth::user();
        // $userDetail = $loggedInUser->getUserDetail->userId;

        // $results = Post::orderBy('postId')->where('userId',  $userDetail)->paginate(10);
        // $artilces = '';
        // if ($request->ajax()) {
        //     foreach ($results as $result) {

        //         $artilces .= '<div class="card mb-2"> <div class="card-body">'
        //             . $result->postId .
        //             ' <h5 class="card-title">'
        //             . $result->caption .
        //             '</h5> ' . $result->postContentText . '</div></div>';
        //     }
        //     return $artilces;
        // }
        // return view('web.post.my-timeline-post');
    }

    public function store(Request $request)
    {

        $user = \Auth::user();

        if($user->userTypeId==2){
            $userId = $user->getBusinessDetail->businessId;
        }else{
            $userId = $user->getUserDetail->userId;
        }

        $postType = "text";
        $fileName = '';

        // Get the current year and month
        $currentYear = date('Y');
        $currentMonth = date('m');
        $currentDate = date('d');

        // Create directory if it doesn't exist

        $directory = public_path('postdoc') . '/' . $currentYear . '/' . $currentMonth. '/'. $currentDate. '/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        if (!empty($request->image)) {

            if ($request->hasFile('image')) {
                // $target_dir = "postdoc/";
                // $target_file = "../".$target_dir . basename($_FILES["image"]["name"]);
                $ext = $request->image->extension();
                if ($ext == "mp4" || $ext == "MOV") {
                     $postType = "video";
                    }
                else{
                     $postType = "image";
                }


                $file = $request->file('image');

                $fileName = time() . '.' . $request->image->extension();

                $url = $request->image->move($directory, $fileName);
                // $url  = $request->image->move(public_path('postdoc'), $fileName);
                $request->background_image = null;

                $post = Post::create([
                    'caption' => $request->caption,
                    'postType' => $postType,
                    'userId' => $userId,
                    'privacy' => $request->privacy,
                    'content_type' => 'feeds',
                    'font_color' => '',
                    'text_back_ground' =>$request->text_back_ground,
                    'interest' => '1',
                    'active' => '1',
                    'profileName' => "",
                    'profileImageUrl' => "",
                    'location' => '',
                    'postContentText' => "",
                ]);

                PostImages::create([
                    'postId' => $post->id,
                    'userId' => $userId,
                    'postFileUrl' => "postdoc/" . $currentYear . '/' . $currentMonth . '/'. $currentDate . '/' . $fileName,
                    'background_images' => $request->background_image
                ]);
                AlbumImage::create([
                    'albumId' => $request->album_id,
                    'userId' => $userId,
                    'imageUrl' => "postdoc/" . $currentYear . '/' . $currentMonth . '/'. $currentDate . '/' . $fileName
                ]);
            }
        }else if (!empty($request->video)) {

            $postType = "video";
            $fileName =$request->video->getClientOriginalName();


            $url = $request->video->move($directory, $fileName);

            $post = Post::create([
                'caption' => $request->caption,
                'postType' => $postType,
                'userId' => $userId,
                'privacy' => $request->privacy,
                'content_type' => 'feeds',
                'font_color' => '',
                'text_back_ground' =>$request->text_back_ground,
                'interest' => '1',
                'active' => '1',
                'profileName' => "",
                'profileImageUrl' => "",
                'location' => '',
                'postContentText' => "",
            ]);

            PostImages::create([
                'postId' => $post->id,
                'userId' => $userId,
                'postFileUrl' => "postdoc/" . $currentYear . '/' . $currentMonth . '/'. $currentDate . '/' . $fileName,
                'background_images' => $request->background_image
            ]);
            AlbumImage::create([
                'albumId' => $request->album_id,
                'userId' => $userId,
                'imageUrl' => "postdoc/" . $currentYear . '/' . $currentMonth . '/'. $currentDate . '/' . $fileName
            ]);
        }
        elseif (!empty($request->background_image)) {

            $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => $request->privacy,
            'content_type' => 'feeds',
            'font_color' => '',
            'text_back_ground' =>$request->background_image,
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
        ]);
        }

      else{

        $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => $request->privacy,
            'content_type' => 'feeds',
            'font_color' => '',
            'text_back_ground' =>$request->text_back_ground,
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
        ]);

    }

        return redirect()->back();

         return response()->json(['success' => true]);
    }
    public function addComment(Request $request, $postId){
        $user = \Auth::user();

        $posts = Post::where('postId',$postId)->get();
        $request->validate([
            'comment'=>"required",
            ]);
        foreach($posts as $post){
            $receiverId = $post->userId;
        }

        if($user->userTypeId==2){
            $userId = $user->getBusinessDetail->businessId;
            $userName = $user->getBusinessDetail->businessName;
        }else{
            $userId = $user->getUserDetail->userId;
            $userName = $user->getUserDetail->userName;
        }

         Comment::create([
            'userId' =>$userId,
            'comment' => $request->comment,
            'postId' =>  $postId
        ]);
         Notifications::create(['senderId' => $userId, 'receiverId' => $receiverId, 'notificationTypeId' => 2,'subject' => $userName , "body" => "commented on  your post","id"=>$postId]);

        return redirect()->back();
    }


    public function addCommentReply(Request $request)
    {
        $posts = Post::where('postId',$request->postId)->get();

        foreach($posts as $post){
            $receiverId = $post->userId;
        }

        $userData = MstUser::where('userId', $request->user_id)->first();

        $commentText = $request->comment_text;
        $pattern = '/@(\w+)/';
        $commentText = preg_replace($pattern, '<a href="friendProfile/'.$userData->userId.'">$0</a>', $commentText);

        $newComment = Comment::create([
            'parent_id' => $request->commentId,
            'userId' =>$request->user_id,
            'comment' => $commentText,
            'postId' =>  $request->postId
        ]);

        $lastInsertedId = $newComment->id;

        $retrievedComment = Comment::where('userId', $request->user_id)
        ->where('postCommentId', $lastInsertedId)
        ->first();

         Notifications::create(['senderId' => $request->user_id, 'receiverId' => $receiverId, 'notificationTypeId' => 2,'subject' => $userData->userName , "body" => "commented on  your post","id"=>$request->postId]);

        return [
            'status' => 'success',
            'message' => 'Reply added successfully',
            'data' => $retrievedComment,
            'userData' => $userData
        ];
    }


    public function postLike($postId)
    {
        $artilces = "";
        $posts = Post::where('postId',$postId)->get();
        foreach($posts as $post){
            $receiverId = $post->userId;
        }
         if(Auth::User()->userTypeId==1){
            $loggedIn = Auth::user()->getUserDetail->userId;
            $loggedInName = Auth::user()->getUserDetail->userName;
        }else{
            $loggedIn = Auth::user()->getBusinessDetail->businessId;
            $loggedInName = Auth::user()->getBusinessDetail->businessName;
        }
        $checkLiked = PostLike::where('userId', $loggedIn)->where('postId', $postId)->first();
        if (empty($checkLiked)) {
            PostLike::create(['userId' => $loggedIn, 'postId' => $postId, 'likeType' => 1]);
            $output= PostLike::where('postId', $postId)->get();
            foreach ($output as $like) {
                $artilces .= '<span class="list-item"><img src="'.env('APPLICATION_URL').'';
                if(Auth::User()->userTypeId==1){
                  $artilces .=$like->user->profileImageUrl??'' ;
                }
                else{
                    $artilces .=$like->business->logoImageUrl??'' ;
                }
                $artilces .= '" alt=""></span>';
            }
            $count = '<b>'.count($output).'</b>';
            Notifications::create(['senderId' => $loggedIn, 'receiverId' => $receiverId, 'notificationTypeId' => 2,'subject' => $loggedInName , "body" => "liked your post","id"=>$postId]);
            return array('status' => 'Success', 'data' => 'liked successfully', 'postlikes' => $count,'image' => $artilces);
        } else {
            PostLike::where('userId', $loggedIn)->where('postId', $postId)->delete();
            $output= PostLike::where('postId', $postId)->get();
            $count = '<b>'.count($output).'</b>';
            Notifications::where('senderId', $loggedIn)->where('receiverId', $receiverId)->where('id', $postId)->delete();
            return array('status' => 'Blank', 'data' => 'unliked successfully', 'postlikes' => $count,'image' => $artilces);
        }
    }

    public function delete($postId){
         $post = Post::where('postId', $postId)->delete();
         $post = PostImages::where('postId', $postId)->delete();
        return redirect()->back();
    }
    //function to get list of users who likes the post
    public function get_likes_users_list(Request $request){

        $post_id = $request->post_id;
        $likedUserIds = PostLike::where('postId', $post_id)->pluck('userId');
        $usersInfo = DB::table('mstuser')
                    ->whereIn('userId', $likedUserIds)
                    ->get()
                    ->map(function($user) {
                        $isFriend = Friend::where('userId', Auth::user()->getUserDetail->userId)
                                            ->where('followerId', $user->userId)
                                            ->exists();
                        $user->isFriend = $isFriend;
                        return $user;
                    });
        return [
            'status' => 'success',
            'message' => 'List fetched successfully',
            'data' => $usersInfo
        ];
    }

    public function postSave(Request $request){

        $loggedIn = \Auth::User()->getUserDetail;

        $postId = $request->postId;
        $action = $request->action;
        $new_status = ($action === 'save') ? 'unsave' : 'save';

        if($action == 'save'){
            SavePost::create(['userId' =>  $loggedIn->userId,'postId' => $postId]);
        }else{
            SavePost::where('userId', $loggedIn->userId)->where('postId', $postId)->delete();
        }
        return [
            'status' => 'success',
            'message' => 'Post '.$action.' successfully',
            'data' => $new_status
        ];
    }

    public function add_album(Request $request){
        $loggedIn = \Auth::User()->getUserDetail;
        $albumName = $request->album_name;
        Album::create(['userId' =>  $loggedIn->userId,'albumName' => $albumName]);
        return redirect()->back();
    }

    public function share_on_timeline(Request $request)
    {

        $user = \Auth::user();

        if($user->userTypeId==2){
            $userId = $user->getBusinessDetail->businessId;
        }else{
            $userId = $user->getUserDetail->userId;
        }

        $get_post = POST::where('postId',$request->postId)->first();
        $get_post_media = PostImages::where('postId',$request->postId)->first();

        $postType = $get_post->postType;
        $fileName = '';

        // Get the current year and month
        $currentYear = date('Y');
        $currentMonth = date('m');
        $currentDate = date('d');

        // Create directory if it doesn't exist

        $directory = public_path('postdoc') . '/' . $currentYear . '/' . $currentMonth. '/'. $currentDate. '/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        if($get_post->postType != 'text'){
            // Get the filename
            $fileName = basename($get_post_media->postFileUrl);
            // Construct the new file path
            $newFilePath = $directory . $fileName;
            // Move the file to the new location
            if (file_exists($get_post_media->postFileUrl) && is_file($get_post_media->postFileUrl)) {
                // rename($get_post_media->postFileUrl, $newFilePath);
                copy($get_post_media->postFileUrl, $newFilePath);
            }
        }



        $post = Post::create([
            'caption' => $request->caption,
            'postType' => $postType,
            'userId' => $userId,
            'privacy' => $request->privacy,
            'content_type' => 'feeds',
            'font_color' => '',
            'text_back_ground' =>$get_post->text_back_ground,
            'interest' => '1',
            'active' => '1',
            'profileName' => "",
            'profileImageUrl' => "",
            'location' => '',
            'postContentText' => "",
        ]);
        if($get_post->postType != 'text'){
            PostImages::create([
                'postId' => $post->id,
                'userId' => $userId,
                'postFileUrl' => "postdoc/" . $currentYear . '/' . $currentMonth . '/'. $currentDate . '/' . $fileName,
                'background_images' => $get_post->background_image
            ]);
        }
        return redirect()->back();
 }

    public function get_post(Request $request){
        $get_post_images ='';
        $get_post_data = POST::where('postId',$request->postId)->first();
        if($get_post_data->postType != 'text'){
            $get_post_images = PostImages::where('postId',$request->postId)->first();
        }
        return [
            'status' => 'success',
            'message' => 'Post fetched successfully',
            'postData' => $get_post_data,
            'postImagesData' => ($get_post_images) ? $get_post_images->postFileUrl : $get_post_data->text_back_ground

        ];
    }
}
