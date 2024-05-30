<?= $this->extend('header'); ?>
<?= $this->section('main_content'); ?>
<section id="main-slider" class="flexslider fullscreen">      	
	<div class="slide-title-outter-wrapper">
		<div class="slide-title-inner-wrapper">
			<div class="slide-title align-middle">
              	<div class="container">
                  	<div class="row">
                  		<div class="col-md-offset-3 col-md-6 animation delay1 fadeInUp">
							<div id="save-the-date">
								<div id="save">Save</div>
                            	<div id="the-date">The Date</div>
                            	<div id="date">- <?php echo date('d',strtotime(setting('app_save_date'))); ?><span class="pink-dot">-</span><?php echo date('m',strtotime(setting('app_save_date'))); ?><span class="pink-dot">-</span><?php echo date('Y',strtotime(setting('app_save_date'))); ?> -</div>
                            </div>
                            <div class="banner-text light medium" style="letter-spacing:3px">
                            	<h4>*** WE ARE GETTING MARRIED ***</h4>
                            </div>         
                            <div class="heart-divider" style="margin:0">
                            	<span class="white-line" style="width:10px"></span>
                                <i class="de-icon-heart pink-heart"></i>
                                <i class="de-icon-heart white-heart"></i>
                                <span class="white-line" style="width:10px"></span>
                            </div>
                        </div> 
					</div>
				</div>
			</div> 
		</div>
   	</div>
   	<ul class="slides">
   		<?php
   			if($banners) {
   				foreach($banners as $banner) {
   		?>
   					<li>
			        	<div data-stellar-ratio="0.5" class="slide-image" style="background-image:url(public/uploads/banners/<?php echo $banner['avatar']; ?>);">
			            </div>
			            <div class="slide-overlay" style="opacity:0.2"> </div> 
					</li>
   		<?php
   				}
   			} 
   		?>
	</ul>       
</section>
<section id="content">
	<section id="couple">
     	<div class="container">
     		<div class="row">
            	<div class="col-md-offset-1 col-md-10 text-center">
                    <div class="section-title animation fadeInUp">
                		<h1>THE HAPPY COUPLE</h1>
                    	<p class="blurb"></p>
                    	<div class="heart-divider">
                    		<span class="grey-line"></span>
                      		<i class="de-icon-heart pink-heart"></i>
                       		<i class="de-icon-heart grey-heart"></i>
                      		<span class="grey-line"></span>
                		</div>
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-5">
                	<div class="photo-item animation fadeInLeft">
                		<img src="<?php echo base_url('public/uploads/couples/'.$couples[0]['avatar']); ?>" alt="" class="hover-animation image-zoom-in" />
                		<div class="layer wh95 hidden-black-overlay hover-animation fade-in"></div>
               			<div class="layer wh95 border-photo-caption hover-animation fade-out">
                        	<div class="alignment">
                        		<div class="v-align center-bottom">
                                	<div>
                    					<div class="heart-divider" style="margin:0">
                                    		<i class="de-icon-heart pink-heart"></i>
                            				<i class="de-icon-heart white-heart"></i>
                                		</div>
                                		<div class="banner-text light small" style="letter-spacing:3px;">
                        					<h4>*** THE GROOM ***</h4>
                       					</div>  
                                    </div>
                            	</div>
                            </div>
                        </div>
                        <div class="layer wh100 hidden-link hover-animation delay1 fade-in">
                         	<div class="alignment">
                        		<div class="v-align center-middle">
                         			<a href="javascript:;" class="de-button outline medium">
                                    	<?php echo $couples[0]['name']; ?>
                                    </a>
                          		</div>
                            </div>
                        </div>
					</div>                              
					<p class="couple-excerpt animation fadeInLeft">
	                	<?php echo $couples[0]['comment']; ?>
	                </p>
	            </div>
              	<div class="col-md-5">
              		<div class="photo-item animation fadeInRight">
              			<img src="<?php echo base_url('public/uploads/couples/'.$couples[1]['avatar']); ?>" alt="" class="hover-animation image-zoom-in">
              			<div class="layer wh95 hidden-black-overlay hover-animation fade-in"></div>
               			<div class="layer wh95 border-photo-caption hover-animation fade-out">
                        	<div class="alignment">
                        		<div class="v-align center-bottom">
                                	<div>
                                		<div class="heart-divider" style="margin:0">
                                    		<i class="de-icon-heart pink-heart"></i>
                            				<i class="de-icon-heart white-heart"></i>
                                		</div>
                                		<div class="banner-text light small" style="letter-spacing:3px;">
                        					<h4>*** THE BRIDE ***</h4>
                       					</div>  
                                    </div>
                            	</div>
                            </div>
                        </div>
                      	<div class="layer wh95 hidden-link hover-animation delay1 fade-in">
                        	<div class="alignment">
                        		<div class="v-align center-middle">
                         			<a href="javascript:;" class="de-button outline medium">
                                    	<?php echo $couples[1]['name']; ?>
                                    </a>
                          		</div>
                            </div>
                        </div>
					</div>
                  	<p class="couple-excerpt animation fadeInRight">
                    	<?php echo $couples[1]['comment']; ?>
                    </p>
                </div>
          	</div>
    	</div>
  	</section>
  	<section id="location-countdown">
    	<div class="image-divider auto-height" style="background-image:url(public/countdown_banner.jpg);" data-stellar-background-ratio="0.5">
            <div class="divider-overlay"></div>
            <div class="container">                 	 
            	<div class="row">
                	<div class="col-md-offset-1 col-md-10 text-center">
        	 			<div class="banner-text light medium animation fadeInUp" style="letter-spacing:3px;">
             				<h4>*** <?php echo strtoupper(setting('app_location')); ?> ***</h4>
             			</div>   
                        <div class="animation fadeInUp">
	             			<div id="counting-down">
	             				<div id="counting">Counting</div>
	                    		<div id="down">Down</div>
	             			</div>
                        </div>
                		<div class="heart-divider animation fadeInUp">
                			<span class="white-line"></span>
                			<i class="de-icon-heart pink-heart"></i>
                			<i class="de-icon-heart white-heart"></i>
                			<span class="white-line"></span>
                		</div>
						<div id="countdown" class="simple-countdown animation fadeInUp"></div>
             		</div>
             	</div>
         	</div>
		</div>		
    </section>
    <section id="rsvp">
       	<div class="container">
        	<div class="row">
				<div class="col-md-12 text-center ">
                    <div class="section-title animation fadeInUp">
            			<div class="heart-divider">
							<i class="de-icon-heart pink-heart"></i>
							<i class="de-icon-heart grey-heart"></i>
						</div>
						<h2>ARE YOU ATTENDING?</h2>
						<p>Please reserve before <?php echo date('d M, Y',strtotime(setting('app_save_date'))); ?>.</p>
                        <a href="javascript:;" class="de-button medium animation fadeInUp">RSVP</a>
                    </div>
				</div>
        	</div>
        </div>
	</section>
</section>
<?= $this->endSection(); ?>