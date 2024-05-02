
  <div class="image-grid-wrap">
             
           <div class="col-lg-12">
                        <div class="columns is-multiline">
                    <!--Post-->
                     <?php foreach($photos as $photo){ ?>
                    <div class="column is-4">
                        <div style="background: url('<?php echo base_url($photo['postFileUrl']) ?>');height: 240px;background-size: cover;">
                            
                        </div>
                    </div>
                         <?php } ?>
                    </div>
                </div>
                   <!---->

                        <!-- Load more photos -->
                        <!--<div class=" load-more-wrap has-text-centered">-->
                        <!--    <a href="#" class="load-more-button">Load More</a>-->
                        <!--</div>-->

                    </div>