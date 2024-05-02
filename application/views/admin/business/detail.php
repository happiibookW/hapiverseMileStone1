<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Business Profile</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="indexx.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">B. Profile
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrumb-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="task.php"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="chat.php"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="email.php"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="calendar.php"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <div id="user-profile">
        <!-- profile header -->
        <div class="row">
            <div class="col-12">
                <div class="card profile-header mb-2">
                    <!-- profile cover photo -->
                    <img class="card-img-top" src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/timeline.jpg" alt="User Profile Image" />
                    <!--/ profile cover photo -->

                    <div class="position-relative">
                        <!-- profile picture -->
                        <div class="profile-img-container d-flex align-items-center">
                            <div class="profile-img">
                                <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-2.jpg" class="rounded img-fluid" alt="Card image" />
                            </div>
                            <!-- profile title -->
                            <div class="profile-title ml-3">
                                <h2 class="text-white">Kitty Allanson</h2>
                                <p class="text-white">UI/UX Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- tabs pill -->
                    <div class="profile-header-nav">
                        <!-- navbar -->
                        <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                            <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i data-feather="align-justify" class="font-medium-5"></i>
                            </button>

                            <!-- collapse  -->
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                    <ul class="nav nav-pills mb-0">
                                        <li class="nav-item">
                                            <a class="nav-link font-weight-bold active" href="javascript:void(0)">
                                                <span class="d-none d-md-block">Feed</span>
                                                <i data-feather="rss" class="d-block d-md-none"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                                <span class="d-none d-md-block">About</span>
                                                <i data-feather="info" class="d-block d-md-none"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                                <span class="d-none d-md-block">Photos</span>
                                                <i data-feather="image" class="d-block d-md-none"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                                <span class="d-none d-md-block">Order</span>
                                                <i data-feather="image" class="d-block d-md-none"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                                <span class="d-none d-md-block">Payment Histroy</span>
                                                <i data-feather="image" class="d-block d-md-none"></i>
                                            </a>
                                        </li>
                                        </li>
                                    </ul>
                                    <!-- edit button -->
                                    <button class="btn btn-primary">
                                        <i data-feather="edit" class="d-block d-md-none"></i>
                                        <span class="font-weight-bold d-none d-md-block">Edit</span>
                                    </button>
                                </div>
                            </div>
                            <!--/ collapse  -->
                        </nav>
                        <!--/ navbar -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ profile header -->

        <!-- profile info section -->
        <section id="profile-info">
            <div class="row">
                <!-- left profile info section -->
                <div class="col-lg-3 col-12 order-2 order-lg-1">
                    <!-- about -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-75">About</h5>
                            <p class="card-text">
                                Tart I love sugar plum I love oat cake. Sweet ⭐️ roll caramels I love jujubes. Topping cake wafer.
                            </p>
                            <div class="mt-2">
                                <h5 class="mb-75">Joined:</h5>
                                <p class="card-text">November 15, 2015</p>
                            </div>
                            <div class="mt-2">
                                <h5 class="mb-75">Lives:</h5>
                                <p class="card-text">New York, USA</p>
                            </div>
                            <div class="mt-2">
                                <h5 class="mb-75">Email:</h5>
                                <p class="card-text">bucketful@fiendhead.org</p>
                            </div>
                            <div class="mt-2">
                                <h5 class="mb-50">Website:</h5>
                                <p class="card-text mb-0">www.pixinvent.com</p>
                            </div>
                        </div>
                    </div>
                    <!--/ about -->



                </div>
                <!--/ left profile info section -->

                <!-- center profile info section -->
                <div class="col-lg-6 col-12 order-1 order-lg-2">
                    <!-- post 1 -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center mb-1">
                                <!-- avatar -->
                                <div class="avatar mr-1">
                                    <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-18.jpg" alt="avatar img" height="50" width="50" />
                                </div>
                                <!--/ avatar -->
                                <div class="profile-user-info">
                                    <h6 class="mb-0">Leeanna Alvord</h6>
                                    <small class="text-muted">12 Dec 2018 at 1:16 AM</small>
                                </div>
                            </div>
                            <p class="card-text">
                                Wonderful Machine· A well-written bio allows viewers to get to know a photographer beyond the work. This
                                can make the difference when presenting to clients who are looking for the perfect fit.
                            </p>
                            <!-- post img -->
                            <img class="img-fluid rounded mb-75" src="<?php echo base_url('admin/') ?>app-assets/images/profile/post-media/2.jpg" alt="avatar img" />
                            <!--/ post img -->

                            <!-- like share -->
                            <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                    <a href="javascript:void(0)" class="d-flex align-items-center text-muted text-nowrap">
                                        <i data-feather="heart" class="profile-likes font-medium-3 mr-50"></i>
                                        <span>1.25k</span>
                                    </a>

                                    <!-- avatar group with tooltip -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-group ml-1">
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Trina Lynes" class="avatar pull-up">
                                                <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-1.jpg" alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lilian Nenez" class="avatar pull-up">
                                                <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Alberto Glotzbach" class="avatar pull-up">
                                                <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="George Nordic" class="avatar pull-up">
                                                <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26" />
                                            </div>
                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                                <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-4.jpg" alt="Avatar" height="26" width="26" />
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="text-muted text-nowrap ml-50">+140 more</a>
                                    </div>
                                    <!-- avatar group with tooltip -->
                                </div>

                                <!-- share and like count and icons -->
                                <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                    <a href="javascript:void(0)" class="text-nowrap">
                                        <i data-feather="message-square" class="text-body font-medium-3 mr-50"></i>
                                        <span class="text-muted mr-1">1.25k</span>
                                    </a>

                                    <a href="javascript:void(0)" class="text-nowrap">
                                        <i data-feather="share-2" class="text-body font-medium-3 mx-50"></i>
                                        <span class="text-muted">1.25k</span>
                                    </a>
                                </div>
                                <!-- share and like count and icons -->
                            </div>
                            <!-- like share -->

                            <!-- comments -->
                            <div class="d-flex align-items-start mb-1">
                                <div class="avatar mt-25 mr-75">
                                    <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="34" width="34" />
                                </div>
                                <div class="profile-user-info w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="mb-0">Kitty Allanson</h6>
                                        <a href="javascript:void(0)">
                                            <i data-feather="heart" class="text-body font-medium-3"></i>
                                            <span class="align-middle text-muted">34</span>
                                        </a>
                                    </div>
                                    <small>Easy & smart fuzzy search🕵🏻 functionality which enables users to search quickly.</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-1">
                                <div class="avatar mt-25 mr-75">
                                    <img src="<?php echo base_url('admin/') ?>app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="34" width="34" />
                                </div>
                                <div class="profile-user-info w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="mb-0">Jackey Potter</h6>
                                        <a href="javascript:void(0)">
                                            <i data-feather="heart" class="profile-likes font-medium-3"></i>
                                            <span class="align-middle text-muted">61</span>
                                        </a>
                                    </div>
                                    <small>
                                        Unlimited color🖌 options allows you to set your application color as per your branding 🤪.
                                    </small>
                                </div>
                            </div>
                            <!--/ comments -->

                            <!-- comment box -->
                            <fieldset class="form-label-group mb-75">
                                <textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
                                <label for="label-textarea">Add Comment</label>
                            </fieldset>
                            <!--/ comment box -->
                            <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                        </div>
                    </div>
                    <!--/ post 1 -->

                    <!-- post 2 -->


                </div>
                <!--/ center profile info section -->

                <!-- right profile info section -->
                <div class="col-lg-3 col-12 order-3">
                    <!-- latest profile pictures -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-0">Latest Photos</h5>
                            <div class="row">
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-13.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-02.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-03.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-04.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-05.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-06.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-07.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-08.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-6 profile-latest-img">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('admin/') ?>app-assets/images/profile/user-uploads/user-09.jpg" class="img-fluid rounded" alt="avatar img" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ latest profile pictures -->



                </div>
                <!--/ right profile info section -->
            </div>


        </section>
        <!--/ profile info section -->
    </div>

</div>