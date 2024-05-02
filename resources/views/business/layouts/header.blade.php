<body>
    <div class="main home">
        <div class="header">
            <div class="container">
                @include('business.layouts.navbar')
            </div>
        </div>

<script>
    var getLikesUsersUrl = "{{ route('get_likes_users') }}";
    var addFriendRoute = "{{ route('add_friend') }}";
    var APPLICATION_URL = '{{ env("APPLICATION_URL") }}';
    var replyToComment = "{{ route('reply_to_comment') }}";
    var getPostData = "{{ route('get_post') }}";
    var getOccupation = "{{ route('get_ocupations') }}";
    var unfollow_friend = "{{ route('unfollow_friend') }}";
    var remove_follower = "{{ route('remove_follower') }}";
</script>
