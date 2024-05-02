<div class="sidebar-v1 is-fold">
        <div class="top-section">
            <button id="sidebar-v1-close" class="close-button">
                <i data-feather="arrow-left"></i>
            </button>
            <div class="field is-grouped">
                <div class="control">
                    <input id="tipue_drop_input" class="input" placeholder="Search...">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                    <div id="tipue_drop_content" class="tipue-drop-content"></div>
                </div>
            </div>

            <div class="user-block">
                <?php if($this->session->userdata('userTypeId')==2){ ?>
                <img class="avatar" src="<?php echo base_url($profile->data->logoImageUrl) ?>"  alt="">
                <?php }else{ ?>
                   <img class="avatar" src="<?php echo base_url($profile->data->profileImageUrl) ?>"  alt="">
                <?php } ?>
                <div class="meta">
                      <?php if($this->session->userdata('userTypeId')==2){ ?>
                    <span><?php echo $profile->data->businessName  ?></span>
                    <?php }else{ ?>
                     <span><?php echo $profile->data->userName ;  ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="bottom-section" style="height:calc(100% - 0px) !important">
            <ul>
                <li>
                    <a href="<?php echo base_url().'index.php/Home' ?>" class="<?php if($this->uri->segment(1)=="Home"){echo 'is-active';}?>">
                        <i data-feather="clock"></i>
                        <span>Feeds</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'index.php/Friend' ?>" class="<?php if($this->uri->segment(1)=="Friend"){echo 'is-active';}?>">
                        <i data-feather="user"></i>
                        <span>Friends</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'index.php/Friend' ?>" class="<?php if($this->uri->segment(2)=="places"){echo 'is-active';}?>">
                        <i data-feather="map-pin"></i>
                        <span>Places</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'index.php/Friend' ?>" class="<?php if($this->uri->segment(2)=="chat"){echo 'is-active';}?>">
                        <i data-feather="message-square"></i>
                        <span>Chat</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'index.php/Friend' ?>" class="<?php if($this->uri->segment(2)=="Covid"){echo 'is-active';}?>">
                        <i data-feather="heart"></i>
                        <span>Covid 19</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'index.php/Friend' ?>" class="<?php if($this->uri->segment(2)=="music"){echo 'is-active';}?>">
                        <i data-feather="music"></i>
                        <span>Music</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'index.php/Friend' ?>" class="<?php if($this->uri->segment(1)=="Friend"){echo 'is-active';}?>">
                        <i data-feather="navigation"></i>
                        <span>Location Tracking</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'index.php/Group' ?>" class="<?php if($this->uri->segment(1)=="Group"){echo 'is-active';}?>">
                        <i data-feather="users"></i>
                        <span>Groups</span>
                    </a>
                </li>
                <li>
                <a href="<?php echo base_url().'Home/photos' ?>" class="<?php if($this->uri->segment(2)=="photos"){echo 'is-active';}?>">
                        <i data-feather="image"></i>
                        <span>Photos</span>
                    </a>
                </li>

            </ul>
            <ul>
                <li>
                <a href="<?php echo base_url().'index.php/Setting' ?>" class="<?php if($this->uri->segment(1)=="Setting"){echo 'is-active';}?>">
                        <i data-feather="settings"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url().'index.php/Welcome/logout' ?>">
                        <i data-feather="log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>