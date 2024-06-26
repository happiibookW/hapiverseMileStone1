<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from friendkit.cssninja.io/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 09:16:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Hapiverse | Select Sign Up</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/logo/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
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
    <div class="signup-wrapper">

    <div class="fake-nav">
            <a href="<?php echo base_url().'index.php/' ?>" class="logo">
                <img class="light-image" src="<?php echo base_url() ?>assets/img/logo/logo.png" style="height:70px" alt="">
            </a>
        </div>

        <div class="outer-panel">
            <div class="outer-panel-inner">
                <div class="process-title">
                    <h2 id="step-title-1" class="step-title is-active">Welcome, select an account type.</h2>
                </div>

                <div id="signup-panel-1" class="process-panel-wrap is-active">
                    <div class="columns mt-4">
                    <div class="column is-2">
                            
                        </div>
                        <div class="column is-4">
                            <div class="account-type">
                                <div class="type-image">
                                <i data-feather="user"></i>
                                </div>
                                <h3>Premium Plan</h3>
                                <p>Create a Premium account.</p>
                                <a href="<?php echo base_url(). 'index.php/Welcome/signupmail' ?>" class="button is-fullwidth process-button">
                                    Continue
                                </a>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="account-type">
                                <div class="type-image">
                                <i data-feather="user"></i>
                                </div>
                                <h3>Refer Code</h3>
                                <p>Create a account with Refer code.</p>
                                <a href="<?php echo base_url(). 'index.php/Welcome/refercode' ?>" class="button is-fullwidth process-button">
                                    Continue
                                </a>
                            </div>
                        </div>
                        <div class="column is-2">
                            
                        </div>
                    </div>
                </div>

                <div id="signup-panel-2" class="process-panel-wrap is-narrow">
                    <div class="form-panel">
                        <div class="field">
                            <label>First Name</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your first name">
                            </div>
                        </div>
                        <div class="field">
                            <label>Last Name</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your last name">
                            </div>
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your email address">
                            </div>
                        </div>
                    </div>

                    <div class="buttons">
                        <a class="button process-button" data-step="step-dot-1">Back</a>
                        <a class="button process-button is-next" data-step="step-dot-3">Next</a>
                    </div>
                </div>

                <div id="signup-panel-3" class="process-panel-wrap is-narrow">
                    <div class="form-panel">
                        <div class="photo-upload">
                            <div class="preview">
                                <a class="upload-button">
                                    <i data-feather="plus"></i>
                                </a>
                                <img id="upload-preview" src="https://via.placeholder.com/150x150" data-demo-src="<?php echo base_url() ?>assets/img/avatars/avatar-w.png" alt="">
                                <form id="profile-pic-dz" class="dropzone is-hidden" action="https://friendkit.cssninja.io/"></form>
                            </div>
                            <div class="limitation">
                                <small>Only images with a size lower than 3MB are allowed.</small>
                            </div>
                        </div>
                    </div>

                    <div class="buttons">
                        <a class="button process-button" data-step="step-dot-2">Back</a>
                        <a class="button process-button is-next" data-step="step-dot-4">Next</a>
                    </div>
                </div>

                <div id="signup-panel-4" class="process-panel-wrap is-narrow">
                    <div class="form-panel">
                        <div class="field">
                            <label>Password</label>
                            <div class="control">
                                <input type="password" class="input" placeholder="Choose a password">
                            </div>
                        </div>
                        <div class="field">
                            <label>Repeat Password</label>
                            <div class="control">
                                <input type="password" class="input" placeholder="Repeat your password">
                            </div>
                        </div>
                        <div class="field">
                            <label>Phone Number</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="Enter your phone number">
                            </div>
                        </div>
                    </div>

                    <div class="buttons">
                        <a class="button process-button" data-step="step-dot-3">Back</a>
                        <a class="button process-button is-next" data-step="step-dot-5">Next</a>
                    </div>
                </div>

                <div id="signup-panel-5" class="process-panel-wrap is-narrow">
                    <div class="form-panel">
                        <img class="success-image" src="<?php echo base_url() ?>assets/img/illustrations/signup/mailbox.svg" alt="">
                        <div class="success-text">
                            <h3>Congratz, you successfully created your account.</h3>
                            <p> We just sent you a confirmation email. PLease confirm your account within 24 hours.</p>
                            <a id="signup-finish" class="button is-fullwidth">Let Me In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--Edit Credit card Modal-->
        <div id="crop-modal" class="modal is-small crop-modal is-animated">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Crop your picture</h3>
                        <div class="close-wrap">
                            <button class="close-modal" aria-label="close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </header>
                    <div class="modal-card-body">
                        <div id="cropper-wrapper" class="cropper-wrapper">

                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Landing page js -->

    <!-- Signup page js -->
    <script src="<?php echo base_url() ?>assets/js/signup.js"></script>

    <!-- Feed pages js -->

    <!-- profile js -->

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
