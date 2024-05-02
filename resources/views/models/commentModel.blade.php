


<div class="modal  comment-modal show" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="post" id="commentForm" onsubmit="return post();" action="">
                    @csrf
                        <button  id = "modalClose" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="comments-main-wrapper">
                                <div class="comments-wrapper">
                                     @foreach($comments as $comment)
                                    <div class="comment-item">
                                        <div class="comment">

                                            <div class="d-flex gap-2">
                                                @if(\Illuminate\Support\Facades\File::exists(public_path($comment->user->profileImageUrl)))
                                                    <img class="user-img" src="{{ env('APPLICATION_URL') . $comment->user->profileImageUrl }}">
                                                @else
                                                    <img class="user-img" src="https://hapiverse.com/ci_api/public/{{ $comment->user->profileImageUrl}}">
                                                @endif
                                                <!-- <img src="env('APPLICATION_URL').{{$comment->user->profileImageUrl?? ''}}" alt="" class="user-img"> -->
                                                <div>
                                                    <div class="text-wrapper">
                                                        <p class="comment-text"><span class="user-title">{{$comment->user->userName ?? ""}}</span> {{$comment->comment ?? ""}}</p>
                                                    </div>
                                                    <a class="comment-control" href="">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment sub-comment d-none" >
                                            <div class="d-flex gap-2">
                                                <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                                                <div>
                                                    <div class="text-wrapper">
                                                        <p class="comment-text"><span class="user-title">Becca John</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quasi?</p>
                                                    </div>
                                                    <a class="comment-control" href="">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="text" name="comment" class="form-control" placeholder="Add Comment Here">
                                    <button type="submit" style="border:none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g id="share.light" transform="translate(-0.013)">
                                                <path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#1c2233"></path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        $(function () {
        $('#modalClose').on('click', function () {
            $('#commentModal').hide();
        })
    })

        </script>
