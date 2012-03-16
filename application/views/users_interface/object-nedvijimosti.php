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
				<h2><?=$estate['rooms'].'-к квартира'.'<br/>'.$estate['address'];?> <span class="details">Площадь <?=$estate['area'];?>м<sup>2</sup></span></h2>
				<div class="grid_1">
					<div class="slider-arrow left">Пред.</div>
				</div>
				<div class="slider">
					<div class="grid_14 alpha omega">
						<div class="design-sample">
						<?php for($i=0;$i<count($estate['images']);$i++):?>
							<img src="<?=$baseurl.$this->uri->uri_string();?>/viewimage/<?=$estate['images'][$i]['id'];?>" alt=""/>
								<button class="btn btn-success dlImage" img="<?=$estate['images'][$i]['id'];?>" data-toggle="modal" href="#deleteImage"><i class="icon-trash"></i> Удалить фотографию</button>
						<?php endfor;?>
							<?=anchor($this->uri->uri_string(),$estate['title']);?>
							<p>
								<?=$estate['note'];?>
							</p>
						</div>
						<?php if($loginstatus['status']):?>
							<button class="btn btn-success" data-toggle="modal" href="#addImage"><i class="icon-download-alt"></i> Загрузить фотографию</button>
						<?php endif;?>
					</div>
				</div>
				<div class="grid_1">
					<div class="slider-arrow right">След.</div>
				</div>
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
					<h3>Смотреть объекты</h3>
					<ul>
					<?php for($i=0;$i<count($objects);$i++):?>
						<li><h4><?=$objects[$i]['title'];?></h4></li>
						<?php for($j=0;$j<count($objects[$i]['estate']);$j++):?>
							<li><?=anchor('agentstvo-nedvijimosti/'.$objects[$i]['translit'].'/'.$objects[$i]['estate'][$j]['translit'],$objects[$i]['estate'][$j]['title']);?></li>
						<?php endfor;?>
					<?php endfor;?>
					</ul>
					<?php if($loginstatus['status']):?>
						<a class="details" style="right:120px;" data-toggle="modal" href="#addEstate"><i class="icon-plus"></i> Добавить объект</a>
					<?php endif;?>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php if($loginstatus['status']):?>
				<?php $this->load->view('modal/admin-add-estate');?>
				<?php $this->load->view('modal/admin-add-image');?>
				<?php $this->load->view('modal/admin-delete-image');?>
			<?php endif;?>
		</section>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>
<?php if($loginstatus['status']):?>
	<script type="text/javascript">
		$(document).ready(function(){
			var image = 0;
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
			$("#addInterior").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
			$("#imgsend").click(function(event){
				var err = false;
				$(".control-group").removeClass('error');
				$(".help-inline").hide();
				$(".imginput").each(function(i,element){
					if($(this).val()==''){
						$(this).parents(".control-group").addClass('error');
						$(this).siblings(".help-inline").html("Поле не может быть пустым").show();
						err = true;
					}
				});
				if(err){event.preventDefault();}
			});
		
			$(".dlImage").click(function(){image = $(this).attr('img');});
			$("#DelImage").click(function(){location.href='<?=$baseurl;?>admin-panel/agentstvo-nedvijimosti/<?=$this->uri->segment(2);?>/<?=$this->uri->segment(3);?>/delete/image/'+image});
			$("#addImage").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
		});
	</script>
<?php endif;?>
</body>
</html>