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
			<?php if(count($objects['current'])>0):?>
				<h2><?=$objects['current'][0]['title'];?><span class="details"><?=$objects['current'][0]['address'];?></span></h2>
				<div class="grid_1">
					<a href="#" id="prev" class="slider-arrow left">Пред.</a>
				</div>
				<div class="grid_14 alpha omega">
					<div class="slider">
						<div id="samples">
					<?php for($i=0;$i<count($objects['current'][0]['images']);$i++):?>
						<div class="design-sample">
							<img src="<?=$baseurl.$this->uri->uri_string();?>/viewimage/<?=$objects['current'][0]['images'][$i]['id'];?>" alt=""/>
						</div>
					<?php endfor;?>
						</div>
						<?=anchor('stroitelstvo/object/'.$objects['current'][0]['translit'],$objects['current'][0]['title']);?>
						<p><?=$objects['current'][0]['note'];?></p>						
					</div>
				</div>
				<div class="grid_1">
					<a href="#" id="next" class="slider-arrow right">След.</a>
				</div>
			<?php else:?>
				<h1>На данный момент строящихся объектов нет! Можете ознакомится с завершенными объектами</h1>
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
					<h3>Строящиеся объекты</h3>
					<ul>
				<?php if(isset($objects['current'])):?>
					<?php for($i=0;$i<count($objects['current']);$i++):?>
						<li><?=anchor('stroitelstvo/object/'.$objects['current'][$i]['translit'],$objects['current'][$i]['title']);?></li>
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
						<li><?=anchor('stroitelstvo/object/'.$objects['over'][$i]['translit'],$objects['over'][$i]['title']);?></li>
					<?php endfor;?>
				<?php endif;?>
					</ul>
					<a href="#" class="details">Подробнее &gt;</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php if(!count($objects['current'])):?>
				<?php if($loginstatus['status']):?>
					<?php $this->load->view('modal/admin-add-stroiobjekt');?>
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
			
			$('div#samples').cycle({
				fx:     'scrollHorz',
				speed:  '2000',					
				easing: 'easeInOutExpo',
				timeout:  7000,
				prev:    '#prev',
				next:    '#next'
			}); 
		});
	</script>
</body>
</html>