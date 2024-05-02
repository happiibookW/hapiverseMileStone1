   function addInterest(){

        var value = $('#interest').val();
        var value2 = $("#interest :selected").text();

        console.log(value);
        $.ajax({
             url: "add-interest/"+ value,
             success: function(data) {
                console.log(data);
                $('#interest_list').append(` <p class="lead d-flex justify-content-between mb-2">${value}

                            <a href=""><i class="fas fa-trash-alt me-1 text-danger"></i></a>


                        </p>`);
            }
         });
    }








    let headerHeight = $(".header").height();

    let sideMenuHeight = $(".custom-side-menu").height();
    $(".main-content").css("margin-top", headerHeight);
    $(".custom-side-menu").css("top", headerHeight);
    $(".custom-side-menu").css("height", sideMenuHeight - headerHeight);

    // Function to add more occupation input fields
    $('#addOccupationBtn').on('click', function() {
        // Make AJAX request to fetch occupation types
        $.ajax({
            url: getOccupation,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var occupationTypeSelect = $('<select class="form-select form-control" aria-label="Default select example" name="occupation_type[]"></select>');
                occupationTypeSelect.append('<option value="">Select Occupation Type</option>');
                $.each(data, function(index, occupationType) {
                    occupationTypeSelect.append('<option value="' + occupationType.id + '">' + occupationType.name + '</option>');
                });

                // Create a new div element for the occupation fields
                var newOccupationDiv = $('<div class="slick-item"></div>');

                // Add HTML for the occupation fields and delete button
                newOccupationDiv.append(`
                    <div class="input-wrapper">
                        ${occupationTypeSelect.prop('outerHTML')}
                    </div>
                    <div class="input-wrapper">
                        <input type="text" class="form-control occupation_title" placeholder="Work Title" value="" name="occupation_title[]">
                    </div>
                    <div class="input-wrapper">
                        <input type="text" class="form-control occupation_description" placeholder="Occupation Description" name="occupation_description[]" value="">
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="input-wrapper">
                            <label class="form-label">Start Year</label>
                            <input type="date" class="form-control occupation_startDate" placeholder="Start Year" value="" name="occupation_startDate[]">
                        </div>
                        <div class="input-wrapper">
                            <label class="form-label">End Year</label>
                            <input type="date" class="form-control occupation_endDate" placeholder="End Year" value="" name="occupation_endDate[]">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" class="form-control occupation_location" placeholder="Location" name="occupation_location[]" value="">
                    </div>
                    <div class="form-check form-switch input-wrapper">
                        <label class="form-check-label form-label">Currently Working</label>
                        <input type="checkbox" class="form-check-input current_working" role="switch" value="1" name="current_working[]">
                    </div>

                    <button type="button" class="btn btn-danger deleteOccupationBtn">Delete</button>

                `);

                // Append the new occupation fields to the container
                $('#occupationContainer').append(newOccupationDiv);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Event delegation for dynamically added delete buttons
    $('#occupationContainer').on('click', '.deleteOccupationBtn', function() {
        $(this).parent().remove(); // Remove the parent element (occupation entry)
    });
  $(document).ready(function() {
    var page = 2; // initialize the page number to load the next set of posts
    var loading = false; // prevent multiple requests while one is being processed

    $(window).scroll(function() {
        // calculate the distance from the top of the document to the bottom of the window
        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();
        var scrollBottom = documentHeight - (scrollTop + windowHeight);

        // if the user has scrolled to the bottom of the page and no requests are currently being processed
        if (scrollBottom <= 100 && !loading) {
            loading = true; // set the loading flag to prevent multiple requests
            $('.loadMore').html('Loading...');

            // send an AJAX request to load the next set of posts
            $.get('/posts?page=' + page, function(data) {
                if (data.trim().length == 0) {
                    // if there are no more posts to load, remove the load more button
                    $('.loadMore').html("We don't have more data to display :(");
                } else {
                    // append the new posts to the container and increment the page number
                    $('#posts').append(data);
                    page++;
                }
                loading = false; // reset the loading flag
            });
        }
    });
});

$(document).ready(function() {
    // Check if the current URL matches the pattern
    var currentURL = window.location.href;
    var pattern = /^https?:\/\/[^\/]+\/friendProfile\/[a-zA-Z0-9]+$/;

    if (pattern.test(currentURL)) {
        // Add an extra "/" at the end of the URL
        var modifiedURL = currentURL + "/";
        // Redirect to the modified URL
        window.location.href = modifiedURL;
    }
});


 $(".chat_remove").on("click",function() {
         alert("delete");
         var value = $(this).val();
         console.log(value);
         $.ajax({
             url: "delete-chat/"+ value,
             success: function(data) {
                console.log(data);
                location.reload();

            }
         });
    });




    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    APP_URL_ = 'https://hapiverse.com/public/searchWebUser';
    $('#headerSearch2').on('keyup', function() {

        $value = $(this).val();
        if($value!=""){
            $.ajax({
                type: 'get',
                url: APP_URL_ ,
                data: {
                    'search': $value
                },
                success: function(data) {
                    var obj=eval(data);
                    if(obj[1]>0){
                        $('#businessListUser').hide();
                        $('#businessListNewUser').html(obj[3]);
                    }else{
                        $('#businessListUser').show();
                        $('#businessListNewUser').empty();
                    }
                    if(obj[0]>0){
                        $('#peopleListUser').hide();
                        $('#peopleListNewUser').html(obj[2]);

                    }else{
                        $('#peopleListUser').show();
                        $('#peopleListNewUser').empty();
                    }

                }
            });
        }else{
            $('#businessListUser').show();
            $('#businessListNewUser').empty();
            $('#peopleListUser').show();
            $('#peopleListNewUser').empty();
        }

    });

        APP_URL_LIKE = APPLICATION_URL+ 'like';


        $(".heart").on("click",function() {
            var btnValue = $(this).attr('value');
            var $this = $(this);
            $.ajax({
                type: "GET",
                url: APP_URL_LIKE + '/' + btnValue,
                check : "#counts"+btnValue,
                success: function(result) {
                    if (result.status == 'Success') {
                        $this.addClass('active');
                    }
                    else {
                        $this.removeClass('active');
                    }
                    $("#counts" + btnValue).html(result["postlikes"]);
                    $("#counts" + btnValue + "model").html(result["postlikes"]);
                    $("#check" + btnValue).html(result["image"]);
                    $("#check" + btnValue + "model").html(result["image"]);
                },
                error: function(result) {
                    console.log(result);
                }
            });
        });

        APP_URL_SAVE = APPLICATION_URL+ 'save_post';

        // $(".save-post-btn").on("click",function() {
        $(document).on("click",".save-post-btn",function(){

            var $this = $(this);
            var post_id = $this.data('id');
            var action = $this.data('action');

            $.ajax({
                type: "GET",
                url: APP_URL_SAVE + '/' + post_id,
                data: {
                    postId:post_id,
                    action:action
                },
                success: function(result) {

                    if (result.status == 'success') {
                        $(document).find("[data-id='" + post_id + "']").each(function() {
                            $(this).attr('data-action', result.data).data('action', result.data);
                            $(this).toggleClass('active', result.data === 'unsave');
                            $(this).toggleClass('', result.data === 'save');
                        });
                    }

                },
                error: function(result) {
                    console.log(result);
                }
            });
        });

    $('.select_color').click(function(){
        $("#storyLabel").css('background-color',$(this).attr('data-color'));
        $('#background_color').val($(this).attr('data-color'));
    });
    $('.addtoplaylist').click(function(e){
      APP_NEW_URL = 'https://hapiverse.com/public/addtoplaylist';
      console.log(APP_NEW_URL);
      e.preventDefault();
      var id=$(this).attr('data-id');
      var music_href=$('.getHref'+id).attr('href');
      var music_title=$('.music_title'+id).html();
      var music_id=$('.musicId'+id).val();
      var music_image=$('.dynamicCover'+id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
         'url':APP_NEW_URL,
         'type':'POST',
         'data':{"music_href":music_href,"music_title":music_title,"music_id":music_id,"music_image":music_image},
         success:function(data){
             if(data=="1"){
                 alert("Music added to playlist!");
                 window.location.href="/musics";
             }else{
                 alert(data);
             }
         },
      });
    })
    //----------------------------------------------------------
    $(".backgrounds-list .list-item a").on("click", function () {

        $(".backgrounds-list .list-item a").removeClass("active");
        $(this).addClass("active");
        var imgUrl = $(".backgrounds-list .list-item a.active img").attr("src");

        $("#postLabel").css("background-image", "url(" + imgUrl + ")");

        if ($(".backgrounds-list .list-item .background-img").hasClass("active")) {
          $(".custom-text-area").addClass("text-with-bg");
          $(".custom-text-area label").css("display", "block");
          $(".custom-text-area textarea").removeClass("form-control");
        } else {
          $(".custom-text-area").removeClass("text-with-bg");
          $(".custom-text-area label").css("display", "none");
          $(".custom-text-area textarea").addClass("form-control");
        }
        if ($(".no-bg").hasClass("active")) {
          $("#post-text").removeClass("text-white");
          $(".custom-text-area").removeClass("text-with-bg");
          $(".custom-text-area textarea").addClass("form-control");
        } else {
          $("#post-text").addClass("text-white");
        }
      });
      $(".backgrounds-list .list-item .no-bg").on("click", function () {
        $("#postLabel").css("background-image", "unset");
      });
      $("#postCreteTab .nav-item .nav-link").on("click", function () {
        var customTextArea = $(".custom-text-area");
        if ($("#media-tab").hasClass("active")) {
          $(customTextArea).removeClass("text-with-bg");
          $("textarea", customTextArea).addClass("form-control");
        } else if (
          $(".backgrounds-list .list-item .background-img").hasClass("active")
        ) {
          $(customTextArea).addClass("text-with-bg");
        }
      });
      // crete post modal end
    var d1 = document.getElementById('postLabel');
    d1.insertAdjacentHTML('afterend', '<input id= "backgroundImage" type = "hidden" id = "background_image" name = "background_image" >');

    setInterval(function(){
        let element = document.querySelector('#postLabel');

        let style = getComputedStyle(element);
        let backgroundImage = style.backgroundImage;

        if(backgroundImage  != 'none'){
            let myArray2 = backgroundImage.split("url(\"");
            let myArray3= myArray2[1];
            let myArray4= myArray3.split("\")");
            let myArray5= myArray4[0].split(APPLICATION_URL);
            console.log(myArray5[1]);
            document.getElementById('backgroundImage').value = myArray5[1];
        }
    }, 3000);

    document.getElementById("video").onchange = function(event) {

        document.getElementById("videodisplay").style.display = "block";
        let file = event.target.files[0];
        let blobURL = URL.createObjectURL(file);
        document.getElementById("videodisplay").src = blobURL;

    }

        function initAutocomplete() {
            const input1 = document.getElementById("location_text");
            const options = {
                // componentRestrictions: { country: "GB" },
                fields: ["address_components", "geometry", "icon", "name"]
            };
            const autocomplete1 = new google.maps.places.Autocomplete(input1, options);

            autocomplete1.addListener("place_changed", () => {
                // debugger;
                const place = autocomplete1.getPlace();
                if (!place.geometry || !place.geometry.location) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                document.getElementById("put_lat_lng").value = place.geometry.location.lat() + ',' + place.geometry.location.lng();
            });

            var locations = [
                ['Bondi Beach', -33.890542, 151.274856, 4],
                ['Coogee Beach', -33.923036, 151.259052, 5],
                ['Cronulla Beach', -34.028249, 151.157507, 3],
                ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                ['Maroubra Beach', -33.950198, 151.259302, 1]
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(-33.92, 151.25),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            const icon = {
                url: "https://business-indermediate.marianatech.co.uk/storage/image/defaultLogo.jpg", // url
                scaledSize: new google.maps.Size(50, 50), // scaled size
                origin: new google.maps.Point(0, 0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            // const image =
            //   "https://business-indermediate.marianatech.co.uk/storage/image/defaultLogo.jpg";
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: icon,
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
   //----------------------------------------------------------
    setInterval(function() {
          var optionValue = $('#search').val();
            if(optionValue){
                $("#searchlist").show();
            } else{
                 $("#searchlist").hide();
            }
    }, 1000);

    APP_URL = 'https://hapiverse.com/public/search';

    $('#search').on('keyup', function() {

        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: APP_URL ,
            data: {
                'search': $value
            },
            success: function(data) {
                $('#searchlist').html(data);

            }
        });
    });

   //----------------------------------------------------------
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
     $(document).ready(function(){

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

});

 $(document).ready(function(){

    $(document).on('click', '#postModel', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#postModelContent').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);
            $('#postModelContent').html('');
            $('#postModelContent').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#postModelContent').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

});

$(document).ready(function(){

    $(document).on('click', '#messageModel', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#messageModelContent').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);
            $('#messageModelContent').html('');
            $('#messageModelContent').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#messageModelContent').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

});
$(document).on('click', '#alwayslocation', function(e){
     confirm("Turn Your Location ");

    });


//----------------------------------------------------------
   // Import the functions you need from the SDKs you need

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDhGi0PoHujJci_NaWpO2cZTeWwZPUlXEA",
  authDomain: "hapiverse-fe7b0.firebaseapp.com",
  projectId: "hapiverse-fe7b0",
  storageBucket: "hapiverse-fe7b0.appspot.com",
  messagingSenderId: "92892917559",
  appId: "1:92892917559:web:0bd045d9c31dea9962f4b2",
  measurementId: "G-Y017QSWVH8"
};



// Initialize Firebase
// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);
const firebaseApp = firebase.initializeApp({
  apiKey: 'AIzaSyDhGi0PoHujJci_NaWpO2cZTeWwZPUlXEA',
  authDomain : "hapiverse-fe7b0.firebaseapp.com" ,
  projectId : "hapiverse-fe7b0" ,
  storageBucket : "hapiverse-fe7b0.appspot.com" ,
  messagingSenderId : "92892917559" ,
  appId : "1:92892917559:web:0bd045d9c31dea9962f4b2" ,
  measurementId : "G-Y017QSWVH8",
});
const messaging = firebase.messaging();
// Add the public key generated from the console here.
//getToken(messaging, {vapidKey: "BBzf3Bq7zCsR3IuSTaZObx642YaU7xPfSxzYcrW6e7XZx0ixkNlRFVcBfCaEF9sjPwKrgA9bkmSmzsOm4mrw8_M"});
messaging.usePublicVapidKey("BG-X47tV8jVr64NREyrYB7AOXgipzHAHZAdGjdYmDN9q9Z8h7tFM8GqiKUpftg9A7yCLnVvn3g8Z3ES9wUsfpRA");

function sendTokenServer(fcm_token){
    let user_id = "8iq6e0gue7";

axios.post('/save-token', {
    fcm_token,user_id
  }).then(res => { console.log(res);});
 }

 function retreiveToken(){
     messaging.getToken({ vapidKey: 'BG-X47tV8jVr64NREyrYB7AOXgipzHAHZAdGjdYmDN9q9Z8h7tFM8GqiKUpftg9A7yCLnVvn3g8Z3ES9wUsfpRA' }).then((currentToken) => {
          if (currentToken) {
            // Send the token to your server and update the UI if necessary
            console.log("Token Recieved:"+ currentToken);
            sendTokenServer(currentToken);
            // ...
          } else {
            // Show permission request UI
            alert("You should allow notifications");
            // ...
          }
        }).catch((err) => {
          console.log('An error occurred while retrieving token. ', err);
          setTokenSentToServer(false);
          // ...
    });
 }
 retreiveToken();
//  message.onTokenRefresh(()=>{
//      retreiveToken();
//  });
 // Get registration token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.



 $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


  $("#chatgptform").submit(function(e){

    e.preventDefault();

      //FORM_URL = 'https://hapiverse.com/public/dashboard';
      FORM_URL = 'https://hapiverse.com/public/chatgpt/ask';


        var message = $('#chatgptmessage').val();
        $("#chatgptreply").append('<div class="message-item reply" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
         //$("#sent").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
        //sentMessage(message)
        var form_data = new FormData();
        form_data.append("message",message);
        console.log($(this).serialize());
        $.ajax({
         url:FORM_URL,
          method:'POST',
          data: new FormData( this ),
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function(){

          },
          success:function(data){

            console.log(data.response);
            $("#chatgptreply").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+data.response+'</p></div></div></div>');

            }
        });
    });



$("#submitform").submit(function(e){
// alert("check");
    e.preventDefault();

      FORM_URL = APPLICATION_URL+ 'dashboard';

        var message = $('#message').val();
        $("#reply").append('<div class="message-item reply" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
         //$("#sent").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');
        //sentMessage(message)
        var form_data = new FormData();
        form_data.append("message",message);
        console.log($(this).serialize());
        $.ajax({
         url:FORM_URL,
          method:'POST',
          data: new FormData( this ),
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function(){
            $('#msg').html('Loading......');
          },
          success:function(data){

            // console.log(data);

            }
        });
    });


 messaging.onMessage((payload)=>{
    console.log("message recieved");
    message = payload.data["message"];
    // location.reload();
    // $("#sent").append('<div class="message-item sent" ><div class="message"  ><div class="text-wrapper"><p class="comment-text">'+message+'</p></div></div></div>');


});
//  for( var i = 1; i < 5; i++ ) {
//      var n =1;
//   $("#messagelist"+i).on("click", function () {
//       alert("check");

//     $("#chatBox").removeClass("d-block");
//     $("#chatSingleBox"+i).addClass("d-block");
//   });
//   $("#closeChatSingleBox").on("click", function () {
//     $("#chatSingleBox"+i).removeClass("d-block");
//   });
//   var n= n+1;
//  }

$("#messagelist1").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox1").addClass("d-block");
  });
  $("#closeChatSingleBox1").on("click", function () {
    $("#chatSingleBox1").removeClass("d-block");
  });


  $("#messagelist2").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox2").addClass("d-block");
  });
  $("#closeChatSingleBox2").on("click", function () {
    $("#chatSingleBox2").removeClass("d-block");
  });

  $("#messagelist3").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox3").addClass("d-block");
  });
  $("#closeChatSingleBox3").on("click", function () {
    $("#chatSingleBox3").removeClass("d-block");
  });

  $("#messagelist4").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox4").addClass("d-block");
  });
  $("#closeChatSingleBox4").on("click", function () {
    $("#chatSingleBox4").removeClass("d-block");
  });

  function loadLog() {
    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20;

    $.ajax({
        url: "log",
        cache: false,
        success: function (html) {
            $("#chatbox").html(html); //Insert chat log into the #chatbox div
            //Auto-scroll
            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            }
        }
    });
 }
setInterval (loadLog, 1000);

$(document).ready(function() {
  $('#image').change(function() {
    var file = this.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image-preview').attr('src', e.target.result).show();
      }
      reader.readAsDataURL(file);
    } else {
      $('#image-preview').attr('src', '').hide();
    }
  });


    //Get list of like users
    $(document).on('click', '.count_likes', function() {
        var post_id = $(this).data('id');
        $.ajax({
            url:getLikesUsersUrl,
            method:'GET',
            data: {
                post_id
            },
            success:function(data){
                if (data.status === 'success') {
                    var usersList = data.data;
                    var $modalBody = $('#modal-body'); // Assuming your modal body has an ID of 'modal-body'

                    // Clear previous content
                    $modalBody.empty();
                    var $ul = $modalBody.find('ul');

                    // If the <ul> doesn't exist, create it and append it to the modal body
                    if ($ul.length === 0) {
                        $ul = $('<ul class="list-unstyled"></ul>'); // Add any classes you need here
                        $modalBody.append($ul);
                    }
                    usersList.forEach(function(user) {
                        var $li = $('<li class="media my-2 d-flex align-items-center justify-content-start"></li>');

                        $li.append('<img src="'+APPLICATION_URL + user.profileImageUrl + '" class="mr-3 rounded-circle" alt="User Profile" style="width: 50px; height: 50px;">');

                        var $mediaBody = $('<div class="media-body"></div>');
                        $mediaBody.append('<h6 class="mt-0 mb-1">' + user.userName + '</h6>');
                        $mediaBody.append('<p>' + user.userName + '</p>');

                        $li.append($mediaBody);

                        var buttonText = user.isFriend ? 'Unfriend' : 'Add Friend';
                        var $followButton = $('<a href="javascript:void(0)" class="btn btn-primary add_friend btn-sm follow-btn ml-auto" data-type="'+buttonText+'" data-id="'+user.userId+'">'+ buttonText +'</a>');

                        $li.append($followButton);

                        // Append the <li> to the <ul>
                        $ul.append($li);
                    });
                    $modalBody.append($ul);
                    // Show the modal
                    $('#likesModal').modal('show');
                } else {
                    // Handle error if any
                    console.log('Error: ' + response.message);
                }

            }
        });

    });

    $(document).on('click','#followUser', function(){
        var userId = $(this).data('id');
        $.ajax({
            url: follow_friend,
            type: "POST",
            data: {
                userId: userId,
            },
            success: function (result) {
                window.location.href= APPLICATION_URL+"my-profile";

            },
        });
    });

    $(document).on('click','.unfollow_friend', function(){
        var userId = $(this).data('id');

        $.ajax({
            url: unfollow_friend,
            type: "POST",
            data: {
                userId: userId,
            },
            success: function (result) {
                window.location.href= APPLICATION_URL+"my-profile";
            },
        });
    });

    $(document).on('click','.remove_follower', function(){
        var userId = $(this).data('id');

        $.ajax({
            url: remove_follower,
            type: "POST",
            data: {
                userId: userId,
            },
            success: function (result) {
                window.location.href= APPLICATION_URL+"my-profile";
            },
        });
    });


    $(document).on('click','.add_friend',function(){
        var user_id = $(this).data('id');
        var friend_type = $(this).data('type');
        var $button = $(this);
        $.ajax({
            url:addFriendRoute,
            method:'POST',
            data: {
                user_id:user_id,
                friend:friend_type
            },
            success:function(data){
                if (data.status === 'success') {
                    $button.text(data.data === 'friend' ? 'Unfriend' : 'Add Friend');
                    $button.data('type', data.data);
                }
            }
        });
    });
    $(document).on('click', '.comment-control', function () {
        const parentDiv = $(this).parent();
        if (parentDiv.find('.comment-input').length === 0) {
            const commentInput = $('<input>', {
                'class': 'form-control comment-input',
                'placeholder': 'Reply to comment',
                'name': 'reply_comment',
                'id': 'reply_comment',
                'data-id': $(this).data('id'),
                'data-parent_id': $(this).data('parent_id'),
                'data-post_id': $(this).data('post_id'),
                'data-userId': $(this).data('userid')
            });

            // Create the send button
            const sendButton = $('<button>', {
                'type': 'button',
                'class': 'send-reply-button',
                'data-id': $(this).data('id'),
                'data-parent_id': $(this).data('parent_id'),
                'data-post_id': $(this).data('post_id'),
                'data-userId': $(this).data('userid'),
                'html': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g id="share.light" transform="translate(-0.013)"><path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#1c2233"></path></g></svg>'
            });

            const containerDiv = $('<div>', {
                'class': 'input-button-container'
            });

            containerDiv.append(commentInput);
            containerDiv.append(sendButton);
            parentDiv.append(containerDiv);
        }
        parentDiv.find('#reply_comment').val('@' + $(this).data('user_name') + ' ');
    });

    $(document).on('click','.send-reply-button',function(){
        var $this = $(this);
        var comment_text = $(this).parent().find('#reply_comment').val();

        var commentId = $(this).data('id');
        var parentId = $(this).data('parent_id');
        var post_id = $(this).data('post_id');
        var user_id = $(this).data('userid');
        $.ajax({
            type: 'POST',
            url: replyToComment,
            data: {
                comment_text: comment_text,
                commentId: commentId,
                parent_id: parentId,
                postId:post_id,
                user_id:user_id
            },
            success: function(response) {
                $('.send-reply-button').parent().append('<div class="comment sub-comment"><div class="d-flex gap-2"><img src="'+ APPLICATION_URL+response.userData.profileImageUrl+'" alt="" class="user-img"><div class="w-100"><div class="text-wrapper"><p class="comment-text"><span class="user-title">'+response.userData.userName+'</span>'+response.data.comment+'</p></div><span class="comment-control" data-userid="'+response.userData.userId+'" data-user_name="'+response.userData.userName+'" data-post_id="'+response.data.postId+'" data-id="'+response.data.postCommentId+'" data-parent_id="'+response.data.parent_id+'">Reply</span></div></div></div>');
                $('#reply_comment').remove();
                $('.send-reply-button').remove();
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });

    });

    $(document).on('click','.create-album', function(){
        $('#createAlbum').modal('show');
    });

    $('[data-modal="albumsModal"]').click(function(){
        $('#albumsModal').modal('show');
        $('#createAlbum').modal('hide');
    });



    var shareBtn = $(".share-btn");
    $(shareBtn).on("click", function () {
      $(this)
        .parent()
        .parent()
        .parent()
        .parent()
        .find(".custom-share-box")
        .addClass("d-block");
    });



});

