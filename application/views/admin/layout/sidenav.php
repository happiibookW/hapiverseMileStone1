<!-- 
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><span class="brand-logo">
                            <img src="app-assets/images/ico/s4.jpg" width="50" height="40"></span>
                        <h2 class="brand-text">Hapiverse</h2>
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="menu-item">
              <a href="<?php echo base_url('admin/Dashboard/') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            
                <li class=" nav-item"><a class="d-flex align-items-center" href="index.php"><i data-feather="bold"></i><span class="menu-title text-truncate" data-i18n="Extensions">Business</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="<?php echo base_url("admin/Business/") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Sweet Alert">Add New</span></a>
                        </li>
                        
                        <li><a class="d-flex align-items-center" href="<?php echo base_url("admin/Business/") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Sweet Alert">View</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="<?php echo base_url("admin/Business/orders") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Sweet Alert">Orders</span></a>
                        </li>
                     
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Page Layouts">User</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="<?php echo base_url("admin/User/") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">View</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="interest.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Interest</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="user_interest.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Layout Full">User Interest</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Page Layouts">General</span></a>
                    <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="<?php echo  base_url("admin/General/plan") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Plans</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="<?php echo  base_url("admin/General/AddPlan") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Add Plan</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="<?php echo  base_url("admin/General/interest") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Interest</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="<?php echo  base_url("admin/General/subInterest") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Sub Interest</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="user_interest.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Layout Full">User Interest</span></a>
                        </li>
                    </ul>
                </li>
           
                <li><a class="d-flex align-items-center" href="<?php echo  base_url("admin/Covid/") ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Covid</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="plan.php"><i data-feather="command"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Add Plan</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="show_interest.php"><i data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Show Interest</span></a>
                </li>
                 <li><a class="d-flex align-items-center" href="show_plan.php"><i data-feather="minimize"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Show Plan</span></a>
                </li>
            </ul>
        </div>
    </div> -->
<!-- <style type="text/css">
    .badgeown {
    position: absolute;
    top: 3px !important;
    right: 111px !important;
    min-width: 1.429rem;
    min-height: 1.429rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.786rem;
    line-height: 0.786;
    padding-left: 0.25rem;
    padding-right: 0.25rem;
}

</style> -->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                        <img src="<?php echo base_url(LOGO); ?>" height="50" width="160" style="margin-top:-10%" >
                    </span>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('admin/Dashboard/index') ?>"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Chat">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Users</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('admin/Business/') ?>"><i data-feather="plus-circle"></i><span class="menu-title text-truncate" data-i18n="Chat">Business</span></a>
            </li>
            <li class="nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('admin/User/') ?>"><i data-feather="eye"></i><span class="menu-title text-truncate" data-i18n="Chat">Users</span></a>
            </li>
          
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Order Managment</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('admin/Business/orders')  ?>"><i data-feather="archive"></i><span class="menu-title text-truncate" data-i18n="Chat">Orders</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('admin/Business/events')  ?>"><i data-feather="archive"></i><span class="menu-title text-truncate" data-i18n="Chat">Events</span></a>
            </li>
            <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('General/vehicletype') ?>"><i data-feather='key'></i><span class="menu-title text-truncate" data-i18n="Email">Vehicle type</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('Payment/riderPayment') ?>"><i data-feather='credit-card'></i><span class="menu-title text-truncate" data-i18n="Email">Rider Payments</span></a>
            </li> -->
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">General Managment</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('admin/General/plan')  ?>"><i data-feather="archive"></i><span class="menu-title text-truncate" data-i18n="Chat">Plans</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('admin/General/interest') ?>"><i data-feather='key'></i><span class="menu-title text-truncate" data-i18n="Email">Interests</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo  base_url("admin/General/subInterest") ?>"><i data-feather='key'></i><span class="menu-title text-truncate" data-i18n="Email">Sub Interests</span></a>
            </li>

            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Health</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo  base_url("admin/Covid/") ?>"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Email">Covid</span></a>
            </li>
            <!-- <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">General Managment</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('General/businessstructure') ?>"><i data-feather='command'></i><span class="menu-title text-truncate" data-i18n="Email">Company Details</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('General/sitegroup') ?>"><i data-feather='link'></i><span class="menu-title text-truncate" data-i18n="Email">Sites Management</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('General/postcode') ?>"><i data-feather='activity'></i><span class="menu-title text-truncate" data-i18n="Email">Riders Postcodes</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('Support/') ?>"><i data-feather='message-square'></i><span class="menu-title text-truncate" data-i18n="Email">Support Chat</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('TermCondition/') ?>"><i data-feather="monitor"></i><span class="menu-title text-truncate" data-i18n="Chat">Terms & Conditions</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo base_url('Faq/') ?>"><i data-feather="monitor"></i><span class="menu-title text-truncate" data-i18n="Chat">Faqs</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Chat">Profile</span></a>
            </li> -->
        </ul>
    </div>
</div>
