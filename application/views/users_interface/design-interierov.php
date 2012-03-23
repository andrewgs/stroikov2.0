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
			<?php if(count($interior)>0):?>
				<h2><?=$interior[0]['title'].', '.$interior[0]['rooms'].'-комн.'.'<br/>'.$interior[0]['address'];?> <span class="details">Площадь <?=$interior[0]['area'];?>м<sup>2</sup></span></h2>
				<div class="grid_1">
					<a href="#" id="prev" class="slider-arrow left">Пред.</a>
				</div>
				<div class="grid_14 alpha omega">
					<div class="slider">
						<div id="samples">
							<?php for($i=0;$i<count($interior[0]['images']);$i++):?>
							<div class="design-sample">
								<img src="<?=$baseurl.$this->uri->uri_string();?>/viewimage/<?=$interior[0]['images'][$i]['id'];?>" alt=""/>
							</div>
							<?php endfor;?>
						</div>
						<?=anchor('design-interierov/'.$objects[0]['translit'].'/'.$interior[0]['translit'],$interior[0]['title']);?>
						<p>
							<?=$interior[0]['note'];?>
						</p>
					</div>
				</div>
				<div class="grid_1">
					<a href="#" id="next" class="slider-arrow right">След.</a>
				</div>
			<?php else:?>
				<?php if(isset($objects[0])):?>
					<?php if($loginstatus['status']):?>
						<a class="btn btn-success" data-toggle="modal" href="#addInterior"><i class="icon-plus"></i> Добавить первый интерьер</a>
					<?php endif;?>
				<?php endif;?>
			<?php endif;?>
			</div>
			<div class="grid_7 prefix_1">
				<!--
				<div class="aside-block green">
					<a href="#" class="promo-action">
						<p><strong>Заказать</strong> дизайн интерьера <strong>сейчас!</strong></p>
					</a>
				</div>
				-->
				<div class="aside-block list">
					<h3>Смотреть интерьеры</h3>
					<ul>
				<?php for($i=0;$i<count($objects);$i++):?>
					<?php if(!empty($objects[$i]['interiors']) || $loginstatus['status']):?>
						<li><?=$objects[$i]['title'];?></li>
						<?php for($j=0;$j<count($objects[$i]['interiors']);$j++):?>
							<!-- <li><?=anchor('design-interierov/'.$objects[$i]['translit'].'/'.$objects[$i]['interiors'][$j]['translit'],$objects[$i]['interiors'][$j]['rooms'].'-к квартира');?> <?= $objects[$i]['interiors'][$j]['address']; ?></li> -->
							<li><?=anchor('design-interierov/'.$objects[$i]['translit'].'/'.$objects[$i]['interiors'][$j]['translit'],$objects[$i]['interiors'][$j]['title']);?> </li>
						<?php endfor;?>
					<?php endif;?>
				<?php endfor;?>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
			<?php if(isset($objects[0]) && !count($interior)):?>
				<?php if($loginstatus['status']):?>
					<?php $this->load->view('modal/admin-add-interior');?>
				<?php endif;?>
			<?php endif;?>
		</section>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>
	
	<script type="text/javascript">
		$(document).ready(function(){
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
		});
	</script>
</body>
</html>