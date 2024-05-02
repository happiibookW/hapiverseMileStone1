
<div class="groups-grid">

<div class="columns is-multiline">
    <!--Group-->
    <?php foreach($groups as $group){ ?>
    <div class="column is-4">
        <article class="group-box">
            <div class="box-info-hover">
                <i data-feather="heart"></i>
                <!--<div class="box-clock-info">-->
                <!--    <i data-feather="message-circle" class="box-clock"></i>-->
                    <!--<span class="box-time">21 new</span>-->
                <!--</div>-->

            </div>
            <div class="box-img has-background-image" data-background="https://via.placeholder.com/940x650" data-demo-background="<?php echo base_url($group->groupImageUrl) ?>"></div>
            <a href="<?php echo base_url("Group/groupDetail/".$group->groupId) ?>" class="box-link">
                <div class="box-img--hover has-background-image" data-background="https://via.placeholder.com/940x650" data-demo-background="<?php echo base_url($group->groupImageUrl) ?>"></div>
            </a>
            <div class="box-info">
                <span class="box-category"><?php echo $group->groupPrivacy; ?></span>
                <h3 class="box-title"><?php echo $group->groupName; ?></h3>
                <span class="box-members">
                    <a href="#"><?php echo $group->totalMemeber; ?> members</a>
                    <!--<div class="members-preview">-->
                    <!--    <img src="https://via.placeholder.com/150x150" data-demo-src="<?php echo base_url() ?>assets/img/avatars/nelly.png" data-user-popover="9" alt="">-->
                    <!--    <img src="https://via.placeholder.com/150x150" data-demo-src="<?php echo base_url() ?>assets/img/avatars/stella.jpg" data-user-popover="2" alt="">-->
                    <!--    <img src="https://via.placeholder.com/150x150" data-demo-src="<?php echo base_url() ?>assets/img/avatars/jenna.png" data-user-popover="0" alt="">-->
                    <!--</div>-->
                </span>
            </div>
        </article>
    </div>
    <?php } ?>

</div>

<!-- Load more groups -->
<!--<div class=" load-more-wrap narrow-top has-text-centered">-->
<!--    <a href="#" class="load-more-button">Load More</a>-->
<!--</div>-->

</div>