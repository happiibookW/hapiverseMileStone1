// var ENDPOINT = "{{ url('/') }}";
// alert('asas');
var page = 1;
infinteLoadMore(page);
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        infinteLoadMore(page);
    }
});


// var GET_POSTS = APPLICATION_URL + 'posts';

function infinteLoadMore(page) {

    const GET_POSTS = APPLICATION_URL;

    $.ajax({
            url: GET_POSTS+"posts?page=" + page,
            datatype: "html",
            type: "get",
            beforeSend: function () {
                $('.loadMore').show();
            }
        })
        .done(function (response) {

            if (response.length == 0) {
                $('.loadMore').html("We don't have more data to display :(");
                return;
            }
            $('.loadMore').hide();
            $("#business-posts").append(response);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
}

$(document).on('click', '#commentDisplay', function(e){
    e.preventDefault();

    var url = $(this).data('url');
    var id = $(this).data('id');
    var actionValue = 'add-comment/' + id;
    var newUrl = url.replace('/public/', '/');


    $('#dynamic-conten').html('');
    $('#modal-loader').show();


    $.ajax({
        url: newUrl,
        type: 'GET',
        dataType: 'html'
    })
    .done(function(data){

        var $html = $(data);
        // Find the form within the HTML
        var $form = $html.find('form');
        $form.attr('action', actionValue);
        $('#dynamic-content').html('');
        $('#dynamic-content').html($html);
        $('#modal-loader').hide();
    })
    .fail(function(){
        $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#modal-loader').hide();
    });

});
