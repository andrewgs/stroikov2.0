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
				<h2><?=$interior['title'].'<br/>'.$interior['address'];?> <span class="details">Площадь <?=$interior['area'];?>м<sup>2</sup></span></h2>
				<div class="grid_1">
					<a id="prev" href="#" class="slider-arrow left">Пред.</a>
				</div>
				<div class="grid_14 alpha omega">
					<div class="slider">
						<div id="samples">
						<? for($i=0;$i<count($interior['images']);$i++):?>
							<div class="design-sample">
								<img src="<?=$baseurl.$this->uri->uri_string();?>/viewimage/<?=$interior['images'][$i]['id'];?>" alt=""/>
							</div>
							<? if($loginstatus['status']): ?>
								<button class="btn btn-success dlImage" data-img="<?=$interior['images'][$i]['id'];?>" data-toggle="modal" href="#deleteImage"> <i class="icon-trash"></i> Удалить фотографию</button>
							<? endif;?>							
						<? endfor;?>
						</div>
						<?=anchor($this->uri->uri_string(),$interior['title']);?>
						<p><?=$interior['note'];?></p>
					<? if($loginstatus['status']):?>
						<button class="btn btn-success" data-toggle="modal" href="#addImage"><i class="icon-download-alt"></i> Загрузить фотографию</button>
						<button class="btn btn-success" data-toggle="modal" href="#editInterior"><i class="icon-pencil"></i> Редактировать интерьер</button>
						<button class="btn btn-danger" data-toggle="modal" href="#deleteInterior"><i class="icon-trash"></i> Удалить интерьер</button>
					<? endif;?>
					</div>
				</div>
				<div class="grid_1">
					<a id="next" href="#" class="slider-arrow right">След.</a>
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
					<h3>Смотреть интерьеры</h3>
					<ul>
				<? for($i=0;$i<count($objects);$i++):?>
					<? if(!empty($objects[$i]['interiors']) || $loginstatus['status']):?>
						<li><?=$objects[$i]['title'];?></li>
						<? for($j=0;$j<count($objects[$i]['interiors']);$j++):?>
							<!-- <li><?=anchor('design-interierov/'.$objects[$i]['translit'].'/'.$objects[$i]['interiors'][$j]['translit'],$objects[$i]['interiors'][$j]['rooms'].'-к квартира');?> <?= $objects[$i]['interiors'][$j]['address']; ?></li> -->
							<li><?=anchor('design-interierov/'.$objects[$i]['translit'].'/'.$objects[$i]['interiors'][$j]['translit'],$objects[$i]['interiors'][$j]['title']);?> </li>
						<? endfor;?>
					<? endif;?>
				<? endfor;?>
					</ul>
					<? if($loginstatus['status']):?>
						<a class="details" style="right:119px;" data-toggle="modal" href="#addInterior"><i class="icon-plus"></i> Добавить интерьер</a>
					<? endif;?>
				</div>
			</div>
			<div class="clear"></div>
			<? if($loginstatus['status']):?>
				<? $this->load->view('modal/admin-add-interior');?>
				<? $this->load->view('modal/admin-edit-interior');?>
				<? $this->load->view('modal/admin-delete-interior');?>
				<? $this->load->view('modal/admin-add-image');?>
				<? $this->load->view('modal/admin-delete-image');?>
			<? endif;?>
		</section>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>
	<script type="text/javascript">
		$(document).ready(function(){
		<? if($loginstatus['status']):?>
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
			
			$("#edsend").click(function(event){
				var err = false;
				$(".control-group").removeClass('error');
				$(".help-inline").hide();
				$(".edinput").each(function(i,element){
					if($(this).val()==''){
						$(this).parents(".control-group").addClass('error');
						$(this).siblings(".help-inline").html("Поле не может быть пустым").show();
						err = true;
					}
				});
				if(err){event.preventDefault();}
			});
			$("#editInterior").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
			
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
			$("#DelInterior").click(function(){location.href='<?=$baseurl?>admin-panel/<?=$this->uri->uri_string();?>/delete-interior/id/<?=$interior['id'];?>'});
			$("#deleteInterior").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
			$(".dlImage").click(function(){image = $(this).attr('data-img');});
			$("#DelImage").click(function(){location.href='<?=$baseurl;?>admin-panel/design-interierov/<?=$this->uri->segment(2);?>/<?=$this->uri->segment(3);?>/delete/image/'+image});
			$("#addImage").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
		<? endif;?>
		<? if(!$loginstatus['status']): ?>
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
		<? endif;?>
		});
	</script>
</body>
</html>