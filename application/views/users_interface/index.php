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
		
		<section class="promo-block">
			<div class="grid_16">
				<article class="reviews">
					<div class="text">Я очень доволен тем, как преобразилась моя квартира. Спасибо специалистам компании «Стройковъ»!</div>
					<div class="author">Сергей Григорьев, <i>предприниматель</i></div>
					<div class="quote left">«</div>
					<div class="quote right">»</div>
					<div class="client">
						<img alt="Отзывы о компании Стройковъ" src="<?=$baseurl;?>img/client-1.jpg" />
						<a id="read-reviews" href="#">Читать все отзывы &gt;</a>
					</div>
				</article>
			</div>
			<div class="grid_7 prefix_1">
				<div class="aside-block no-margin">
					<h3>Смотреть интерьеры</h3>
					<ul>
				<?php if(count($objects) > 1):?>
					<?php for($i=0;$i<count($objects);$i++):?>
						<li><?=anchor('design-interierov/'.$objects[$i]['translit'],$objects[$i]['title']);?></li>
					<?php endfor;?>
				<?php else:?>
						<h4><?=$objects[0]['title'];?></h4>
					<?php for($i=0;$i<count($interiors);$i++):?>
						<li><?=anchor('design-interierov/'.$objects[0]['translit'].'/'.$interiors[$i]['translit'],$interiors[$i]['title']);?></li>
					<?php endfor;?>
				<?php endif;?>
					</ul>
				<?php if($loginstatus['status']):?>
					<a class="details" style="right:152px;" data-toggle="modal" href="#addObjectType"><i class="icon-plus"></i> Добавить тип</a>
				<?php endif;?>
					<?=anchor('design-interierov','Подробнее &gt;',array('class'=>'details'));?>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>
		
		<section class="proposals">
			<div class="grid_16">
				<div class="carousel">
					<h2>Мы представляем вашему вниманию<br> Новые проекты жилых интерьеров.</h2>
					<div class="grid_1">
						<div class="slider-arrow left">Пред.</div>
					</div>
					<div class="slider">
					<?php for($i=0;$i<count($slideshow);$i+=3):?>
						<?php if(isset($slideshow[$i]['images']['id'])):?>
						<div class="grid_4 alpha">
							<div class="design-sample">
								<img src="<?=$baseurl;?>design-interierov/viewsmallimage/<?=$slideshow[$i]['images']['id'];?>" alt=""/>
								<?=anchor('design-interierov/'.$slideshow[$i]['object'].'/'.$slideshow[$i]['translit'],$slideshow[$i]['title']);?>
								<p><?=$slideshow[$i]['note'];?></p>
								<?=anchor('design-interierov/'.$slideshow[$i]['object'].'/'.$slideshow[$i]['translit'],'Подробнее &gt;');?>
							</div>
						</div>
						<?php endif;?>
						<?php if(isset($slideshow[$i+1]['images']['id'])):?>
						<div class="grid_4 prefix_1">
							<div class="design-sample">
								<img src="<?=$baseurl;?>design-interierov/viewsmallimage/<?=$slideshow[$i+1]['images']['id'];?>" alt=""/>
								<?=anchor('design-interierov/'.$slideshow[$i+1]['object'].'/'.$slideshow[$i+1]['translit'],$slideshow[$i+1]['title']);?>
								<p><?=$slideshow[$i+1]['note'];?></p>
								<?=anchor('design-interierov/'.$slideshow[$i+1]['object'].'/'.$slideshow[$i+1]['translit'],'Подробнее &gt;');?>
							</div>
						</div>
						<?php endif;?>
						<?php if(isset($slideshow[$i+2]['images']['id'])):?>
						<div class="grid_4 prefix_1 omega">
							<div class="design-sample">
								<img src="<?=$baseurl;?>design-interierov/viewsmallimage/<?=$slideshow[$i+2]['images']['id'];?>" alt=""/>
								<?=anchor('design-interierov/'.$slideshow[$i+2]['object'].'/'.$slideshow[$i+2]['translit'],$slideshow[$i+2]['title']);?>
								<p><?=$slideshow[$i+2]['note'];?></p>
								<?=anchor('design-interierov/'.$slideshow[$i+2]['object'].'/'.$slideshow[$i+2]['translit'],'Подробнее &gt;');?>
							</div>
						</div>
						<?php endif;?>
					<?php endfor; ?>
					</div>
					<div class="grid_1">
						<div class="slider-arrow right">След.</div>
					</div>
				</div>
			</div>
			<div class="grid_7 prefix_1">
				<div class="aside-block green">
					<a href="#" class="promo-action">
						<p><strong>Заказать</strong> дизайн интерьера <strong>сейчас!</strong></p>
					</a>
				</div>
				<div class="aside-block green">
					<?=anchor('konkurs-dlya-desainerov-architektorov-stroika1','<p><strong>Промо-акция</strong></p>',array('class'=>'promo-action'));?>
				</div>
				<div class="aside-block">
					<h3>Объекты недвидижимости</h3>
					<ul>
				<?php if(count($objects) > 1):?>
					<?php for($i=0;$i<count($objects);$i++):?>
						<li><?=anchor('obektu-stroitelstva/'.$objects[$i]['translit'],$objects[$i]['title']);?></li>
					<?php endfor;?>
				<?php else:?>
						<h4><?=$objects[0]['title'];?></h4>
					<?php for($i=0;$i<count($estate);$i++):?>
						<li><?=anchor('agentstvo-nedvijimosti/'.$objects[0]['translit'].'/'.$estate[$i]['translit'],$estate[$i]['title']);?></li>
					<?php endfor;?>
				<?php endif;?>
					</ul>
				<?php if($loginstatus['status']):?>
					<a class="details" style="right:152px;" data-toggle="modal" href="#addObjectType"><i class="icon-plus"></i> Добавить тип</a>
				<?php endif;?>
					<?=anchor('agentstvo-nedvijimosti','Подробнее &gt;',array('class'=>'details'));?>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>
		<?php if($loginstatus['status']):?>
			<?php $this->load->view('modal/admin-add-objectstype');?>
		<?php endif;?>
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
			$("#addObjectType").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
		});
	</script>
</body>
</html>