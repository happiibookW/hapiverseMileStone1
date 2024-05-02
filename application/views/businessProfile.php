 <div id="profile-main" class="view-wrap is-headless">
                <div class="columns is-multiline no-margin">
                    <!-- Left side column -->
                    <div class="column is-paddingless">
                        <!-- Timeline Header -->
                        <!-- html/partials/pages/profile/timeline/timeline-header.html -->
                        <div class="cover-bg">
                            <img class="cover-image" src="https://via.placeholder.com/1600x460" data-demo-src="<?php echo (isset($businessProfile->data->featureImageUrl) && $businessProfile->data->featureImageUrl!="")?base_url($businessProfile->data->featureImageUrl):base_url($businessProfile->data->logoImageUrl); ?>" alt="">
                            <div class="avatar">
                                <img id="user-avatar" class="avatar-image" src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url($businessProfile->data->logoImageUrl) ?>" alt="">
                                <div class="avatar-button">
                                    <i data-feather="plus"></i>
                                </div>
                                <div class="pop-button is-far-left has-tooltip modal-trigger" data-modal="change-profile-pic-modal" data-placement="right" data-title="Change profile picture">
                                    <a class="inner">
                                        <i data-feather="camera"></i>
                                    </a>
                                </div>
                                <div id="follow-pop" class="pop-button pop-shift is-left has-tooltip" data-placement="top" data-title="Subscription">
                                    <a class="inner">
                                        <i class="inactive-icon" data-feather="bell"></i>
                                        <i class="active-icon" data-feather="bell-off"></i>
                                    </a>
                                </div>
                                <div id="invite-pop" class="pop-button pop-shift is-center has-tooltip" data-placement="top" data-title="Relationship">
                                    <a href="#" class="inner">
                                        <i class="inactive-icon" data-feather="plus"></i>
                                        <i class="active-icon" data-feather="minus"></i>
                                    </a>
                                </div>
                                <div id="chat-pop" class="pop-button is-right has-tooltip" data-placement="top" data-title="Chat">
                                    <a class="inner">
                                        <i data-feather="message-circle"></i>
                                    </a>
                                </div>
                                <div class="pop-button is-far-right has-tooltip" data-placement="right" data-title="Send message">
                                    <a href="messages-inbox.html" class="inner">
                                        <i data-feather="mail"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="cover-overlay"></div>
                            <div class="cover-edit modal-trigger" data-modal="change-cover-modal">
                                <i class="mdi mdi-camera"></i>
                                <span>Edit cover image</span>
                            </div>
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

                        <div class="profile-menu is-hidden-mobile">
                            <div class="menu-start">
                                <a href="profile-main.html" class="button has-min-width">Timeline</a>
                                <a href="profile-about.html" class="button has-min-width">About</a>
                            </div>
                            <div class="menu-end">
                                <a id="profile-friends-link" href="profile-friends.html" class="button has-min-width">Friends</a>
                                <a href="profile-photos.html" class="button has-min-width">Photos</a>
                            </div>
                        </div>

                        <div class="profile-subheader">
                            <div class="subheader-start is-hidden-mobile">
                                <!--<span>3.4K</span>-->
                                <!--<span>Friends</span>-->
                            </div>
                            <div class="subheader-middle">
                                <h2><?php echo $businessProfile->data->businessName; ?></h2>
                                <span><?php echo $businessProfile->data->ownerName; ?></span>
                            </div>
                            <div class="subheader-end is-hidden-mobile">
                                   <?php if($businessProfile->data->IsFriend=="Friend"){ ?>
                                <a class="button has-icon is-bold">
                                    <i data-feather="user-check"></i>
                                    <?php echo $businessProfile->data->IsFriend; ?>
                                </a>
                                <?php }elseif($businessProfile->data->IsFriend=="follow"){ ?>
                                 <a class="button has-icon is-bold">
                                    <i data-feather="user-plus"></i>
                                    <?php echo $businessProfile->data->IsFriend; ?>
                                </a>
                                <?php }else{?>
                                 <a class="button has-icon is-bold">
                                    <i data-feather="user"></i>
                                    <?php echo $businessProfile->data->IsFriend; ?>
                                </a>
                                <?php 
                                } ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="columns">
                    <div id="profile-timeline-widgets" class="column is-4">

                        <!-- Basic Infos widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/basic-infos-widget.html -->
                        <div class="box-heading">
                            <h4>Basic Infos</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="profile-about.html" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="eye"></i>
                                                <div class="media-content">
                                                    <h3>View</h3>
                                                    <small>View user details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="search"></i>
                                                <div class="media-content">
                                                    <h3>Related</h3>
                                                    <small>Search for related users.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="basic-infos-wrapper">
                            <div class="card is-profile-info">
                                <div class="info-row">
                                    <div>
                                        <span>Type</span>
                                        <a class="is-inverted"><?php echo $businessProfile->data->businessType ?></a>
                                    </div>
                                    <i class="mdi mdi-school"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>Contact</span>
                                        <a class="is-inverted"><?php echo $businessProfile->data->businessContact ?></a>
                                    </div>
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>From</span>
                                        <a class="is-inverted"><?php echo $businessProfile->data->country ?></a>
                                    </div>
                                    <i class="mdi mdi-earth"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>Address</span>
                                        <a class="is-inverted"><?php echo $businessProfile->data->address.", ",$businessProfile->data->city ?></a>
                                    </div>
                                    <i class="mdi mdi-map-marker"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>Followers</span>
                                        <a class="is-muted"><?php $businessProfile->data->totalFollowers ?> followers</a>
                                    </div>
                                    <i class="mdi mdi-bell-ring"></i>
                                </div>
                                 <div class="info-row">
                                    <div>
                                        <span>Following</span>
                                        <a class="is-muted"><?php $businessProfile->data->totalFollowing ?> following</a>
                                    </div>
                                    <i class="mdi mdi-bell-ring"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Photos widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/photos-widget.html -->
                        <div class="box-heading">
                            <h4>Photos</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="image"></i>
                                                <div class="media-content">
                                                    <h3>View Photos</h3>
                                                    <small>View all your photos</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="tag"></i>
                                                <div class="media-content">
                                                    <h3>Tagged</h3>
                                                    <small>View photos you are tagged in.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="folder"></i>
                                                <div class="media-content">
                                                    <h3>Albums</h3>
                                                    <small>Open my albums.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="is-photos-widget">
                             <?php foreach($photos as $photo){ ?>
                            <img src="https://via.placeholder.com/200x200" data-demo-src="<?php echo base_url($photo['postFileUrl']); ?>" alt="">
                            <?php } ?>
                        </div>
                        <!-- Star friends widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/star-friends-widget.html -->
                        <div class="box-heading">
                            <h4>Friends</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="users"></i>
                                                <div class="media-content">
                                                    <h3>All Friends</h3>
                                                    <small>View all friends.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="heart"></i>
                                                <div class="media-content">
                                                    <h3>Family</h3>
                                                    <small>View family members.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="briefcase"></i>
                                                <div class="media-content">
                                                    <h3>Work Relations</h3>
                                                    <small>View work related friends.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="friend-cards-list">
                            <div class="card is-friend-card">

                                <?php if(!empty($post)) {foreach($friends as $friend){ ?>
                                <div class="friend-item">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="<?php echo base_url($friend->profileImageUrl); ?>" alt="" data-user-popover="1">
                                    <div class="text-content">
                                        <a><?php echo $friend->userName; ?></a>
                                        <!--<span>4 mutual friend(s)</span>-->
                                    </div>
                                    <!--<div class="star-friend">-->
                                    <!--    <i data-feather="star"></i>-->
                                    <!--</div>-->
                                </div>
                             <?php } }else{?>
                              <h4 class="alert alert-warning"><?php echo $noFriendmMssage; ?></h4>
                             <?php } ?>

                            </div>
                        </div>
                      
                        <div class="box-heading">
                            <h4>Location</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="globe"></i>
                                                <div class="media-content">
                                                    <h3>Get Direction</h3>
                                                    <small>Lets see the distance</small>
                                                </div>
                                            </div>
                                        </a>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trip-cards-list">
                            <div class="card is-trip-card">
                           
                             
 <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
    style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="box-heading">
                            <h4>Events</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>All Events</h3>
                                                    <small>View all your events</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="search"></i>
                                                <div class="media-content">
                                                    <h3>Search</h3>
                                                    <small>Search for events.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="compass"></i>
                                                <div class="media-content">
                                                    <h3>Suggestions</h3>
                                                    <small>View trendy suggestions.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Schedule calendar widget -->
                        <!-- html/partials/widgets/schedule/schedule-widget.html -->
                        <div class="schedule">
                            <div class="schedule-day-container hidden">
                                <div class="day-header day-header--large">
                                    <div class="day-header-bg"></div>
                                    <div class="day-header-close">
                                        <i data-feather="x"></i>
                                    </div>
                                    <div class="day-header-content">
                                        <div class="day-header-title">
                                            <div class="day-header-title-day">24</div>
                                            <div class="day-header-title-month">October</div>
                                        </div>
                                        <div class="day-header-event">Workout Session</div>
                                    </div>
                                </div>
                                <div class="day-content has-slimscroll">

                                    <!-- Event 1 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-1.html -->
                                    <div id="event-1" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ Mom and Dad's house</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>02:00pm - 03:30pm</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>4 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="" data-user-popover="9">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="" data-user-popover="2">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="" data-user-popover="7">
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 2 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-2.html -->
                                    <div id="event-2" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ <a class="is-inverted">Wayne's Coffeeshop</a>, LA</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>11:00am - 12:30pm</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>3 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="" data-user-popover="4">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/rolf.jpg" alt="" data-user-popover="13">
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 3 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-3.html -->
                                    <div id="event-3" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-earth"></i>
                                            <div class="meta">
                                                <span>Public</span>
                                                <span>This is a public event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ Frank's appartment</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>08:00pm - 02:00am</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>29 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="" data-user-popover="6">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="" data-user-popover="3">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/rolf.jpg" alt="" data-user-popover="13">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="" data-user-popover="7">
                                                <div class="is-more">+24</div>
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 4 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-4.html -->
                                    <div id="event-4" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ <a class="is-inverted">Gold Gym</a>, LA</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>05:00pm - 07:00pm</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>2 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/lana.jpeg" alt="" data-user-popover="10">
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 5 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-5.html -->
                                    <div id="event-5" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ <a class="is-inverted">Massive Dynamics Office</a>, LA</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>08:30am - 10:00am</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>29 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="" data-user-popover="1">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="" data-user-popover="5">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/mike.jpg" alt="" data-user-popover="12">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/gaelle.jpeg" alt="" data-user-popover="11">
                                                <div class="is-more">+4</div>
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-header">
                                <div class="nav-icon">
                                    <i data-feather="chevron-left"></i>
                                </div>
                                <div class="month">October</div>
                                <div class="nav-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                            </div>
                            <div class="schedule-calendar">
                                <div class="calendar-row day-row">
                                    <div class="day day-name">M</div>
                                    <div class="day day-name">T</div>
                                    <div class="day day-name">W</div>
                                    <div class="day day-name">T</div>
                                    <div class="day day-name">F</div>
                                    <div class="day day-name">S</div>
                                    <div class="day day-name">S</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">&nbsp;</div>
                                    <div class="day">&nbsp;</div>
                                    <div class="day">1</div>
                                    <div class="day event green" data-content="1" data-day="2" data-event="Eat at mom and dad's">2</div>
                                    <div class="day">3</div>
                                    <div class="day">4</div>
                                    <div class="day">5</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">6</div>
                                    <div class="day event purple" data-content="2" data-day="7" data-event="Meet customer in LA">7</div>
                                    <div class="day">8</div>
                                    <div class="day">9</div>
                                    <div class="day">10</div>
                                    <div class="day">11</div>
                                    <div class="day">12</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">13</div>
                                    <div class="day">14</div>
                                    <div class="day">15</div>
                                    <div class="day">16</div>
                                    <div class="day">17</div>
                                    <div class="day">18</div>
                                    <div class="day">19</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">20</div>
                                    <div class="day">21</div>
                                    <div class="day event green" data-content="3" data-day="22" data-event="Frank's birthday">22</div>
                                    <div class="day">23</div>
                                    <div class="day event primary" data-content="4" data-day="24" data-event="Workout Session">24</div>
                                    <div class="day">25</div>
                                    <div class="day event purple" data-content="5" data-day="26" data-event="Project review">26</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">27</div>
                                    <div class="day">28</div>
                                    <div class="day">29</div>
                                    <div class="day">30</div>
                                    <div class="day"></div>
                                    <div class="day"></div>
                                    <div class="day"></div>
                                </div>
                                <div class="next-fab">
                                    <i data-feather="chevron-down"></i>
                                </div>
                            </div>
                            <div class="schedule-divider"></div>
                            <div class="schedule-events">
                                <div class="schedule-events-title">
                                    Upcoming events
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date green">2</div>
                                    <div class="event-title">
                                        <span>Eat at mom and dad's</span>
                                        <span>07:30pm | Home</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date purple">7</div>
                                    <div class="event-title">
                                        <span>Meet customer in LA</span>
                                        <span>11:00am | St Luc Café</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date green">22</div>
                                    <div class="event-title">
                                        <span>Frank's birthday</span>
                                        <span>03:00pm | Frank's home</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date primary">24</div>
                                    <div class="event-title">
                                        <span>Workout session</span>
                                        <span>07:00am | Gold Gym</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date purple">26</div>
                                    <div class="event-title">
                                        <span>Project review</span>
                                        <span>08:00am | Office</span>
                                    </div>
                                </div>
                                <div class="button-wrap">
                                    <a class="button is-fullwidth has-icon"><i data-feather="plus"></i>New Event</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column is-8">
                        <!--<div id="profile-timeline-posts" class="box-heading">-->
                        <!--    <h4>Product</h4>-->
                        <!--    <div class="button-wrap">-->
                        <!--        <button type="button" class="button is-active">Recent</button>-->
                        <!--        <button type="button" class="button">Popular</button>-->
                        <!--    </div>-->
                        <!--</div>-->

                         <div class="profile-timeline">
                         <!-- business products here  -->
                          <div id="" >

            <div class="container sidebar-boxed">
                <div class="shop-wrapper">

                    <div class="shop-header">
                        <div class="container">
                          

                            <div class="store-tabs">
                                <a data-tab="products-tab" class="tab-control is-active">Products</a>
                                <a data-tab="brands-tab" class="tab-control">Events</a>
                              
                                <div class="store-naver"></div>
                            </div>
                        </div>
                    </div>

                    <div class="store-sections">
                        <div class="container">

                            <!--Products-->
                            <div id="products-tab" class="store-tab-pane is-active">
                                <div class="columns is-multiline">
                                    <!-- /partials/commerce/products/products-list.html -->
                                    <!--Product-->
                                    <?php foreach($products as $product){ ?>
                                    <div class="column is-one-fifth-quarter is-one-third-widescreen is-half-desktop is-half-tablet is-half-mobile">
                                        <div class="product-card" data-name="<?php echo $product->productName; ?>" data-price="<?php echo $product->productPrice; ?>" data-colors="false" data-variants="false" data-path="<?php echo isset($product->Images[0]->imageUrl)?base_url($product->Images[0]->imageUrl):""; ?>">
                                            <a class="quickview-trigger">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="product-image">
                                                <img src="<?php echo isset($product->Images[0]->imageUrl)?base_url($product->Images[0]->imageUrl):""; ?>" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h3><?php echo $product->productName; ?></h3>
                                                <p><?php echo $product->productdescription; ?></p>
                                            </div>
                                            <div class="product-actions">
                                                <div class="left">
                                                    <!--<i data-feather="heart"></i>-->
                                                    <!--<span>147</span>-->
                                                </div>
                                                <div class="right">
                                                    <a class="button is-solid accent-button raised">
                                                        <i data-feather="shopping-cart"></i>
                                                        <span><?php echo $product->productPrice; ?></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!--Product-->
                             
                                </div>
                            </div>

                            <!--Followers-->
                            <div id="followers-tab" class="store-tab-pane">
                                <div class="columns is-multiline followers-wrap">
                                    <!-- /partials/commerce/products/products-followers.html -->
                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                            </div>
                                            <h3>Jenna Davis</h3>
                                            <p>From Melbourne</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                                            </div>
                                            <h3>Dan Walker</h3>
                                            <p>From New York</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/stella.jpg" data-user-popover="2" alt="">
                                            </div>
                                            <h3>Stella Bergmann</h3>
                                            <p>From Berlin</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/daniel.jpg" data-user-popover="3" alt="">
                                            </div>
                                            <h3>Daniel Wellington</h3>
                                            <p>From London</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/nelly.png" data-user-popover="9" alt="">
                                            </div>
                                            <h3>Nelly Schwartz</h3>
                                            <p>From Melbourne</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">
                                            </div>
                                            <h3>Milly Augustine</h3>
                                            <p>From Rome</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                                            </div>
                                            <h3>David Kim</h3>
                                            <p>From Chicago</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6" alt="">
                                            </div>
                                            <h3>Elise Walker</h3>
                                            <p>From London</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/rolf.jpg" data-user-popover="13" alt="">
                                            </div>
                                            <h3>Rolf Krupp</h3>
                                            <p>From Berlin</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/ken.jpg" data-user-popover="14" alt="">
                                            </div>
                                            <h3>Ken Rogers</h3>
                                            <p>From Chicago</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/lana.jpeg" data-user-popover="10" alt="">
                                            </div>
                                            <h3>Lana Henrikssen</h3>
                                            <p>From Helsinki</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/leana.jpg" data-user-popover="15" alt="">
                                            </div>
                                            <h3>Leana Marks</h3>
                                            <p>From Nashville</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/mike.jpg" data-user-popover="17" alt="">
                                            </div>
                                            <h3>Mike Donovan</h3>
                                            <p>From San Francisco</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/azzouz.jpg" data-user-popover="20" alt="">
                                            </div>
                                            <h3>Azzouz El Paytoun</h3>
                                            <p>From Montreal</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                            </div>
                                            <h3>Edward Mayers</h3>
                                            <p>From Dublin</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/gaelle.jpeg" data-user-popover="11" alt="">
                                            </div>
                                            <h3>Gaelle Morris</h3>
                                            <p>From Lyon</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/bobby.jpg" data-user-popover="8" alt="">
                                            </div>
                                            <h3>Bobby Brown</h3>
                                            <p>From Paris</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/cathy.png" data-user-popover="21" alt="">
                                            </div>
                                            <h3>Cathy Smith</h3>
                                            <p>From Seattle</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/bob.png" data-user-popover="22" alt="">
                                            </div>
                                            <h3>Bob Barker</h3>
                                            <p>From Tijuana</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/hisashi.jpg" data-user-popover="24" alt="">
                                            </div>
                                            <h3>Hisashi Yokida</h3>
                                            <p>From Tokyo</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/aline.jpg" data-user-popover="16" alt="">
                                            </div>
                                            <h3>Aline Cambell</h3>
                                            <p>From Seattle</p>
                                        </div>
                                    </div>

                                    <!--Follower-->
                                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                        <div class="follower-block">
                                            <div class="avatar-container">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/brian.jpg" data-user-popover="19" alt="">
                                            </div>
                                            <h3>Brian Stevenson</h3>
                                            <p>From Seattle</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Brands-->
                            <div id="brands-tab" class="store-tab-pane">
                                <div class="columns is-multiline">
                                    <!-- /partials/commerce/products/products-brands.html -->
                                    <!--Brand-->
                                    <div class="column is-one-fifth-quarter is-one-third-widescreen is-half-desktop is-half-tablet is-half-mobile">
                                        <div class="brand-card">
                                            <img src="assets/img/icons/shop/brands/1.svg" alt="">
                                            <div class="meta">
                                                <h3>Adventure</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="brand-stats">
                                                <div class="brand-stat">
                                                    <span>10</span>
                                                    <span>Products</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>800</span>
                                                    <span>Sales</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>4K</span>
                                                    <span>Likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Brand-->
                                    <div class="column is-one-fifth-quarter is-one-third-widescreen is-half-desktop is-half-tablet is-half-mobile">
                                        <div class="brand-card">
                                            <img src="assets/img/icons/shop/brands/2.svg" alt="">
                                            <div class="meta">
                                                <h3>Ludicrous</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="brand-stats">
                                                <div class="brand-stat">
                                                    <span>10</span>
                                                    <span>Products</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>800</span>
                                                    <span>Sales</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>4K</span>
                                                    <span>Likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Brand-->
                                    <div class="column is-one-fifth-quarter is-one-third-widescreen is-half-desktop is-half-tablet is-half-mobile">
                                        <div class="brand-card">
                                            <img src="assets/img/icons/shop/brands/3.svg" alt="">
                                            <div class="meta">
                                                <h3>Fashion Store</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="brand-stats">
                                                <div class="brand-stat">
                                                    <span>10</span>
                                                    <span>Products</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>800</span>
                                                    <span>Sales</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>4K</span>
                                                    <span>Likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Brand-->
                                    <div class="column is-one-fifth-quarter is-one-third-widescreen is-half-desktop is-half-tablet is-half-mobile">
                                        <div class="brand-card">
                                            <img src="assets/img/icons/shop/brands/4.svg" alt="">
                                            <div class="meta">
                                                <h3>Anna Morris</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="brand-stats">
                                                <div class="brand-stat">
                                                    <span>10</span>
                                                    <span>Products</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>800</span>
                                                    <span>Sales</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>4K</span>
                                                    <span>Likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Brand-->
                                    <div class="column is-one-fifth-quarter is-one-third-widescreen is-half-desktop is-half-tablet is-half-mobile">
                                        <div class="brand-card">
                                            <img src="assets/img/icons/shop/brands/5.svg" alt="">
                                            <div class="meta">
                                                <h3>Explorer</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="brand-stats">
                                                <div class="brand-stat">
                                                    <span>10</span>
                                                    <span>Products</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>800</span>
                                                    <span>Sales</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>4K</span>
                                                    <span>Likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Brand-->
                                    <div class="column is-one-fifth-quarter is-one-third-widescreen is-half-desktop is-half-tablet is-half-mobile">
                                        <div class="brand-card">
                                            <img src="assets/img/icons/shop/brands/6.svg" alt="">
                                            <div class="meta">
                                                <h3>Cherry Pick</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="brand-stats">
                                                <div class="brand-stat">
                                                    <span>10</span>
                                                    <span>Products</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>800</span>
                                                    <span>Sales</span>
                                                </div>
                                                <div class="brand-stat">
                                                    <span>4K</span>
                                                    <span>Likes</span>
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

        </div>

        <div id="product-quickview" class="modal product-quickview is-large has-light-bg">
            <div class="modal-background quickview-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="quickview-loader is-active">
                        <div class="loader is-loading"></div>
                    </div>
                    <div class="left">
                        <div class="product-image is-active">
                            <img src="assets/img/products/1.svg" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="header">
                            <div class="product-info">
                                <h3 id="quickview-name">Product Name</h3 id="quickview-price">
                                <p>Product tagline text</p>
                            </div>
                            <div id="quickview-price" class="price">
                                27.00
                            </div>
                        </div>
                        <div class="properties">
                            <!--Colors-->
                            <div id="color-properties" class="property-group is-hidden">
                                <h4>Colors</h4>
                                <div class="property-box is-colors">
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="red">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-red"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="blue">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-blue"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="green">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-green"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="yellow">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-yellow"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Colors-->
                            <div id="size-properties" class="property-group">
                                <h4>Sizes</h4>
                                <div class="property-box is-sizes">
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="S">
                                        <div class="item-inner">
                                            <span class="size-label">S</span>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="M" checked>
                                        <div class="item-inner">
                                            <span class="size-label">M</span>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="L">
                                        <div class="item-inner">
                                            <span class="size-label">L</span>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="XL">
                                        <div class="item-inner">
                                            <span class="size-label">XL</span>
                                        </div>
                                    </div>
                                </div>
                            </div id="color-properties">
                        </div>

                        <!--Description-->
                        <div class="quickview-description content has-slimscroll">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Scrupulum, inquam, abeunti; Ubi ut eam
                                caperet aut quando? Erat enim
                                Polemonis. Utram tandem linguam nescio? Duo Reges: constructio interrete. </p>

                            <p>Alio modo Non est igitur voluptas bonum. Estne, quaeso, inquam, sitienti in bibendo
                                voluptas? Erat enim Polemonis. Minime vero,
                                inquit ille, consentit. Hic ambiguo ludimur. Numquam facies. Ea possunt paria non esse. </p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Scrupulum, inquam, abeunti; Ubi ut eam
                                caperet aut quando? Erat enim
                                Polemonis. Utram tandem linguam nescio? Duo Reges: constructio interrete.</p>
                        </div>

                        <div class="quickview-controls">
                            <div class="spinner">
                                <button class="remove">
                                    <i data-feather="minus"></i>
                                </button>
                                <span class="value">1</span>
                                <button class="add">
                                    <i data-feather="plus"></i>
                                </button>
                                <input class="spinner-input" type="hidden" value="1">
                            </div>
                            <a class="button is-solid accent-button raised">
                                <span>Add To Cart</span>
                                <var id="quickview-button-price">27.00</var>
                            </a>
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