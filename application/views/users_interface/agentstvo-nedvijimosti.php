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
			<?php if(count($estate)>0):?>
				<h2><?=$estate[0]['rooms'].'-к квартира'.'<br/>'.$estate[0]['address'];?> <span class="details">Площадь <?=$estate[0]['area'];?>м<sup>2</sup></span></h2>
				<div class="grid_1">
					<div class="slider-arrow left">Пред.</div>
				</div>
				<div class="slider">
					<div class="grid_14 alpha omega">
						<div class="design-sample">
						<?php for($i=0;$i<count($estate[0]['images']);$i++):?>
							<img src="<?=$baseurl.$this->uri->uri_string();?>/viewimage/<?=$estate[0]['images'][$i]['id'];?>" alt=""/>
						<?php endfor;?>
							<?=anchor('design-interierov/'.$objects[0]['translit'].'/'.$estate[0]['translit'],$estate[0]['title']);?>
							<p>
								<?=$estate[0]['note'];?>
							</p>
						</div>
					</div>
				</div>
				<div class="grid_1">
					<div class="slider-arrow right">След.</div>
				</div>
			<?php else:?>
				<?php if(isset($objects[0])):?>
					<?php if($loginstatus['status']):?>
						<a class="btn btn-success" data-toggle="modal" href="#addEstate"><i class="icon-plus"></i> Добавить первую недвижимость</a>
					<?php endif;?>
				<?php endif;?>
			<?php endif;?>
			</div>
			<div class="grid_7 prefix_1">
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
				</div>
			</div>
			<div class="clearfix"></div>
			<?php if(isset($objects[0]) && !count($estate)):?>
				<?php if($loginstatus['status']):?>
					<?php $this->load->view('modal/admin-add-estate');?>
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
			$("#addInterior").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
		});
	</script>
</body>
</html>