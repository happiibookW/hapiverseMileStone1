<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from friendkit.cssninja.io/login-minimal.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 09:23:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Hapiverse | Login</title>
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

     <!--Fake navigation-->
     <div class="fake-nav">
            <a href="<?php echo base_url().'index.php/' ?>" class="logo">
                <img class="light-image" src="<?php echo base_url() ?>assets/img/logo/logo.png" style="height:70px" alt="">
            </a>
        </div>

        <div class="container">
            <!--Container-->
            <div class="login-container">
                <div class="columns is-vcentered">
                    <div class="column is-6 image-column">
                        <!--Illustration-->
                        <img class="light-image login-image" src="<?php echo base_url() ?>assets/img/illustrations/login/login.svg" alt="">
                        <!-- <img class="dark-image login-image" src="<?php echo base_url() ?>assets/img/illustrations/login/login-dark.svg" alt=""> -->
                    </div>
                    <div class="column is-6">

                        <h2 class="form-title">Welcome Back</h2>
                        <h3 class="form-subtitle">Enter your credentials to sign in.</h3>

                        <!--Form-->
                        <form action="<?php echo base_url().'index.php/Welcome/Getlogin' ?>" method="POST">
                        
                        <div class="login-form">
                            <div class="form-panel">
                            <?php if(!empty($message)) { ?>
                            <h5 class="alert alert-warning"><?php echo $message; ?></h5>
                            <?php } ?>
                                <div class="field">
                                    <label>Email</label>
                                    <div class="control">
                                        <input type="email" class="input" placeholder="Enter your email address" name="email" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Password</label>
                                    <div class="control">
                                        <input type="password" class="input" placeholder="Enter your password" name="password" required>
                                    </div>
                                </div>
                                <div class="field is-flex">
                                    <div class="switch-block">
                                        <!-- <label class="f-switch">
                                            <input type="checkbox" class="is-switch">
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <p>Remember me?</p>
                                        </div> -->
                                    </div>
                                    <a href="<?php echo base_url(). 'index.php/Welcome/forgotpassmail' ?>">Forgot Password?</a>
                                </div>
                            </div>

                            <div class="buttons">
                                <button class="button is-solid primary-button is-fullwidth raised">Login</button>
                            </div>

                            <div class="account-link has-text-centered">
                                <a href="<?php echo base_url(). 'index.php/Welcome/signupselect' ?>">Don't have an account? Sign Up</a>
                            </div>
                        </div>
                        </form>
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
