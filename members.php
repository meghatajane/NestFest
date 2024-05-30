<?= $this->extend('header'); ?>
<?= $this->section('main_content'); ?>
<section id="main-slider" class="fixed-height" style="height:700px">      	
	<div class="slide-title-outter-wrapper">
		<div class="slide-title-inner-wrapper">
			<div class="slide-title align-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">                                
							<div class="page-title">
								<div class="de-icon circle outline light large-size aligncenter animation fadeInUp">
									<i class="de-icon-heart"></i>
            					</div>
                             	<h1 class="animation fadeInUp">Kithoriya Family</h1>
                               	<div class="heart-divider animation fadeInUp">
                            		<span class="white-line"></span>
                                	<i class="de-icon-heart pink-heart"></i>
                                	<i class="de-icon-heart white-heart"></i>
                                	<span class="white-line"></span>
                           		</div>
                              	<p class="animation delay1 fadeInUp">
                            		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam non bibendum dolor. Ut vel turpis 
                            	</p>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="slides">
    	<div data-stellar-ratio="0.5" class="slide-image" style="background-image:url(<?php echo base_url('public/'.setting('story_banner')) ?>); background-position:top">
        </div>
        <div class="slide-overlay" style="opacity:0.25"> </div>                               
	</div>
</section>
<section id="content"><br><br>
	<div class="container">
		<div class="row">
			<?php
				if($members) {
					foreach($members as $member) {
			?>
						<div class="blog-wrapper col-md-4">
							<div class="photo-item animation fadeIn">
								<img src="<?php echo base_url('public/uploads/members/'.$member['avatar']); ?>" alt="" class="hover-animation image-zoom-in">
			                   	<div class="layer wh100 hidden-black-overlay hover-animation fade-in"></div>
			                    <div class="layer wh100 hidden-link hover-animation delay1 fade-in">
			                    	<div class="alignment">
			                      		<div class="v-align center-middle">
			                         		<a href="<?php echo base_url('public/uploads/members/'.$member['avatar']); ?>" class="magnific-zoom">
												<div class="de-icon circle light medium-size inline">
			    									<i class="de-icon-zoom-in"></i>
			    								</div>
											</a>
			                           	</div>
			             			</div>
			                  	</div>
			              	</div> 
			              	<div class="title-excerpt animation fadeIn">
			                  	<div class="de-icon circle very-small-size custom-heart-icon">
			    					<i class="de-icon-heart"></i>
			    				</div>
			    				<h5 style="text-align: center;text-transform: uppercase;">
			    					<b><?php echo $member['name']; ?></b>
			    				</h5>
			                   	<p><center><?php echo $member['comment']; ?></center></p>
			                   	<?php
			                   		if($member['is_linkable'] == 1) { 
			                   	?>
			                   			<center><small><a href="<?php echo base_url('family-member/'.$member['id']); ?>">Click here to see his family.</a></small></center>
			                   	<?php 
			                   		}
			                   	?>
			             	</div>
			        	</div>
			<?php
					}
				} 
			?>
        </div>
        <center><a href="<?php echo base_url('our-family'); ?>" class="btn btn-sm btn-info">Back</a></center>
        <br><br><br>
  	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$("footer").remove();
	});
</script>
<?= $this->endSection(); ?>