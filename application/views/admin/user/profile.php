<div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view">
                    <!-- User Card & Plan Starts -->
                    <div class="row">
                        <!-- User Card starts-->
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            <div class="card user-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                            <div class="user-avatar-section">
                                                <div class="d-flex justify-content-start">
                                                    <img class="img-fluid rounded" src="<?php echo base_url($user['profileImageUrl']) ?>" height="104" width="104" alt="User avatar" />
                                                    <div class="d-flex flex-column ml-1">
                                                        <div class="user-info mb-1">
                                                            <h4 class="mb-0"><?php echo $user['userName'] ?> </h4>
                                                            <span class="card-text"><?php echo $user['email'] ?></span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            <a href="" class="btn btn-primary1">Edit</a>
                                                            <button class="btn btn-outline-danger ml-1">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center user-total-numbers">
                                                <div class="d-flex align-items-center mr-2">
                                                  
                                                    <div class="ml-1">
                                                        <h5 class="mb-0"><?php  echo $user['follower']; ?></h5>
                                                        <small>Followers </small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="trending-up" class="text-success"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0"><?php echo $user['following'] ?></h5>
                                                        <small>Following</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                            <div class="user-info-wrapper">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Company Name</span>
                                                    </div>
                                                    <p class="card-text mb-0">eleanor.aguilar</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Status</span>
                                                    </div>
                                                    <p class="card-text mb-0">Active</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Country</span>
                                                    </div>
                                                    <p class="card-text mb-0"><?php echo $user['country'] ?></p>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="phone" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                                                    </div>
                                                    <p class="card-text mb-0"><?php echo $user['phoneNo'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card Ends-->
                        <!-- Justified Tabs starts -->



                        <!-- Right Aligned Pills End -->
                    </div>


                    <!-- Justified Tabs ends -->
            </div>
            <!-- User Card & Plan Ends -->

            <!-- User Timeline & Permissions Starts -->
            </section>
            <!-- User Timeline & Permissions Ends -->

            <ul class="nav nav-pills nav-justified">

                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab-justified" data-toggle="pill" href="#pro" aria-expanded="false"><i data-feather='check-circle'></i>Followers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-justified" data-toggle="pill" href="#order" aria-expanded="false"><i data-feather='shopping-cart'></i>Order History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-justified" data-toggle="pill" href="#com" aria-expanded="false">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab-justified" data-toggle="pill" href="#detail" aria-expanded="true"><i data-feather='user'></i>Detail</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane " id="detail" aria-labelledby="home-tab-justified" aria-expanded="true">
                    <div class="card">
                        <div class="card-body">
                            <p>
                                Pastry gummi bears sweet roll candy canes topping ice cream. Candy canes fruitcake cookie carrot cake
                                pastry. Lollipop caramels sesame snaps pie tootsie roll macaroon dessert. Muffin jujubes brownie dragée
                                ice cream cheesecake icing. Danish brownie pastry cotton candy donut. Cheesecake donut candy canes.
                                Jelly beans croissant bonbon cookie toffee. Soufflé croissant lemon drops tootsie roll toffee tiramisu.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="pro" role="tabpanel " aria-labelledby="profile-tab-justified" aria-expanded="false">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Followers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>phoneNo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="app-assets/images/icons/angular.svg" class="mr-75" height="20" width="20" alt="Angular" />
                                            </td>
                                            <td>Peter Charls</td>
                                            <td>
                                                £124
                                            </td>
                                            <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="eye" class="mr-50"></i>
                                                            <span>View</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="app-assets/images/icons/react.svg" class="mr-75" height="20" width="20" alt="React" />
                                            </td>
                                            <td>Ronald Frest</td>
                                            <td>
                                                £124
                                            </td>
                                            <td><span class="badge badge-pill badge-light-success mr-1">Completed</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="app-assets/images/icons/vuejs.svg" class="mr-75" height="20" width="20" alt="Vuejs" />
                                            </td>
                                            <td>Jack Obes</td>
                                            <td>
                                                £124
                                            </td>
                                            <td><span class="badge badge-pill badge-light-info mr-1">Scheduled</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="app-assets/images/icons/bootstrap.svg" class="mr-75" height="20" width="20" alt="Bootstrap" />
                                            </td>
                                            <td>Jerry Milton</td>
                                            <td>
                                                £124
                                            </td>
                                            <td><span class="badge badge-pill badge-light-warning mr-1">Pending</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="order" role="tabpanel" aria-labelledby="profile-tab-justified" aria-expanded="false">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Orders History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable2">
                                    <thead>
                                        <tr>
                                            <th>Order No.</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Business Name</th>
                                            <th>Price</th>
                                            <th>Shipping Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($orders as $order){ ?>
                                        <tr>
                                            <td>
                                                <?php echo $order['orderNo']; ?>
                                            </td>
                                            <td><img src="<?php echo $order['images'][0]['imageUrl'] ?>" alt=""></td>
                                            <td>
                                            <?php echo $order['productName']; ?>   
                                            </td>
                                            <?php echo $order['businessName']; ?>
                                            <td></td>
                                            <td><?php echo CURRENCY.$order['totalAmount'] ?></td>
                                            <td>
                                                <?php echo $order['shippingAddress'] ?>
                                            </td>
                                            <td>
                                                <?php if($order['orderStatus']==1){ ?>
                                                <span class="badge badge-pill badge-light-warning mr-1">Pending</span>
                                                <?php }elseif($order['orderStatus']==2){ ?>
                                                    <span class="badge badge-pill badge-light-info mr-1">shipped</span>
                                                    <?php }elseif($order['orderStatus']==3){ ?>
                                                        <span class="badge badge-pill badge-light-success mr-1">Delivered</span>
                                                        <?php } ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?php echo base_url('Business/orderDetail/'.$this->encrypt->encode($order['orderId'])) ?>">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="com" role="tabpanel" aria-labelledby="about-tab-justified" aria-expanded="false">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable3">
                                    <thead>
                                        <tr>
                                            <th>Post</th>
                                            <th>Caption</th>
    
                                            <th>Likes</th>
                                            <th>Comments</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($posts as $post){ ?>
                                        <tr>
                                            <td>
                                               <?php if($post['postType']="image"){ ?>
                                                <img src="<?php echo base_url(isset($post['postFiles'][0]['postFileUrl'])?$post['postFiles'][0]['postFileUrl']:"") ?>" alt="">
                                                <?php }else{ ?>
                                                    <p><?php echo $post['postContentText'] ?></p>
                                                    <?php } ?>
                                            </td>
                                            <td><?php echo $post['caption'] ?> </td>
                                            <td>
                                                <?php echo $post['totalLike'] ?>
                                            </td>
                                            <td><?php echo $post['totalComment'] ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="eye" class="mr-50"></i>
                                                            <span>View</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




        </div>