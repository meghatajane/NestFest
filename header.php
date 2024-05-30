<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
     	<meta content="width=device-width, initial-scale=1.0" name="viewport">
     	<meta name="description" content="">
      	<meta name="author" content="">
        <META NAME="ROBOTS" CONTENT="NOINDEX"></META>
      	<title><?php echo APP_NAME; ?></title>
        
        <link rel="icon" href="<?php echo base_url('public/images/favicon.jpg'); ?>">
    	<link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap/bootstrap.min.css'); ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url('public/css/preloader.css'); ?>"  media="screen">
        <link rel="stylesheet" href="<?php echo base_url('public/css/preloader-default.css'); ?>"  media="screen">
        <link rel="stylesheet" href="<?php echo base_url('public/css/flexslider/flexslider.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('public/css/animate/animate.css'); ?>" type="text/css">       
        <link rel="stylesheet" href="<?php echo base_url('public/css/countdown/jquery.countdown.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('public/css/magnific-popup/magnific-popup.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('public/css/owlcarousel/owl.carousel.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('public/css/owlcarousel/owl.theme.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('public/css/fonts/fontello/css/fontello.css'); ?>" type="text/css" media="screen" />

        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
     
    	<link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet" media="screen">
        
        <!-- Skin CSS -->
    	<!-- <link href="css/skin/light-teal/light-teal.css" rel="stylesheet" media="screen"> -->
        <!-- <link href="css/skin/light-teal/light-teal-reverse-navbar.css" rel="stylesheet" media="screen"> -->
        <!-- <link href="css/skin/pattern/pattern-1.css" rel="stylesheet" media="screen"> -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
        <style>
            body, p, span, strong, h1, h3, h5 {
                font-family: 'Readex Pro', sans-serif !important;
            }
            .app-header {
                background-color: #87CEEB !important;
            }
        </style>
        <script src="<?php echo base_url('public/js/jquery-1.11.1.min.js'); ?>"></script>
	</head>
    <body>
        <div id="preloader">
            <div class="alignment">
                <div class="v-align center-middle"> 
                    <div class="heart-animation">                   
                        <i class="de-icon-heart"></i>
                    </div>
                    <div class="heart-animation-reverse">
                        <i class="de-icon-heart"></i>
                    </div>        
                </div>
            </div>
        </div>
        <header id="nav-header">
            <nav id="nav-bar" class="top-bar fluid-width transparent nav-center sticky-nav animation fadeInDown">
                <div id="nav-wrapper">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <div class="css-logo rounded">
                                <div class="css-logo-text">
                                    <strong><?php echo APP_NAME; ?></strong><i class="de-icon-heart-1"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="mobile-nav">
                        <i class="de-icon-menu"></i>
                    </div>
                    <ul id="nav-menu">
                        <li class="first-child"><a href="<?php echo base_url(); ?>">HOME</a></li>
                        <li><a href="<?php echo base_url('our-story'); ?>">THE STORY</a></li>
                        <li><a href="<?php echo base_url('our-hosts'); ?>">HOSTS</a></li>
                        <li><a href="<?php echo base_url('our-events'); ?>">EVENTS</a></li>
                        <li class="first-child split-margin"><a href="<?php echo base_url('our-gallery'); ?>">GALLERY</a></li>
                        <li><a href="<?php echo base_url('invitation-card'); ?>">INVITATION CARD</a></li>
                        <li><a href="<?php echo base_url('our-family'); ?>">KITHORIYA FAMILY</a></li>
                        <!-- <li><a href="#">CONTACT</a></li> -->
                    </ul>
                    <div class="clearboth"></div>
                </div>
            </nav>
        </header>
        <?= $this->renderSection('main_content'); ?>
        <footer>
            <div class="image-divider fixed-height" style="background-image:url(public/<?php echo setting('home_footer_banner'); ?>);" data-stellar-background-ratio="0.5" >
                <div class="divider-overlay"></div>
                <div class="alignment"> 
                    <div class="v-align center-middle">                     
                        <div class="container">                      
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="animation fadeInUp">
                                        <div id="thank-you">
                                            <div id="thank">Thank</div>
                                            <div id="you">You</div>
                                        </div>
                                    </div>
                                    <div class="heart-divider animation delay1 fadeInUp">
                                        <span class="white-line"></span>
                                        <i class="de-icon-heart pink-heart"></i>
                                        <i class="de-icon-heart white-heart"></i>
                                        <span class="white-line"></span>
                                    </div>
                                    <div id="footer-couple-name" class="animation delay1 fadeInUp">
                                        <?php echo strtoupper(setting('app_groom_name')); ?> & <?php echo strtoupper(setting('app_bridal_name')); ?>
                                    </div>                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?php echo base_url('public/js/pace/pace.min.js'); ?>"></script> 
        <script src="<?php echo base_url('public/js/bootstrap/bootstrap.js'); ?>"></script>    
        <script src="<?php echo base_url('public/js/modernizr/modernizr.js'); ?>"></script>  
        <script src="<?php echo base_url('public/js/devicejs/device.js'); ?>"></script>  
        <script src="<?php echo base_url('public/js/tinynav/tinynav.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/smoothscroll/jquery.smooth-scroll.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/flexslider/jquery.flexslider.js'); ?>"></script>  
        <script src="<?php echo base_url('public/js/sticky/jquery.sticky.js'); ?>"></script>  
        <script src="<?php echo base_url('public/js/waypoint/jquery.waypoints.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/jquery-ui-widget/jquery.ui.widget.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/jquery-doubletaptogo/jquery.dcd.doubletaptogo.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/vide/jquery.vide.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/stellar/jquery.stellar.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/masonry/masonry.pkgd.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/countdown/jquery.plugin.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/countdown/jquery.countdown.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/countdown/jquery.countdown-custom-label.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/magnific-popup/jquery.magnific-popup.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/owlcarousel/owl.carousel.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/js/script.js'); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('public/js/main-slider-fade.js'); ?>"></script>
    </body>
</html>