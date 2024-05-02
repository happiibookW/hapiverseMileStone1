$(document).ready(function () {

    $(document).on('click','.share-in-timeline' , function(){

        var postId = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: getPostData,
            data: {
                postId
            },
            success: function(response) {
                $('#postId').val(response.postData.postId);
                $('#sharePostImgResults img').attr('src', response.postImagesData);
                $('#shareOnTimeline').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });

    });



    $("#cteStoryImgInput").change(function (event) {

        $("#cteStoryImgResults").html("");
        $("#ctestoryImgResults").removeClass("gallery, post-input-slider");
        if ($(this).get(0).files.length == 1) {
            var file = event.target.files[0];
            var fileType = file.type.split('/')[0]; // Get file type (image or video)
            if (fileType === 'image') {
                $("#cteStoryImgResults").addClass("single-post");
                for (var i = 0; i < $(this).get(0).files.length; ++i) {
                    var fileItem = "<img src=" + URL.createObjectURL(event.target.files[i]) + ">";
                    $("#cteStoryImgResults").append(fileItem);
                }
            } else if (fileType === 'video') {
                $("#cteStoryImgResults").addClass("single-post");
                for (var i = 0; i < $(this).get(0).files.length; ++i) {
                    var fileItem = "<video controls><source src=" + URL.createObjectURL(event.target.files[i]) + " type='" + file.type + "'></video>";
                    $("#cteStoryImgResults").append(fileItem);
                }
            }
        }

        if ($(this).val()) {
          $(this).parent().find("label").addClass("custom-label-sm");
          $(this).parent().find(".btn").removeClass("d-none");
          $(".create-acc-slider .slick-list").css("height", "unset");
          $(this).siblings(".custom-text-area").removeClass("d-none");
        } else {
          $(this).parent().find("label").removeClass("custom-label-sm");
          $(this).parent().find(".btn").addClass("d-none");
          $(this).get(0).reset();
          $("#storyImg-text").get(0).reset();
          $(this).siblings(".custom-text-area").addClass("d-none");
        }
    });

    $(".reset-input-btn").on("click", function () {
        $(this).addClass("d-none");
        $("#cteProfileImgResults").html("");
        $("#cteStoryImgResults").html("");
        $("#ctePostImgResults").html("").css("height", "unset");
        $("#updateProfileImgResults").html("");
        $(this).parent().find("input").value = "";
        $(this).parent().find("label").removeClass("custom-label-sm");
    });


    $(document).on("click", "#userImgDropdown", function () {
        setTimeout(function () {
            $("#userDropdown").addClass("d-block");
        }, 100);
    });

    $(document).on("click", function(event) {
        if (!$(event.target).closest('#userDropdown').length && !$(event.target).is('#userImgDropdown')) {
            $("#userDropdown").removeClass("d-block");
        }
        if (!$(event.target).closest('#chatBox').length && !$(event.target).is('#chatBox')) {
            $("#chatBox").removeClass("d-block");
        }
        if (!$(event.target).closest('#notificationBox').length && !$(event.target).is('#notificationBox')) {
            $("#notificationBox").removeClass("d-block");
        }
    });

    $("#chatIcon").on("click", function () {
        setTimeout(function () {
          $("#chatBox").addClass("d-block");
        }, 100);
    });

    $("#notificationIco").on("click", function () {
        setTimeout(function () {
          $("#notificationBox").addClass("d-block");
        }, 100);
    });

    $("#profileInputSlider").slider({
        step: 500,
        range: true,
        min: 0,
        max: 13000,
        values: [0, 13000],
        slide: function (event, ui) {
          $("#profileSliderInput").val(ui.values[0] + " - " + ui.values[1]);
        },
    });
    $("#profileSliderInput").val(
        $("#profileInputSlider").slider("values", 0) +
        " - " +
        $("#profileInputSlider").slider("values", 1)
    );



      // crete post modal start
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




  $(window).scroll(function () {
    if ($(this).scrollTop() === 0) {
      $(".header").removeClass("active");
    } else {
      $(".header").addClass("active");
    }
  });


  $(".auto-height-textarea")
    .each(function () {
      this.setAttribute(
        "style",
        "height:" + this.scrollHeight + "px;overflow-y:hidden;"
      );
    })
    .on("input", function () {
      this.style.height = "auto";
      this.style.height = this.scrollHeight + "px";
    });
  $("textarea").on("keyup", function () {
    var textareaValue = $("textarea").val().length;
    if (textareaValue >= 1) {
      $("#createStorySubmit").prop("disabled", false);
    } else {
      $("#createStorySubmit").prop("disabled", true);
    }
  });
  $(".red").on("click", function () {
    $("#storyLabel").css("background-color", "red");
  });
  $(".green").on("click", function () {
    $("#storyLabel").css("background-color", "green");
  });
  $(".blue").on("click", function () {
    $("#storyLabel").css("background-color", "blue");
  });



  let headerHeight = $(".header").height();

  let sideMenuHeight = $(".custom-side-menu").height();
  $(".main-content").css("margin-top", headerHeight);
  $(".custom-side-menu").css("top", headerHeight);
  $(".custom-side-menu").css("height", sideMenuHeight - headerHeight);


  $("#header-bg").on("click", function () {
    // $(".header").toggleClass("bg-white");
    $('#exampleModal').modal('show');
  });

  var shareBtn = $(".share-btn");
  $(shareBtn).on("click", function () {
    console.log("One clicke");
    $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .find(".custom-share-box")
      .addClass("d-block");
  });


  $("#eventPhysical").change(function () {
    if ($(this).is(":checked")) {
      $(".event-map").addClass("d-block");
      $(".event-map").removeClass("d-none");
    } else {
      $(".event-map").addClass("d-none");
      $(".event-map").removeClass("d-block");
    }
  });

  var videoPlayer = $("video");
  videoPlayer.on("timeupdate", function () {
    onTrackedVideoFrame(this.currentTime, this.duration);
    function onTrackedVideoFrame(currentTime, duration) {
    //   console.log(currentTime);
      var perc = (100 * videoPlayer[0].currentTime) / videoPlayer[0].duration;
      videoPlayer
        .parent()
        .find(".progress-bar")
        .css("width", perc + "%");
    }
  });

  $(".story-controls .play-btn").on("click", function () {
    if ($(".story-content video")[0].paused) {
      $("video")[0].play();
    } else {
      $("video")[0].pause();
    }
    $(this).toggleClass("active");
  });
  $(".story-controls .mute-btn").on("click", function () {
    if ($("video").prop("muted", true)) {
      $("video").prop("muted", false);
    } else {
      $("video").prop("muted", true);
    }
    $(this).toggleClass("active");
  });

  $(".interest-list .form-check-input").on("change", function () {
    if ($(this).is(":checked")) {
      $(this).parent().find("label").addClass("active");
    } else {
      $(this).parent().find("label").removeClass("active");
    }
  });

  // modal with img preview start
  $(".reset-input-btn").on("click", function () {
    $(this).addClass("d-none");
    $("#cteProfileImgResults").html("");
    $("#cteStoryImgResults").html("");
    $("#ctePostImgResults").html("").css("height", "unset");
    $("#updateProfileImgResults").html("");
    $(this).parent().find("input").value = "";
    $(this).parent().find("label").removeClass("custom-label-sm");
  });
  $("#cteAccImgProfInput").change(function (event) {
    // $(this).value("");
    $("#cteProfileImgResults").html("");
    $("#cteProfileImgResults").removeClass("gallery, post-input-slider");
    if ($(this).get(0).files.length == 1) {
      $("#cteProfileImgResults").addClass("single-post");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          '<img class="" src=' +
          URL.createObjectURL(event.target.files[i]) +
          ">";
        $("#cteProfileImgResults").append(fileItem);
      }
    } else if ($(this).get(0).files.length <= 3) {
      $("#cteProfileImgResults").addClass("gallery");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          "<div><img src=" +
          URL.createObjectURL(event.target.files[i]) +
          "></div>";
        $("#cteProfileImgResults").append(fileItem);
      }
      setTimeout(function () {
        $("#cteProfileImgResults.gallery").GridHorizontal({
          minWidth: 456,
          maxRowHeight: 300,
          gutter: 2,
        });
      }, 200);
    } else {
      $("#cteProfileImgResults").addClass("post-input-slider");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          "<div><img src=" +
          URL.createObjectURL(event.target.files[i]) +
          "></div>";
        $("#cteProfileImgResults").append(fileItem);
      }
    }

    if ($(this).val()) {
      $(this).parent().find("label").addClass("custom-label-sm");
      $(this).parent().find(".btn").removeClass("d-none");
      $(".create-acc-slider .slick-list").css("height", "unset");
    } else {
      $(this).parent().find("label").removeClass("custom-label-sm");
      $(this).parent().find(".btn").addClass("d-none");
      $(this).get(0).reset();
    }
    var thisValue = $(this).value;
    console.log(thisValue);
  });
  $("#cteStoryImgInput").change(function (event) {

    $("#cteStoryImgResults").html("");
    $("#ctestoryImgResults").removeClass("gallery, post-input-slider");
    if ($(this).get(0).files.length == 1) {
      $("#cteStoryImgResults").addClass("single-post");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          "<img src=" + URL.createObjectURL(event.target.files[i]) + ">";
        $("#cteStoryImgResults").append(fileItem);
      }
    }

    if ($(this).val()) {
      $(this).parent().find("label").addClass("custom-label-sm");
      $(this).parent().find(".btn").removeClass("d-none");
      $(".create-acc-slider .slick-list").css("height", "unset");
      $(this).siblings(".custom-text-area").removeClass("d-none");
    } else {
      $(this).parent().find("label").removeClass("custom-label-sm");
      $(this).parent().find(".btn").addClass("d-none");
      $(this).get(0).reset();
      $("#storyImg-text").get(0).reset();
      $(this).siblings(".custom-text-area").addClass("d-none");
    }
  });


  $("#ctePostFilesInput").change(function (event) {

    $("#ctePostImgResults").html("");
    $("#ctePostImgResults").removeClass(
      "single-post gallery post-input-slider"
    );
    if ($(this).get(0).files.length == 1) {
      $("#ctePostImgResults").addClass("single-post");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem = '<img class="" src=' + URL.createObjectURL(event.target.files[i]) + ">";
        $("#ctePostImgResults").append(fileItem);
      }

    } else if ($(this).get(0).files.length <= 3) {
      $("#ctePostImgResults").addClass("gallery");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          "<div><img src=" +
          URL.createObjectURL(event.target.files[i]) +
          "></div>";
        $("#ctePostImgResults").append(fileItem);
      }
      setTimeout(function () {
        $("#ctePostImgResults.gallery").GridHorizontal({
          minWidth: 456,
          maxRowHeight: 300,
          gutter: 2,
        });
      }, 200);
    } else if ($(this).get(0).files.length >= 4) {
      $("#ctePostImgResults").addClass("post-input-slider");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          "<div><img src=" +
          URL.createObjectURL(event.target.files[i]) +
          "></div>";
        $("#ctePostImgResults").append(fileItem);
      }
      $(".post-input-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: true,
        adaptiveHeight: true,
        infinite: false,
      });
    }

    if ($(this).val()) {
      $(this).parent().find("label").addClass("custom-label-sm");
      $(this).parent().find(".btn").removeClass("d-none");
    } else {
      $(this).parent().find("label").removeClass("custom-label-sm");
      $(this).parent().find(".btn").addClass("d-none");
      $(this).get(0).reset();
    }
  });

  $(document).on("change","#background",function (event) {

    $("#background").html("");
    $("#background").removeClass(
      "single-post gallery post-input-slider"
    );

    if ($(this).get(0).files.length == 1) {
      $("#background").addClass("single-post");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem = '<img class="" src=' + URL.createObjectURL(event.target.files[i]) + ">";
        $("#background").append(fileItem);
      }

    } else if ($(this).get(0).files.length <= 3) {
      $("#background").addClass("gallery");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          "<div><img src=" +
          URL.createObjectURL(event.target.files[i]) +
          "></div>";
        $("#background").append(fileItem);
      }
      setTimeout(function () {
        $("#background.gallery").GridHorizontal({
          minWidth: 456,
          maxRowHeight: 300,
          gutter: 2,
        });
      }, 200);
    } else if ($(this).get(0).files.length >= 4) {
      $("#background").addClass("post-input-slider");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          "<div><img src=" +
          URL.createObjectURL(event.target.files[i]) +
          "></div>";
        $("#background").append(fileItem);
      }
      $(".post-input-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: true,
        adaptiveHeight: true,
        infinite: false,
      });
    }

    if ($(this).val()) {
      $(this).parent().find("label").addClass("custom-label-sm");
      $(this).parent().find(".btn").removeClass("d-none");
    } else {
      $(this).parent().find("label").removeClass("custom-label-sm");
      $(this).parent().find(".btn").addClass("d-none");
      $(this).get(0).reset();
    }
  });



  $("#updateImgProfInput").change(function (event) {
    $("#updateProfileImgResults").html("");
    $("#updateProfileImgResults").removeClass(
      "single-post gallery post-input-slider"
    );
    if ($(this).get(0).files.length == 1) {
      $("#updateProfileImgResults").addClass("single-post");
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        var fileItem =
          '<img class="" src=' +
          URL.createObjectURL(event.target.files[i]) +
          ">";
        $("#updateProfileImgResults").append(fileItem);
      }
    }

    if ($(this).val()) {
      $(this).parent().find("label").addClass("custom-label-sm");
      $(this).parent().find(".btn").removeClass("d-none");
    } else {
      $(this).parent().find("label").removeClass("custom-label-sm");
      $(this).parent().find(".btn").addClass("d-none");
      $(this).get(0).reset();
    }
  });
  // modal with img preview end

  $(".video-list-card .card-video-wrapper").mouseenter(function () {
    $(this).find("video").get(0).play();
    $(this).find(".btn").css("display", "none");
  });
  $(".video-list-card .card-video-wrapper").mouseleave(function () {
    $(this).find("video").get(0).currentTime = 0;
    $(this).find(".btn").css("display", "flex");
    $(this).find("video").get(0).pause();
  });



  // range input for
  $("#price-range").slider({
    step: 5,
    range: true,
    min: 0,
    max: 30,
    values: [0, 30],
    slide: function (event, ui) {
      $("#priceRange").val(ui.values[0] + " - " + ui.values[1]);
    },
  });
  $("#priceRange").val(
    $("#price-range").slider("values", 0) +
    " - " +
    $("#price-range").slider("values", 1)
  );

  $("#covid-risk").slider({
    step: 2,
    range: true,
    min: 0,
    max: 10,
    values: [2, 8],
    slide: function (event, ui) {
      $("#covidRisk").val(ui.values[0] + " - " + ui.values[1]);
    },
  });
  $("#covidRisk").val(
    $("#covid-risk").slider("values", 0) +
    " - " +
    $("#covid-risk").slider("values", 1)
  );



  // $(".dropdown-menu").forEach(function (element) {
  //   element.addEventListener("click", function (e) {
  //     e.stopPropagation();
  //   });
  // });

  // $("#createAcc").modal("show");




  $("#headerSearch2").on("click", function () {
    $("#searchResultBox").addClass("d-block");
    $(this).parent().addClass("active");
  });




  $(document).click(function (event) {
    if (!$(event.target).closest("#headerSearch2, #searchResultBox, #chatBox").length) {
      $('#headerSearch2').parent().removeClass('active');
      $("#searchResultBox").removeClass("d-block");
    }
    if (!$(event.target).closest("#userDropdown").length) {
      $("#userDropdown").removeClass("d-block");
    }
    if (!$(event.target).closest("#chatBox").length) {
      $("#chatBox").removeClass("d-block");
    }
    if (!$(event.target).closest("#notificationBox").length) {
      $("#notificationBox").removeClass("d-block");
    }
  });


  $("#chatBox .chats .list-item a").on("click", function () {
    $("#chatBox").removeClass("d-block");
    $("#chatSingleBox").addClass("d-block");
  });
  $("#closeChatSingleBox").on("click", function () {
    $("#chatSingleBox").removeClass("d-block");
  });

    $(".chat-file-uploader").aksFileUpload({
      input: "#chatfile",
      dragDrop: true,
      maxSize: "50 MB",
      multiple: true,
      maxFile: 50,
      label: "<i class='fab fa-paperclip'></i>"
    });

});



$(window).on('load', function () {
  $('.main-content').removeClass('shimmer')
});
if (window.innerWidth < 992) {
  // close all inner dropdowns when parent is closed
  document
    .querySelectorAll(".navbar .dropdown")
    .forEach(function (everydropdown) {
      everydropdown.addEventListener("hidden.bs.dropdown", function () {
        // after dropdown is hidden, then find all submenus
        this.querySelectorAll(".submenu").forEach(function (everysubmenu) {
          // hide every submenu as well
          everysubmenu.style.display = "none";
        });
      });
    });

  document.querySelectorAll(".dropdown-menu a").forEach(function (element) {
    element.addEventListener("click", function (e) {
      let nextEl = this.nextElementSibling;
      if (nextEl && nextEl.classList.contains("submenu")) {
        // prevent opening link if link needs to open dropdown
        e.preventDefault();
        console.log(nextEl);
        if (nextEl.style.display == "block") {
          nextEl.style.display = "none";
        } else {
          nextEl.style.display = "block";
        }
      }
    });
  });
}
