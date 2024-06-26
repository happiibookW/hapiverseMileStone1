<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from friendkit.cssninja.io/sidebar-v1-profile-friends.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 09:23:26 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Hapiverse | Friend List</title>
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQHJPZP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <div class="app-overlay is-sidebar-v1"></div>

    <?php $this->load->view('nav/sidenav') ?>
    <div class="view-wrapper is-sidebar-v1 is-fold">

    <?php $this->load->view('nav/fixednav') ?>

        <!-- Container -->
        <div id="profile-friends" class="container sidebar-boxed" data-open-sidebar data-page-title="Friends">

            <?php $this->load->view('nav/topnav') ?>
            <!-- Profile page main wrapper -->
            <div class="view-wrap is-headless">
                <div class="columns is-multiline no-margin">
                    <!-- Left side column -->
                    <div class="column is-paddingless">
                        <!-- Timeline Header -->
                        <!-- html/partials/pages/profile/timeline/timeline-header.html -->
                        <div class="cover-bg">
                            
                            
                            <!--/html/partials/pages/profile/timeline/dropdowns/timeline-mobile-dropdown.html-->
                            <div class="dropdown is-spaced is-right is-accent dropdown-trigger timeline-mobile-dropdown is-hidden-desktop">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="profile-main.html" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="activity"></i>
                                                <div class="media-content">
                                                    <h3>Timeline</h3>
                                                    <small>Open Timeline.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="profile-about.html" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="align-right"></i>
                                                <div class="media-content">
                                                    <h3>About</h3>
                                                    <small>See about info.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="profile-friends.html" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="heart"></i>
                                                <div class="media-content">
                                                    <h3>Friends</h3>
                                                    <small>See friends.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="profile-photos.html" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="image"></i>
                                                <div class="media-content">
                                                    <h3>Photos</h3>
                                                    <small>See all photos.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>

                </div>

                <div class="columns">
                    <div class="column">
                        <div class="box-heading">
                           

                        <div class="control heading-search">
                            <input type="text" class="input is-rounded" placeholder="Search Friends...">
                            <div class="search-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>

                    <!--Friends grid-->
                    <div class="friends-grid">
                        <div class="columns is-multiline">
                            <!--Friend item-->
                            <?php if(!empty($friend)  ) { foreach ($friend as $friend) { ?>
                            <div class="column is-3">
                                <a href="<?php echo base_url("Home/profile/".$friend->userId); ?>" class="friend-item has-text-centered">
                                    <div class="avatar-wrap">
                                        <div class="circle"></div>
                                        <div class="chat-button">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                        <img src="<?php echo base_url().'/'.$friend->profileImageUrl ?>" alt="">
                                    </div>
                                    <h3><?php echo $friend->userName ?></h3>
                                </a>
                            </div>
                            <?php } } else { ?>
                             <h4 class="alert alert-warning" style="width: 100%;text-align:center"><?php echo $message ?></h4>
                                <?php } ?>
                        </div>
                    </div>

                    <!-- Load more photos -->
                    <!--<div class=" load-more-wrap has-text-centered">-->
                    <!--    <a href="#" class="load-more-button">Load More</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>

    </div>


    <!-- Change cover image modal -->
    <!--html/partials/pages/profile/timeline/modals/change-cover-modal.html-->
    <div id="change-cover-modal" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Update Cover</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Placeholder -->
                    <div class="selection-placeholder">
                        <div class="columns">
                            <div class="column is-6">
                                <!-- Selection box -->
                                <div class="selection-box modal-trigger" data-modal="upload-crop-cover-modal">
                                    <div class="box-content">
                                        <img src="<?php echo base_url() ?>assets/img/illustrations/profile/upload-cover.svg" alt="">
                                        <div class="box-text">
                                            <span>Upload</span>
                                            <span>From your computer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <!-- Selection box -->
                                <div class="selection-box modal-trigger" data-modal="user-photos-modal">
                                    <div class="box-content">
                                        <img src="<?php echo base_url() ?>assets/img/illustrations/profile/change-cover.svg" alt="">
                                        <div class="box-text">
                                            <span>Choose</span>
                                            <span>From your photos</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Change profile pic modal -->
    <!--html/partials/pages/profile/timeline/modals/change-profile-pic-modal.html-->
    <div id="change-profile-pic-modal" class="modal change-profile-pic-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Update Profile Picture</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Placeholder -->
                    <div class="selection-placeholder">
                        <div class="columns">
                            <div class="column is-6">
                                <!-- Selection box -->
                                <div class="selection-box modal-trigger" data-modal="upload-crop-profile-modal">
                                    <div class="box-content">
                                        <img src="<?php echo base_url() ?>assets/img/illustrations/profile/change-profile.svg" alt="">
                                        <div class="box-text">
                                            <span>Upload</span>
                                            <span>From your computer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <!-- Selection box -->
                                <div class="selection-box modal-trigger" data-modal="user-photos-modal">
                                    <div class="box-content">
                                        <img src="<?php echo base_url() ?>assets/img/illustrations/profile/upload-profile.svg" alt="">
                                        <div class="box-text">
                                            <span>Choose</span>
                                            <span>From your photos</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- User photos and albums -->
    <!--html/partials/pages/profile/timeline/modals/user-photos-modal.html-->
    <div id="user-photos-modal" class="modal user-photos-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <!-- Card -->
            <div class="card">
                <div class="card-heading">
                    <h3>Choose a picture</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- Tabs -->
                    <div class="nav-tabs-wrapper">
                        <div class="tabs">
                            <ul class="is-faded">
                                <li class="is-active" data-tab="recent-photos"><a>Recent</a></li>
                                <li data-tab="all-photos"><a>Photos</a></li>
                                <li data-tab="photo-albums"><a>Albums</a></li>
                            </ul>
                        </div>

                        <!-- Recent Photos -->
                        <div id="recent-photos" class="tab-content has-slimscroll-md is-active">
                            <!-- Grid -->
                            <div class="image-grid">
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/3.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/4.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/9.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/2.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/13.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/11.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/17.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/22.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/8.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/18.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/20.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/21.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- All photos -->
                        <div id="all-photos" class="tab-content has-slimscroll-md">
                            <!-- Grid -->
                            <div class="image-grid">
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/19.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/25.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/23.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/28.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/34.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/27.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/18.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/30.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/26.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/29.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/20.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/17.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/11.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/24.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/32.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/31.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/33.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/35.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Load more images -->
                            <div class=" load-more-wrap has-text-centered">
                                <a href="#" class="load-more-button">Load More</a>
                            </div>
                            <!-- /Load more images -->
                        </div>

                        <!-- Albums -->
                        <div id="photo-albums" class="tab-content has-slimscroll-md">
                            <!-- Grid -->
                            <div class="albums-grid">
                                <div class="columns is-multiline">
                                    <!-- Album item -->
                                    <div class="column is-6">
                                        <div class="album-wrapper" data-album="album-photos-1">
                                            <div class="album-image">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/35.jpg" alt="">
                                            </div>
                                            <div class="album-meta">
                                                <div class="album-title">
                                                    <span>Design and Colors</span>
                                                    <span>Added on sep 06 2018</span>
                                                </div>
                                                <div class="image-count">
                                                    <i data-feather="image"></i>
                                                    <span>8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Album item -->
                                    <div class="column is-6">
                                        <div class="album-wrapper" data-album="album-photos-2">
                                            <div class="album-image">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/19.jpg" alt="">
                                            </div>
                                            <div class="album-meta">
                                                <div class="album-title">
                                                    <span>Friends and Family</span>
                                                    <span>Added on jun 10 2016</span>
                                                </div>
                                                <div class="image-count">
                                                    <i data-feather="image"></i>
                                                    <span>29</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Album item -->
                                    <div class="column is-6">
                                        <div class="album-wrapper" data-album="album-photos-3">
                                            <div class="album-image">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/4.jpg" alt="">
                                            </div>
                                            <div class="album-meta">
                                                <div class="album-title">
                                                    <span>Trips and Travel</span>
                                                    <span>Added on feb 14 2017</span>
                                                </div>
                                                <div class="image-count">
                                                    <i data-feather="image"></i>
                                                    <span>12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Album item -->
                                    <div class="column is-6">
                                        <div class="album-wrapper" data-album="album-photos-4">
                                            <div class="album-image">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/3.jpg" alt="">
                                            </div>
                                            <div class="album-meta">
                                                <div class="album-title">
                                                    <span>Summer 2017</span>
                                                    <span>Added on aug 23 2017</span>
                                                </div>
                                                <div class="image-count">
                                                    <i data-feather="image"></i>
                                                    <span>32</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Album item -->
                                    <div class="column is-6">
                                        <div class="album-wrapper" data-album="album-photos-5">
                                            <div class="album-image">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/20.jpg" alt="">
                                            </div>
                                            <div class="album-meta">
                                                <div class="album-title">
                                                    <span>Winter 2017</span>
                                                    <span>Added on jan 07 2017</span>
                                                </div>
                                                <div class="image-count">
                                                    <i data-feather="image"></i>
                                                    <span>7</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Album item -->
                                    <div class="column is-6">
                                        <div class="album-wrapper" data-album="album-photos-6">
                                            <div class="album-image">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/2.jpg" alt="">
                                            </div>
                                            <div class="album-meta">
                                                <div class="album-title">
                                                    <span>Thanksgiving 2017</span>
                                                    <span>Added on nov 30 2017</span>
                                                </div>
                                                <div class="image-count">
                                                    <i data-feather="image"></i>
                                                    <span>6</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Grid | Design and colors -->
                            <div id="album-photos-1" class="album-image-grid is-hidden">
                                <div class="album-info">
                                    <h4>Design and Colors | <small>8 photo(s)</small></h4>
                                    <a class="close-nested-photos">Go Back</a>
                                </div>
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/35.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/17.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/30.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/28.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/32.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/27.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/18.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/26.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Load more images -->
                                <div class=" load-more-wrap has-text-centered">
                                    <a href="#" class="load-more-button">Load More</a>
                                </div>
                                <!-- /Load more images -->
                            </div>

                            <!-- Hidden Grid | Friends and Family -->
                            <div id="album-photos-2" class="album-image-grid is-hidden">
                                <div class="album-info">
                                    <h4>Friends and Family | <small>29 photo(s)</small></h4>
                                    <a class="close-nested-photos">Go Back</a>
                                </div>
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/23.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/22.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/19.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/20.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/2.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/21.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/38.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/36.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/37.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Load more images -->
                                <div class=" load-more-wrap has-text-centered">
                                    <a href="#" class="load-more-button">Load More</a>
                                </div>
                                <!-- /Load more images -->
                            </div>

                            <!-- Hidden Grid | Trips and Travel -->
                            <div id="album-photos-3" class="album-image-grid is-hidden">
                                <div class="album-info">
                                    <h4>Trips and Travel | <small>12 photo(s)</small></h4>
                                    <a class="close-nested-photos">Go Back</a>
                                </div>
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/4.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/6.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/5.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/38.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/37.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/18.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/19.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/3.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/32.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Grid | Summer 2017 -->
                            <div id="album-photos-4" class="album-image-grid is-hidden">
                                <div class="album-info">
                                    <h4>Summer 2017 | <small>32 photo(s)</small></h4>
                                    <a class="close-nested-photos">Go Back</a>
                                </div>
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/4.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/6.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/5.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/38.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/37.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/18.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/19.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/3.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/32.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Load more images -->
                                <div class=" load-more-wrap has-text-centered">
                                    <a href="#" class="load-more-button">Load More</a>
                                </div>
                                <!-- /Load more images -->
                            </div>

                            <!-- Hidden Grid | Winter 2017 -->
                            <div id="album-photos-5" class="album-image-grid is-hidden">
                                <div class="album-info">
                                    <h4>Winter 2017 | <small>7 photo(s)</small></h4>
                                    <a class="close-nested-photos">Go Back</a>
                                </div>
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/22.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/24.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/36.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/25.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/2.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/8.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/12.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Grid | Thanksgiving 2017 -->
                            <div id="album-photos-6" class="album-image-grid is-hidden">
                                <div class="album-info">
                                    <h4>Thanksgiving 2017 | <small>6 photo(s)</small></h4>
                                    <a class="close-nested-photos">Go Back</a>
                                </div>
                                <div class="columns is-multiline">
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/23.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/22.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/19.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/20.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/2.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Grid item -->
                                    <div class="column is-4">
                                        <div class="grid-image">
                                            <input type="radio" name="selected_photos">
                                            <div class="inner">
                                                <img src="https://via.placeholder.com/1600x900" data-demo-src="<?php echo base_url() ?>assets/img/demo/unsplash/21.jpg" alt="">
                                                <div class="inner-overlay"></div>
                                                <div class="indicator gelatine">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="button is-solid accent-button replace-button is-disabled">Use Picture</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Profile picture crop modal -->
    <!--html/partials/pages/profile/timeline/modals/upload-crop-profile-modal.html-->
    <div id="upload-crop-profile-modal" class="modal upload-crop-profile-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Upload Picture</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <label class="profile-uploader-box" for="upload-profile-picture">
                        <span class="inner-content">
                                    <img src="<?php echo base_url() ?>assets/img/illustrations/profile/add-profile.svg" alt="">
                                    <span>Click here to <br>upload a profile picture</span>
                        </span>
                        <input type="file" id="upload-profile-picture" accept="image/*">
                    </label>
                    <div class="upload-demo-wrap is-hidden">
                        <div id="upload-profile"></div>
                        <div class="upload-help">
                            <a id="profile-upload-reset" class="profile-reset is-hidden">Reset Picture</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="submit-profile-picture" class="button is-solid accent-button is-fullwidth raised is-disabled">Use Picture</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Cover image crop modal -->
    <!--html/partials/pages/profile/timeline/modals/upload-crop-cover-modal.html-->
    <div id="upload-crop-cover-modal" class="modal upload-crop-cover-modal is-large has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Upload Cover</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <label class="cover-uploader-box" for="upload-cover-picture">
                        <span class="inner-content">
                                    <img src="<?php echo base_url() ?>assets/img/illustrations/profile/add-cover.svg" alt="">
                                    <span>Click here to <br>upload a cover image</span>
                        </span>
                        <input type="file" id="upload-cover-picture" accept="image/*">
                    </label>
                    <div class="upload-demo-wrap is-hidden">
                        <div id="upload-cover"></div>
                        <div class="upload-help">
                            <a id="cover-upload-reset" class="cover-reset is-hidden">Reset Picture</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="submit-cover-picture" class="button is-solid accent-button is-fullwidth raised is-disabled">Use
                        Picture</button>
                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="chat-wrapper">
        <div class="chat-inner">

            <!-- Chat top navigation -->
            <div class="chat-nav">
                <div class="nav-start">
                    <div class="recipient-block">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/dan.jpg" alt="">
                        </div>
                        <div class="username">
                            <span>Dan Walker</span>
                            <span><i data-feather="star"></i> <span>| Online</span></span>
                        </div>
                    </div>
                </div>
                <div class="nav-end">

                    <!-- Settings icon dropdown -->
                    <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                        <div>
                            <a class="chat-nav-item is-icon">
                                <i data-feather="settings"></i>
                            </a>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="message-square"></i>
                                        <div class="media-content">
                                            <h3>Details</h3>
                                            <small>View this conversation's details.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="settings"></i>
                                        <div class="media-content">
                                            <h3>Preferences</h3>
                                            <small>Define your preferences.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="bell"></i>
                                        <div class="media-content">
                                            <h3>Notifications</h3>
                                            <small>Set notifications settings.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="bell-off"></i>
                                        <div class="media-content">
                                            <h3>Silence</h3>
                                            <small>Disable notifications.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="box"></i>
                                        <div class="media-content">
                                            <h3>Archive</h3>
                                            <small>Archive this conversation.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="trash-2"></i>
                                        <div class="media-content">
                                            <h3>Delete</h3>
                                            <small>Delete this conversation.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-search">
                        <div class="control has-icon">
                            <input type="text" class="input" placeholder="Search messages">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="chat-nav-item is-icon is-hidden-mobile">
                        <i data-feather="at-sign"></i>
                    </a>
                    <a class="chat-nav-item is-icon is-hidden-mobile">
                        <i data-feather="star"></i>
                    </a>

                    <!-- More dropdown -->
                    <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                        <div>
                            <a class="chat-nav-item is-icon no-margin">
                                <i data-feather="more-vertical"></i>
                            </a>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="file-text"></i>
                                        <div class="media-content">
                                            <h3>Files</h3>
                                            <small>View all your files.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="users"></i>
                                        <div class="media-content">
                                            <h3>Users</h3>
                                            <small>View all users you're talking to.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="gift"></i>
                                        <div class="media-content">
                                            <h3>Daily bonus</h3>
                                            <small>Get your daily bonus.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="download-cloud"></i>
                                        <div class="media-content">
                                            <h3>Downloads</h3>
                                            <small>See all your downloads.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="life-buoy"></i>
                                        <div class="media-content">
                                            <h3>Support</h3>
                                            <small>Reach our support team.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="chat-nav-item is-icon close-chat">
                        <i data-feather="x"></i>
                    </a>
                </div>
            </div>
            <!-- Chat sidebar -->
            <div id="chat-sidebar" class="users-sidebar">
                <!-- Header -->
                <div class="header-item">
                    <img class="light-image" src="<?php echo base_url() ?>assets/img/logo/friendkit-bold.svg" alt="">
                    <img class="dark-image" src="<?php echo base_url() ?>assets/img/logo/friendkit-white.svg" alt="">
                </div>
                <!-- User list -->
                <div class="conversations-list has-slimscroll-xs">
                    <!-- User -->
                    <div class="user-item is-active" data-chat-user="dan" data-full-name="Dan Walker" data-status="Online">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/dan.jpg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="stella" data-full-name="Stella Bergmann" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/stella.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="daniel" data-full-name="Daniel Wellington" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/daniel.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="david" data-full-name="David Kim" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/david.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="edward" data-full-name="Edward Mayers" data-status="Online">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/edward.jpeg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="elise" data-full-name="Elise Walker" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/elise.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="nelly" data-full-name="Nelly Schwartz" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/nelly.png" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="milly" data-full-name="Milly Augustine" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/milly.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                </div>
                <!-- Add Conversation -->
                <div class="footer-item">
                    <div class="add-button modal-trigger" data-modal="add-conversation-modal"><i data-feather="user"></i></div>
                </div>
            </div>

            <!-- Chat body -->
            <div id="chat-body" class="chat-body is-opened">
                <!-- Conversation with Dan -->
                <div id="dan-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:03am</span>
                            <div class="message-text">Hi Jenna! I made a new design, and i wanted to show it to you.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:03am</span>
                            <div class="message-text">It's quite clean and it's inspired from Bulkit.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:12am</span>
                            <div class="message-text">Oh really??! I want to see that.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:13am</span>
                            <div class="message-text">FYI it was done in less than a day.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:17am</span>
                            <div class="message-text">Great to hear it. Just send me the PSD files so i can have a look at it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:18am</span>
                            <div class="message-text">And if you have a prototype, you can also send me the link to it.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Stella -->
                <div id="stella-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>10:34am</span>
                            <div class="message-text">Hey Stella! Aren't we supposed to go the theatre after work?.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>10:37am</span>
                            <div class="message-text">Just remembered it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/stella.jpg" alt="">
                        <div class="message-block">
                            <span>11:22am</span>
                            <div class="message-text">Yeah you always do that, forget about everything.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Daniel -->
                <div id="daniel-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Yesterday</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>3:24pm</span>
                            <div class="message-text">Daniel, Amanda told me about your issue, how can I help?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/daniel.jpg" alt="">
                        <div class="message-block">
                            <span>3:42pm</span>
                            <div class="message-text">Hey Jenna, thanks for answering so quickly. Iam stuck, i need a car.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/daniel.jpg" alt="">
                        <div class="message-block">
                            <span>3:43pm</span>
                            <div class="message-text">Can i borrow your car for a quick ride to San Fransisco? Iam running behind and
                                there' no train in sight.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with David -->
                <div id="david-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>12:34pm</span>
                            <div class="message-text">Damn you! Why would you even implement this in the game?.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>12:32pm</span>
                            <div class="message-text">I just HATE aliens.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:09pm</span>
                            <div class="message-text">C'mon, you just gotta learn the tricks. You can't expect aliens to behave like
                                humans. I mean that's how the mechanics are.</div>
                        </div>
                    </div>
                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:11pm</span>
                            <div class="message-text">I checked the replay and for example, you always get supply blocked. That's not
                                the right thing to do.</div>
                        </div>
                    </div>
                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>13:12pm</span>
                            <div class="message-text">I know but i struggle when i have to decide what to make from larvas.</div>
                        </div>
                    </div>
                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:17pm</span>
                            <div class="message-text">Join me in game, i'll show you.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Edward -->
                <div id="edward-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Monday</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>4:55pm</span>
                            <div class="message-text">Hey Jenna, what's up?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>4:56pm</span>
                            <div class="message-text">Iam coming to LA tomorrow. Interested in having lunch?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:21pm</span>
                            <div class="message-text">Hey mate, it's been a while. Sure I would love to.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>5:27pm</span>
                            <div class="message-text">Ok. Let's say i pick you up at 12:30 at work, works?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:43pm</span>
                            <div class="message-text">Yup, that works great.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:44pm</span>
                            <div class="message-text">And yeah, don't forget to bring some of my favourite cheese cake.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>5:27pm</span>
                            <div class="message-text">No worries</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Edward -->
                <div id="elise-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">September 28</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>11:53am</span>
                            <div class="message-text">Elise, i forgot my folder at your place yesterday.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>11:53am</span>
                            <div class="message-text">I need it badly, it's work stuff.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/elise.jpg" alt="">
                        <div class="message-block">
                            <span>12:19pm</span>
                            <div class="message-text">Yeah i noticed. I'll drop it in half an hour at your office.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Nelly -->
                <div id="nelly-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">September 17</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:22pm</span>
                            <div class="message-text">So you watched the movie?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:22pm</span>
                            <div class="message-text">Was it scary?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/nelly.png" alt="">
                        <div class="message-block">
                            <span>9:03pm</span>
                            <div class="message-text">It was so frightening, i felt my heart was about to blow inside my chest.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Milly -->
                <div id="milly-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:01pm</span>
                            <div class="message-text">Hello Jenna, did you read my proposal?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:01pm</span>
                            <div class="message-text">Didn't hear from you since i sent it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:02pm</span>
                            <div class="message-text">Hello Milly, Iam really sorry, Iam so busy recently, but i had the time to read
                                it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:04pm</span>
                            <div class="message-text">And what did you think about it?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:05pm</span>
                            <div class="message-text">Actually it's quite good, there might be some small changes but overall it's
                                great.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:07pm</span>
                            <div class="message-text">I think that i can give it to my boss at this stage.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:09pm</span>
                            <div class="message-text">Crossing fingers then</div>
                        </div>
                    </div>
                </div>
                <!-- Compose message area -->
                <div class="chat-action">
                    <div class="chat-action-inner">
                        <div class="control">
                            <textarea class="textarea comment-textarea" rows="1"></textarea>
                            <div class="dropdown compose-dropdown is-spaced is-accent is-up dropdown-trigger">
                                <div>
                                    <div class="add-button">
                                        <div class="button-inner">
                                            <i data-feather="plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="code"></i>
                                                <div class="media-content">
                                                    <h3>Code snippet</h3>
                                                    <small>Add and paste a code snippet.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="file-text"></i>
                                                <div class="media-content">
                                                    <h3>Note</h3>
                                                    <small>Add and paste a note.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="server"></i>
                                                <div class="media-content">
                                                    <h3>Remote file</h3>
                                                    <small>Add a file from a remote drive.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="monitor"></i>
                                                <div class="media-content">
                                                    <h3>Local file</h3>
                                                    <small>Add a file from your computer.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="chat-panel" class="chat-panel is-opened">
                <div class="panel-inner">
                    <div class="panel-header">
                        <h3>Details</h3>
                        <div class="panel-close">
                            <i data-feather="x"></i>
                        </div>
                    </div>

                    <!-- Dan details -->
                    <div id="dan-details" class="panel-body is-user-details">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/dan.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Dan Walker</h3>
                                <h4>IOS Developer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">WebSmash Inc.</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-school"></i>
                                    <div class="about-text">
                                        <span>Studied at</span>
                                        <span><a class="is-inverted" href="#">Riverdale University</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Stella details -->
                    <div id="stella-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/stella.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Stella Bergmann</h3>
                                <h4>Shop Owner</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-purple">
                                    <div>
                                        <i class="mdi mdi-bomb"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-check-decagram"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Trending Fashions</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Oklahoma City</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Daniel details -->
                    <div id="daniel-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/daniel.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Daniel Wellington</h3>
                                <h4>Senior Executive</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-google-cardboard"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-pizza"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-linux"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-puzzle"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Peelman & Sons</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Los Angeles</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- David details -->
                    <div id="david-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/david.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>David Kim</h3>
                                <h4>Senior Developer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Frost Entertainment</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Chicago</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Edward details -->
                    <div id="edward-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/edward.jpeg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Edward Mayers</h3>
                                <h4>Financial analyst</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Brettmann Bank</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Santa Fe</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Elise details -->
                    <div id="elise-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/elise.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Elise Walker</h3>
                                <h4>Social influencer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Social Media</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">London</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Nelly details -->
                    <div id="nelly-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/nelly.png" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Nelly Schwartz</h3>
                                <h4>HR Manager</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Carrefour</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Melbourne</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Milly details -->
                    <div id="milly-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url() ?>assets/img/avatars/milly.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Milly Augustine</h3>
                                <h4>Sales Manager</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Salesforce</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Seattle</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="add-conversation-modal" class="modal add-conversation-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>New Conversation</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                                <i data-feather="x"></i>
                            </span>
                    </div>
                </div>
                <div class="card-body">

                    <img src="<?php echo base_url() ?>assets/img/icons/chat/bubbles.svg" alt="">

                    <div class="field is-autocomplete">
                        <div class="control has-icon">
                            <input type="text" class="input simple-users-autocpl" placeholder="Search a user">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="help-text">
                        Select a user to start a new conversation. You'll be able to add other users later.
                    </div>

                    <div class="action has-text-centered">
                        <button type="button" class="button is-solid accent-button raised">Start conversation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Load Mapbox-->

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

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->

    <!-- profile js -->
    <script src="<?php echo base_url() ?>assets/js/profile.js"></script>

    <!-- stories js -->

    <!-- friends js -->

    <!-- questions js -->

    <!-- video js -->

    <!-- events js -->

    <!-- news js -->

    <!-- shop js -->

    <!-- inbox js -->

    <!-- settings js -->

    <!-- map page js -->

    <!-- elements page js -->
</body>


</html>
