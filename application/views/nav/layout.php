<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from friendkit.cssninja.io/sidebar-v1-groups.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 09:23:24 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/logo/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/assets/css/fontisto-brands.min.css" rel="stylesheet">


    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/core.css">
</head>

<body>

    <!-- Pageloader -->
    <!--<div class="pageloader"></div>-->
    <!--<div class="infraloader is-active"></div>-->
    <!--<div class="app-overlay is-sidebar-v1"></div>-->

    <?php $this->load->view('nav/sidenav') ?>
    <div class="view-wrapper is-sidebar-v1 is-fold">

        <?php $this->load->view('nav/fixednav') ?>

        <!-- Container -->
        <div id="posts-feed" class="container" data-open-sidebar data-page-title="<?php echo $pageTitle; ?>">

            <?php $this->load->view('nav/topnav') ?>
          
          <?php $this->load->view($subPage) ?>

        </div>
    </div>



    <!-- Concatenated js plugins and jQuery -->
    <script src="<?php echo base_url() ?>public/assets/js/app.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?php echo base_url() ?>assets/data/tipuedrop_content.js"></script>

    <!-- Core js -->
    <script src="<?php echo base_url() ?>public/assets/js/global.js"></script>

    <!-- Navigation options js -->
    <script src="<?php echo base_url() ?>public/assets/js/navbar-v1.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/navbar-v2.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/navbar-mobile.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/navbar-options.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/sidebar-v1.js"></script>

    <!-- Core instance js -->
    <script src="<?php echo base_url() ?>public/assets/js/main.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/chat.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/touch.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/tour.js"></script>

    <!-- Components js -->
    <script src="<?php echo base_url() ?>public/assets/js/explorer.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/widgets.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/modal-uploader.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/popovers-users.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/popovers-pages.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/lightbox.js"></script>
     <script src="<?php echo base_url() ?>public/assets/js/feed.js"></script>

    <script src="<?php echo base_url() ?>public/assets/js/webcam.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/compose.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/autocompletes.js"></script>
     <script src="<?php echo base_url() ?>assets/js/shop.js"></script>
     <script>
        //Fetch Post
        function fetchpost() {
            $.ajax({
                url: '<?php echo base_url() . 'index.php/Post/fetchpost' ?>',
                method: 'get',

                success: function(response) {
                    $(".likedata").html(response);
                }
            });
        }

        //Create Post
        $(".post").click(function() {
            var caption = $(".caption").val();
            var image = $(".image").val();

            if (image != "") {
                var postType = "image";
            } else {
                var postType = "text";
            }

            if ($('#checkbox-2').is(":checked") && $('#checkbox-1').is(":checked")) {
                var content_type = "";
            } else if ($('#checkbox-2').is(":checked")) {
                var content_type = "story";
            } else if ($('#checkbox-1').is(":checked")) {
                var content_type = "feeds";
            } else {
                var content_type = "feeds";
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . 'index.php/Post/createpost' ?>',
                data: {
                    'caption': caption,
                    'postType': postType,
                    'content_type': content_type,
                },
                success: function(response) {
                    location.reload(true);
                }
            })



        });

        // Post Like Script
        function savelike(postId) {
            $.ajax({
                url: "<?php echo base_url() . 'index.php/Post/likepost' ?>",
                type: "post",
                data: {
                    'postId': postId,
                },
                success: function(response) {

                }
            });
        }

        //Fetch Post Comment
        function fetchcomment(postId) {
            $.ajax({
                url: "<?php echo base_url() . 'index.php/Home/fetchcomment' ?>",
                type: "post",
                data: {
                    'postId': postId,
                },
                success: function(response) {
                    $(".comment").html(response);
                }
            });
        }
          (function (e) {
      e.fn.tipuedrop = function (t) {
          var n = e.extend({ show: 5, speed: 300, newWindow: !1, mode: "static", contentLocation: "http://marianatech.co.uk/Home/fetchUsers" }, t);
          return this.each(function () {
              var t = { pages: [] };
              e.ajaxSetup({ async: !1 }),
                  "json" == n.mode &&
                      e.getJSON(n.contentLocation).done(function (n) {
                          t = e.extend({}, n);
                      }),
                  "static" == n.mode && (t = e.extend({}, tipuedrop)),
                  e(this).keyup(function (i) {
                      !(function (i) {
                          if (i.val()) {
                              for (var o = 0, r = 0; r < t.pages.length; r++) {
                                  var a = new RegExp(i.val(), "i");
                                  if ((-1 != t.pages[r].title.search(a) || -1 != t.pages[r].text.search(a)) && o < n.show) {
                                      if (0 == o) var s = '<div class="tipue_drop_box"><div id="tipue_drop_wrapper">';
                                      (s += '<a href="' + t.pages[r].url + '"'),
                                          n.newWindow && (s += ' target="_blank"'),
                                          (s +=
                                              '><div class="tipue_drop_item"><div class="tipue_drop_left"><img src="' +
                                              t.pages[r].thumb +
                                              '" class="tipue_drop_image"></div><div class="tipue_drop_right">' +
                                              t.pages[r].title +
                                              "<div>" +
                                              t.pages[r].text +
                                              "</div></div></div></a>"),
                                          o++;
                                  }
                              }
                              0 != o && ((s += "</div></div>"), e("#tipue_drop_content").html(s), e("#tipue_drop_content").fadeIn(n.speed), e("#tipue_drop_content_mobile").html(s), e("#tipue_drop_content_mobile").fadeIn(n.speed));
                          } else e("#tipue_drop_content").fadeOut(n.speed), e("#tipue_drop_content_mobile").fadeOut(n.speed);
                      })(e(this));
                  }),
                  e("html").click(function () {
                      e("#tipue_drop_content").fadeOut(n.speed), e("#tipue_drop_content_mobile").fadeOut(n.speed);
                  });
          });
      };
  })(jQuery),
    </script>


</body>


</html>
