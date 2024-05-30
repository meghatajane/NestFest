<?= $this->extend('header'); ?>
<?= $this->section('main_content'); ?>
<section id="content">
  	<div id="masonry-gallery" class="masonry four-col">
      	<div class="grid-sizer"></div>
      	<div class="gutter-sizer"></div>
       	<?php
       		if($photos) {
       			foreach($photos as $photo) {
       	?>
       				<div class="masonry-col w25 animation fadeIn">
			       		<div class="photo-item animation fadeIn">
			       			<img src="<?php echo base_url('public/uploads/photos/'.$photo['avatar']); ?>" alt="" class="hover-animation image-zoom-in">
			               	<div class="layer wh100 hidden-black-overlay hover-animation fade-in"></div>
			             	<div class="layer wh100 hidden-link hover-animation delay1 fade-in">
			               		<div class="alignment">
			                		<div class="v-align center-middle">
			                   			<a href="<?php echo base_url('public/uploads/photos/'.$photo['avatar']); ?>" class="magnific-zoom-gallery" title="Gallery-1">
											<div class="de-icon circle light medium-size inline">
			    								<i class="de-icon-zoom-in"></i>
			    							</div>
										</a>
			                  		</div>
			             		</div>
			        		</div>
			        	</div>
			        </div>
       	<?php
       			}
       		} 
       	?>
  	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$("footer").remove();
	});
</script>
<?= $this->endSection(); ?>