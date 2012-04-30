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
			<? $this->load->view('alert_messages/alert-error');?>
			<? $this->load->view('alert_messages/alert-success');?>
			<?php if(count($allobjects)>0):?>
				<h1>Ремент <span class="details">Список ремонтных объектов компании Стройковъ</span></h1>
				<div class="grid_16 alpha omega">
					<div class="slider interiors" id="samples-row">
				<?php for($i=0;$i<count($allobjects);$i++):?>
						<div class="design-row">
							<div class="design-sample">
								<div class="frame">
									<div class="inner">
										<img alt="<?=$allobjects[$i]['phtitle'];?>" src="<?=$this->uri->uri_string();?>/viewsmallimage/<?=$allobjects[$i]['phid']?>">
									</div>
								</div>
								<a class="caption" href="<?=$baseurl;?>remont/object/<?=$allobjects[$i]['translit'];?>">
									<?=$allobjects[$i]['title'];?> 
									<? if ( !$allobjects[$i]['over'] ): ?><span class="details">Объект в работе</span><? endif; ?>
								</a>
								<div class="note">
									<?=$allobjects[$i]['note'];?>
								</div>
							</div>
						</div>
				<?php endfor;?>
					</div>
				</div>
			<?php else:?>
				<h1>На данный момент ремонтирующихся объектов нет! Можете ознакомится с завершенными объектами</h1>
				<?php if($loginstatus['status']):?>
					<a class="btn btn-success" data-toggle="modal" href="#addObject"><i class="icon-plus"></i> Добавить строящийся объект</a>
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
				<div class="aside-block green">
					<a href="#" class="promo-action">
						<p><strong><nobr>Скидка 10%</nobr></strong> ремонт помещений</p>
					</a>
				</div>
				<div class="aside-block list">
					<h3>Ремонтируемые объекты</h3>
					<ul>
				<?php if(isset($objects['current'])):?>
					<?php for($i=0;$i<count($objects['current']);$i++):?>
						<li><?=anchor('remont/object/'.$objects['current'][$i]['translit'],$objects['current'][$i]['title']);?></li>
					<?php endfor;?>
				<?php endif;?>
					</ul>
					<a href="#" class="details">Подробнее &gt;</a>
				</div>
				<div class="aside-block list">
					<h3>Сданные объекты</h3>
					<ul>
				<?php if(isset($objects['over'])):?>
					<?php for($i=0;$i<count($objects['over']);$i++):?>
						<li><?=anchor('remont/object/'.$objects['over'][$i]['translit'],$objects['over'][$i]['title']);?></li>
					<?php endfor;?>
				<?php endif;?>
					</ul>
					<a href="#" class="details">Подробнее &gt;</a>
				</div>
			</div>
			<div class="clear"></div>
			<?php if(!count($objects['current'])):?>
				<?php if($loginstatus['status']):?>
					<?php $this->load->view('modal/admin-add-remonta');?>
				<?php endif;?>
			<?php endif;?>
		</section>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#send").click(function(event){
				var err = false;
				$(".control-group").removeClass('error');
				$(".help-inline").hide();
				$(".linput").each(function(i,element){
					if($(this).val()==''){
						$(this).parents(".control-group").addClass('error');
						$(this).siblings(".help-inline").html("Поле не может быть пустым").show();
						err = true;
					}
				});
				if(err){event.preventDefault();}
			});
			$("#addObject").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
			
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