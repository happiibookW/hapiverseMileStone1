   <div class="container">

        <!--Groups-->
        <div class="groups-grid">

         

            <div class="columns is-multiline">
                <diV class="column is-3">
                      <div class="card">
                            <div class="card-heading is-bordered">
                                <h4>Filters</h4>
                              
                            </div>
                            <div class="card-body no-padding">
                                <!-- Story block -->
                       
                                <!-- Story block -->
                                 <a href="<?php echo base_url("Home/users"); ?>" >
                                <div class="story-block">
                                    <div class="img-wrapper">
                                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                                    </div>
                                    <div class="story-meta">
                                        <span>People</span>
                                       
                                    </div>
                                </div>
                                </a>
                                <!-- Story block -->
                                <a href="<?php echo base_url("Home/business"); ?>" >
                                <div class="story-block">
                                    <div class="img-wrapper">
                                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/bobby.jpg" data-user-popover="8" alt="">
                                    </div>
                                    <div class="story-meta">
                                        <span>Business</span>
                                   
                                    </div>
                                </div>
                                </a>
                                <!-- Story block -->
                                <!--<div class="story-block">-->
                                <!--    <div class="img-wrapper">-->
                                <!--        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6" alt="">-->
                                <!--    </div>-->
                                <!--    <div class="story-meta">-->
                                <!--        <span>Elise Walker</span>-->
                                <!--        <span>Last week</span>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                </diV>
                <!--Group-->
                <div class="column is-9">
                    <div class="columns is-multiline">
                 <div class="column is-3">
                                <a class="friend-item has-text-centered">
                                    <div class="avatar-wrap">
                                        <div class="circle"></div>
                                        <div class="chat-button">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                        <img src="<?php echo base_url().'/'.$profile->data->profileImageUrl ?>" alt="">
                                    </div>
                                    <!--<h3><?php echo $friend->userName ?></h3>-->
                                </a>
                            </div>
                              <div class="column is-3">
                                <a class="friend-item has-text-centered">
                                    <div class="avatar-wrap">
                                        <div class="circle"></div>
                                        <div class="chat-button">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                        <img src="<?php echo base_url().'/'.$profile->data->profileImageUrl ?>" alt="">
                                    </div>
                                    <!--<h3><?php echo $friend->userName ?></h3>-->
                                </a>
                            </div>
                              <div class="column is-3">
                                <a class="friend-item has-text-centered">
                                    <div class="avatar-wrap">
                                        <div class="circle"></div>
                                        <div class="chat-button">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                        <img src="<?php echo base_url().'/'.$profile->data->profileImageUrl ?>" alt="">
                                    </div>
                                    <!--<h3><?php echo $friend->userName ?></h3>-->
                                </a>
                            </div>
                              <div class="column is-3">
                                <a class="friend-item has-text-centered">
                                    <div class="avatar-wrap">
                                        <div class="circle"></div>
                                        <div class="chat-button">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                        <img src="<?php echo base_url().'/'.$profile->data->profileImageUrl ?>" alt="">
                                    </div>
                                    <!--<h3><?php echo $friend->userName ?></h3>-->
                                </a>
                            </div>
            </div>

            <!-- Load more groups -->
            <!--<div class=" load-more-wrap narrow-top has-text-centered">-->
            <!--    <a href="#" class="load-more-button">Load More</a>-->
            <!--</div>-->
            </div>

        </div>

    </div>