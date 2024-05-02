<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>FAQ's</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/page-faq.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <?php include"topnav.php";?> 
    <?php include"sidenav.php";?>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">FAQ's</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a>
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
                <!-- search header -->
                <section id="faq-search-filter">
                    <div class="card faq-search" style="background-image: url('app-assets/images/banner/banner.png')">
                        <div class="card-body text-center">
                            <!-- main title -->
                            <h2 class="text-primary">Let's answer some questions</h2>

                            <!-- subtitle -->
                            <p class="card-text mb-2">or choose a category to quickly find the help you need</p>

                            <!-- search input -->
                            <form class="faq-search-input">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="search"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search faq..." />
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- /search header -->

                <!-- frequently asked questions tabs pills -->
                <section id="faq-tabs">
                    <!-- vertical tab pill -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                                <!-- pill tabs navigation -->
                                <ul class="nav nav-pills nav-left flex-column" role="tablist">
                                    <!-- payment -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="payment" data-toggle="pill" href="#faq-payment" aria-expanded="true" role="tab">
                                            <i data-feather="credit-card" class="font-medium-3 mr-1"></i>
                                            <span class="font-weight-bold">Payment</span>
                                        </a>
                                    </li>

                                    <!-- delivery -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="delivery" data-toggle="pill" href="#faq-delivery" aria-expanded="false" role="tab">
                                            <i data-feather="shopping-bag" class="font-medium-3 mr-1"></i>
                                            <span class="font-weight-bold">Delivery</span>
                                        </a>
                                    </li>

                                    <!-- cancellation and return -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancellation-return" data-toggle="pill" href="#faq-cancellation-return" aria-expanded="false" role="tab">
                                            <i data-feather="refresh-cw" class="font-medium-3 mr-1"></i>
                                            <span class="font-weight-bold">Cancellation & Return</span>
                                        </a>
                                    </li>

                                    <!-- my order -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="my-order" data-toggle="pill" href="#faq-my-order" aria-expanded="false" role="tab">
                                            <i data-feather="package" class="font-medium-3 mr-1"></i>
                                            <span class="font-weight-bold">My Orders</span>
                                        </a>
                                    </li>

                                    <!-- product and services-->
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-services" data-toggle="pill" href="#faq-product-services" aria-expanded="false" role="tab">
                                            <i data-feather="settings" class="font-medium-3 mr-1"></i>
                                            <span class="font-weight-bold">Product & Services</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- FAQ image -->
                                <img src="app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block" alt="demand img" />
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <!-- pill tabs tab content -->
                            <div class="tab-content">
                                <!-- payment panel -->
                                <div role="tabpanel" class="tab-pane active" id="faq-payment" aria-labelledby="payment" aria-expanded="true">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary mr-1">
                                            <i data-feather="credit-card" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Payment</h4>
                                            <span>Which license do I need?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="collapse-margin collapse-icon mt-2" id="faq-payment-qna">
                                        <div class="card">
                                            <div class="card-header" id="paymentSeven" data-toggle="collapse" role="button" data-target="#faq-payment-seven" aria-expanded="false" aria-controls="faq-payment-seven">
                                                <span class="lead collapse-title">
                                                    Can I re-distribute an item? What about under an Extended License?
                                                </span>
                                            </div>
                                            <div id="faq-payment-seven" class="collapse" aria-labelledby="paymentSeven" data-parent="#faq-payment-qna">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Euismod lacinia at quis risus sed vulputate odio ut enim. Dictum at tempor
                                                    commodo ullamcorper a lacus vestibulum.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delivery panel -->
                                <div class="tab-pane" id="faq-delivery" role="tabpanel" aria-labelledby="delivery" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary mr-1">
                                            <i data-feather="shopping-bag" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Delivery</h4>
                                            <span>Which license do I need?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="collapse-margin collapse-icon mt-2" id="faq-delivery-qna">
                                       <div class="card">
                                            <div class="card-header" id="deliveryFive" data-toggle="collapse" role="button" data-target="#faq-delivery-five" aria-expanded="false" aria-controls="faq-delivery-five">
                                                <span class="lead collapse-title">
                                                    What do I need to do to get the shipment delivered within a specific timeframe?
                                                </span>
                                            </div>
                                            <div id="faq-delivery-five" class="collapse" aria-labelledby="deliveryFive" data-parent="#faq-delivery-qna">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                    officia deserunt mollit anim id est laborum.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- cancellation return  -->
                                <div class="tab-pane" id="faq-cancellation-return" role="tabpanel" aria-labelledby="cancellation-return" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary mr-1">
                                            <i data-feather="refresh-cw" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Cancellation & Return</h4>
                                            <span>Which license do I need?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="collapse-margin collapse-icon mt-2" id="faq-cancellation-qna">
                                       
                                        
                                        <div class="card">
                                            <div class="card-header" id="cancellationSeven" data-toggle="collapse" role="button" data-target="#faq-cancellation-seven" aria-expanded="false" aria-controls="faq-cancellation-seven">
                                                <span class="lead collapse-title">
                                                    What are the timings for self-collecting shipments from the Delhivery Branch?
                                                </span>
                                            </div>
                                            <div id="faq-cancellation-seven" class="collapse" aria-labelledby="cancellationSeven" data-parent="#faq-cancellation-qna">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Euismod lacinia at quis risus sed vulputate odio ut enim. Dictum at tempor
                                                    commodo ullamcorper a lacus vestibulum.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- my order -->
                                <div class="tab-pane" id="faq-my-order" role="tabpanel" aria-labelledby="my-order" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary mr-1">
                                            <i data-feather="package" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">My Orders</h4>
                                            <span>Which license do I need?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="collapse-margin collapse-icon mt-2" id="faq-my-order-qna">
                                        
                                        <div class="card">
                                            <div class="card-header" id="myOrderFive" data-toggle="collapse" role="button" data-target="#faq-my-order-five" aria-expanded="false" aria-controls="faq-my-order-five">
                                                <span class="lead collapse-title"> The delivery of my order is delayed. What should I do? </span>
                                            </div>
                                            <div id="faq-my-order-five" class="collapse" aria-labelledby="myOrderFive" data-parent="#faq-my-order-qna">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                    officia deserunt mollit anim id est laborum.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- product services -->
                                <div class="tab-pane" id="faq-product-services" role="tabpanel" aria-labelledby="product-services" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary mr-1">
                                            <i data-feather="settings" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Product & Services</h4>
                                            <span>Which license do I need?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="collapse-margin collapse-icon mt-2" id="faq-product-qna">
                                        <div class="card">
                                            <div class="card-header" id="productFour" data-toggle="collapse" role="button" data-target="#faq-product-four" aria-expanded="false" aria-controls="faq-product-four">
                                                <span class="lead collapse-title">How can I avail your services?</span>
                                            </div>
                                            <div id="faq-product-four" class="collapse" aria-labelledby="productFour" data-parent="#faq-product-qna">
                                                <div class="card-body">
                                                    Cheesecake muffin cupcake dragée lemon drops tiramisu cake gummies chocolate cake. Marshmallow tart
                                                    croissant. Tart dessert tiramisu marzipan lollipop lemon drops. Cake bonbon bonbon gummi bears topping
                                                    jelly beans brownie jujubes muffin. Donut croissant jelly-o cake marzipan. Liquorice marzipan cookie
                                                    wafer tootsie roll. Tootsie roll sweet cupcake.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- / frequently asked questions tabs pills -->

                <!-- contact us -->
                <section class="faq-contact">
                    <div class="row mt-5 pt-75">
                        <div class="col-12 text-center">
                            <h2>You still have a question?</h2>
                            <p class="mb-3">
                                If you cannot find a question in our FAQ, you can always contact us. We will answer to you shortly!
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center faq-contact-card shadow-none py-1">
                                <div class="card-body">
                                    <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                        <i data-feather="phone-call" class="font-medium-3"></i>
                                    </div>
                                    <h4>+ (810) 2548 2568</h4>
                                    <span class="text-body">We are always happy to help!</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center faq-contact-card shadow-none py-1">
                                <div class="card-body">
                                    <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                        <i data-feather="mail" class="font-medium-3"></i>
                                    </div>
                                    <h4>hello@help.com</h4>
                                    <span class="text-body">Best way to get answer faster!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ contact us -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include "footer.php";?>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>