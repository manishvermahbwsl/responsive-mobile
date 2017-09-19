<?php
$responsive_options = responsive_mobile_get_options();
?>
<div id="contact_us_section" style="background-image: url(<?php echo get_template_directory_uri().'/images/contact_bg.jpg'?>)">
    <div id="contact_us_wrapper" class="container">
        <div class="contact_content row">
            <?php
            $responsive_contact_title = isset( $responsive_options['contact_title']) ?  $responsive_options['contact_title'] : 'Get In Touch';
             if($responsive_contact_title){
            ?>
            <h2 class="section_title"> 
			<span><?php echo esc_html($responsive_contact_title); ?></span>
            </h2>
             <?php } ?>
            <div class="contact_form col-lg-6 col-md-6">
              <?php echo do_shortcode($responsive_options['contact_form']);?>
            </div>
            <div class="contact_info col-lg-6 col-md-6">
                <div class="contact_info_right col-lg-12 col-md-12">
                    <?php if($responsive_options['contact_address']) {?>
                    <div class="row contact_address">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-sm-12">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12">
                                  <?php echo $responsive_options['contact_address'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } 
                    if($responsive_options['contact_number']){
                    ?>
                    <div class="row contact_number">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-sm-12">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12">
                                  <?php echo $responsive_options['contact_number']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    if($responsive_options['contact_email']){
                    ?>
                     <div class="row contact_email">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-sm-12">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12">
                                  <?php echo $responsive_options['contact_email']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        
        </div>
    </div>
</div>