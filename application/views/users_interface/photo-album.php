<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?=$this->load->view('users_interface/head');?>
<body>
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<div class="container_24">
		<?=$this->load->view('users_interface/header');?>
		<?=$this->load->view('users_interface/navigation');?>
		
		<section class="proposals">
			<div class="grid_16 carousel list">
				<?php $this->load->view('alert_messages/alert-error');?>
				<?php $this->load->view('alert_messages/alert-success');?>
				<h2>Фотоальбом</h2>
				<div class="grid_1">
					<a href="#" id="prev" class="slider-arrow left">Пред.</a>
				</div>
				<div class="grid_14 alpha omega">
					<div class="slider">
						<div id="samples">
						<?php for($i=0;$i<count($album);$i++):?>
							<div class="design-sample">
								<img src="<?=$baseurl;?>o-kompanii/photo-album/slideshow/viewimage/<?=$album[$i]['id'];?>" alt=""/>
							</div>
							<?php if($loginstatus['status']):?>
								<button class="btn btn-success dlImage" img="<?=$album[$i]['id'];?>" data-toggle="modal" href="#deleteImage"><i class="icon-trash"></i> Удалить фотографию</button>
							<?php endif;?>
						<?php endfor;?>
						</div>
					</div>
				</div>
				<div class="grid_1">
					<a href="#" id="next" class="slider-arrow right">След.</a>
				</div>
			</div>
			<div class="grid_7 prefix_1">
				<div class="aside-block list">
				<? if($loginstatus['status']):?>
					<a class="details" data-toggle="modal" href="#addPhotoAlbum"><i class="icon-plus"></i> Добавить фотографии в альбом</a>
				<? endif;?>
				</div>
				<div class="aside-block green">
					<a class="promo-action" href="#">
					</a>
				</div>
			</div>
			<div class="clear"></div>
			<?php if($loginstatus['status']):?>
				<?php $this->load->view('modal/admin-add-photoalbum');?>
				<?php $this->load->view('modal/admin-delete-image');?>
			<?php endif;?>
		</section>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>

	<script type="text/javascript">
		$(document).ready(function(){
		<?php if($loginstatus['status']):?>
			var image = 0;
			$(".dlImage").click(function(){image = $(this).attr('img');});
			$("#DelImage").click(function(){location.href='<?=$baseurl;?>admin-panel/photo-album/delete/image/'+image});
		<?php endif;?>
		<?php if(!$loginstatus['status']): ?>
			
			var img = $('.design-sample:first img')[0]; // Get my img elem
			var pic_real_width, pic_real_height;
			var first = true;
			$("<img/>") // Make in memory copy of image to avoid css issues
			    .attr("src", $(img).attr("src"))
			    .load(function() {
			        pic_real_width = this.width;   // Note: $(this).width() will not
			        pic_real_height = this.height; // work for in memory images.
			        console.log(pic_real_height);
			        console.log( $('div#samples').height() );
			        $('div#samples').height(pic_real_height + 10);
			        console.log( $('div#samples').height() ); 
			    });

			$('div#samples').cycle({
				fx:     'scrollHorz',
				speed:  '2000',
				easing: 'easeInOutExpo',
				timeout:  0,
				prev:    '#prev',
				next:    '#next',
				containerResize: 0,
				slideResize: 1,
				width: 550,
				before: function(currSlideElement, nextSlideElement, options, forwardFlag) {
					if ( !first ) {
						$('div#samples').animate({ height: $(nextSlideElement).height() }, 2000, 'easeInOutExpo');						
					}
					first = false;
				},
				fit: 1
			}); 
		<?php endif;?>
		});
	</script>
</body>
</html>