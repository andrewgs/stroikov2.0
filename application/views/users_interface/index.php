<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?=$this->load->view('users_interface/head');?>
<body>
	<style type="text/css">
		#stroika-pointer { display: none; }
	</style>
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<div class="container_24">
		<?=$this->load->view('users_interface/header');?>
		<?=$this->load->view('users_interface/navigation');?>
		
		<section class="promo-block">
			<div class="grid_16">
				<article class="reviews">
					<!--
					<div class="text">Я очень доволен тем, как преобразилась моя квартира. Спасибо специалистам компании «Стройковъ»!</div>
					<div class="author">Сергей Григорьев, <i>предприниматель</i></div>
					<div class="quote left">«</div>
					<div class="quote right">»</div>
					<div class="client">
						<img alt="Отзывы о компании Стройковъ" src="<?=$baseurl;?>img/client-1.jpg" />
						<a id="read-reviews" href="#">Читать все отзывы &gt;</a>
					</div>
					-->
					<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
					<div id="ymaps-map-id_133910102875980238531" style="width: 630px; height: 280px;"></div>
					<script type="text/javascript">
					function fid_133910102875980238531(ymaps) {
					    var map = new ymaps.Map("ymaps-map-id_133910102875980238531", {
					        center: [39.7206403764929, 47.22660056062838],
					        zoom: 14,
					        type: "yandex#map"
					    });
					    
					    map.controls
					        .add("zoomControl")
					        //.add("mapTools")
					        //.add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
					    
					    map.geoObjects
					        .add(new ymaps.Placemark([39.706632, 47.22067], {
					            balloonContent: '<div><img src="http://sk-stroikov.ru/img/stroika-5.jpg" /></div>'
					        }, {
					            preset: "twirl#greenDotIcon",
					            //iconImageHref: 'http://sk-stroikov.ru/img/stroika-1.jpg',
					            //iconImageSize: [76, 50]
					            
					        }))
					        .add(new ymaps.Placemark([39.72804195643499, 47.228753221542064], {
					            balloonContent: '<div><img src="http://sk-stroikov.ru/img/stroika-3.jpg" /></div>'
					        }, {
					            preset: "twirl#greenDotIcon"
					        }))
					        .add(new ymaps.Placemark([39.727763006697444, 47.22758387965026], {
					            balloonContent: '<div><img src="http://sk-stroikov.ru/img/stroika-1.jpg" /></div>'
					        }, {
					            preset: "twirl#greenDotIcon"
					        }))
					        .add(new ymaps.Placemark([39.73462946177558, 47.22860705522512], {
					            balloonContent: '<div><img src="http://sk-stroikov.ru/img/stroika-4.jpg" /></div>'
					        }, {
					            preset: "twirl#greenDotIcon"
					        }))
					        .add(new ymaps.Placemark([39.734200308333186, 47.22983483968213], {
					            balloonContent: '<div><img src="http://sk-stroikov.ru/img/stroika-2.jpg" /></div>'
					        }, {
					            preset: "twirl#greenDotIcon"
					        }))
					        .add(new ymaps.Polyline([
					            [39.7000996623163, 47.22192382050796],
					            [39.74104090071961, 47.230752658509076]
					        ], {
					            balloonContent: "улица Пушкинская"
					        }, {
					            strokeColor: "33cc00",
					            strokeWidth: 5,
					            strokeOpacity: 0.8
					        }));

					};
					</script>
					<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_133910102875980238531"></script>
					<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->					
				</article>
			</div>
			<div class="grid_7 prefix_1">
				<div class="aside-block no-margin stroika">
					<a href="<?=base_url();?>konkurs-dlya-desainerov-architektorov-stroika1" class="promo-action">
						<div class="annotation">Малые формы в среде города Ростов-на-Дону</div>
						<div class="conditions">
							Целью этого проекта является создание нетривиальных велопарковок, лавочек и других объектов, 
							укарашающих город при должном уровне реализации. Конкурс стал платформой для сотрудничества 
							творческих людей города, желающих сделать Ростов-на-Дону 
							современным, удобным и привлекательным для жителей и гостей города.
							<p><strong>Реализация проектов &mdash; июнь-август 2012</strong></p>
						</div>
						<!--<div class="banner">Стройка#<b>1</b></div>-->
					</a>
					<?=anchor('konkurs-dlya-desainerov-architektorov-stroika1','Подробнее &gt;',array('class'=>'details'));?>
				</div>
			</div>
			<div class="clear"></div>
		</section>
		
		<section class="proposals">
			<div class="grid_16">
				<div class="carousel index">
					<h2>МЫ представляем вашему вниманию<br/>новые строительные объекты</h2>
					<a href="#" id="prev" class="slider-arrow left">Пред.</a>
					<div id="samples-row" class="slider">
					<? for($i=0;$i<count($slideshow);$i+=3):?>
						<div class="design-row">
						<? if(isset($slideshow[$i]['images']['id'])):?>
						<div class="design-sample">
							<div class="frame">
								<div class="inner">
									<img src="<?=$baseurl;?>stroitelstvo/viewsmallimage/<?=$slideshow[$i]['images']['id'];?>" alt=""/>
								</div>
							</div>
							<?=anchor('stroitelstvo/object/'.$slideshow[$i]['translit'],$slideshow[$i]['title'], array('class'=>'caption'));?>
							<div class="note"><?=$slideshow[$i]['note'];?></div>
							<?=anchor('stroitelstvo/object/'.$slideshow[$i]['translit'],'Подробнее &gt;');?>
						</div>
						<? endif;?>
						<? if(isset($slideshow[$i+1]['images']['id'])):?>
						<div class="design-sample">
							<div class="frame">
								<div class="inner">
									<img src="<?=$baseurl;?>stroitelstvo/viewsmallimage/<?=$slideshow[$i+1]['images']['id'];?>" alt=""/>
								</div>
							</div>
							<?=anchor('stroitelstvo/object/'.$slideshow[$i+1]['translit'],$slideshow[$i+1]['title'], array('class'=>'caption'));?>
							<div class="note"><?=$slideshow[$i+1]['note'];?></div>
							<?=anchor('stroitelstvo/object/'.$slideshow[$i+1]['translit'],'Подробнее &gt;');?>
						</div>
						<? endif;?>
						<? if(isset($slideshow[$i+2]['images']['id'])):?>
						<div class="design-sample">
							<div class="frame">
								<div class="inner">
									<img src="<?=$baseurl;?>stroitelstvo/viewsmallimage/<?=$slideshow[$i+2]['images']['id'];?>" alt=""/>
								</div>
							</div>
							<?=anchor('stroitelstvo/object/'.$slideshow[$i+2]['translit'],$slideshow[$i+2]['title'], array('class'=>'caption'));?>
							<div class="note"><?=$slideshow[$i+2]['note'];?></div>
							<?=anchor('stroitelstvo/object/'.$slideshow[$i+2]['translit'],'Подробнее &gt;');?>
						</div>
						<? endif;?>
					</div>
					<!--<div class="design-row">
						<? if(isset($slideshow[$i]['images']['id'])):?>
						<div class="design-sample">
							<div class="frame">
								<div class="inner">
									<img src="<?=$baseurl;?>design-interierov/viewsmallimage/<?=$slideshow[$i]['images']['id'];?>" alt=""/>
								</div>
							</div>
							<?=anchor('design-interierov/'.$slideshow[$i]['object'].'/'.$slideshow[$i]['translit'],$slideshow[$i]['title'], array('class'=>'caption'));?>
							<div class="note"><?=$slideshow[$i]['note'];?></div>
							<?=anchor('design-interierov/'.$slideshow[$i]['object'].'/'.$slideshow[$i]['translit'],'Подробнее &gt;');?>
						</div>
						<? endif;?>
						<? if(isset($slideshow[$i+1]['images']['id'])):?>
						<div class="design-sample">
							<div class="frame">
								<div class="inner">
									<img src="<?=$baseurl;?>design-interierov/viewsmallimage/<?=$slideshow[$i+1]['images']['id'];?>" alt=""/>
								</div>
							</div>
							<?=anchor('design-interierov/'.$slideshow[$i+1]['object'].'/'.$slideshow[$i+1]['translit'],$slideshow[$i+1]['title'], array('class'=>'caption'));?>
							<div class="note"><?=$slideshow[$i+1]['note'];?></div>
							<?=anchor('design-interierov/'.$slideshow[$i+1]['object'].'/'.$slideshow[$i+1]['translit'],'Подробнее &gt;');?>
						</div>
						<? endif;?>
						<? if(isset($slideshow[$i+2]['images']['id'])):?>
						<div class="design-sample">
							<div class="frame">
								<div class="inner">
									<img src="<?=$baseurl;?>design-interierov/viewsmallimage/<?=$slideshow[$i+2]['images']['id'];?>" alt=""/>
								</div>
							</div>
							<?=anchor('design-interierov/'.$slideshow[$i+2]['object'].'/'.$slideshow[$i+2]['translit'],$slideshow[$i+2]['title'], array('class'=>'caption'));?>
							<div class="note"><?=$slideshow[$i+2]['note'];?></div>
							<?=anchor('design-interierov/'.$slideshow[$i+2]['object'].'/'.$slideshow[$i+2]['translit'],'Подробнее &gt;');?>
						</div>
						<? endif;?>
					</div>-->
					<? endfor; ?>
					</div>
					<a href="#" id="next" class="slider-arrow right">След.</a>
				</div>
			</div>
			<div class="grid_7 prefix_1">
				<div class="aside-block green">
					<?=anchor('zakaz-interiera','<p><strong>Заказать</strong> дизайн интерьера сейчас!</p>',array('class'=>'promo-action'));?>
				</div>
				<!--
				<div class="aside-block">
					<h3>Объекты недвидижимости</h3>
					<ul>
				<? if(count($objects) > 1):?>
					<? for($i=0;$i<count($objects);$i++):?>
						<li><?=anchor('obektu-stroitelstva/'.$objects[$i]['translit'],$objects[$i]['title']);?></li>
					<? endfor;?>
				<? else:?>
						<h4><?=$objects[0]['title'];?></h4>
					<? for($i=0;$i<count($estate);$i++):?>
						<li><?=anchor('agentstvo-nedvijimosti/'.$objects[0]['translit'].'/'.$estate[$i]['translit'],$estate[$i]['title']);?></li>
					<? endfor;?>
				<? endif;?>
					</ul>
				<? if($loginstatus['status']):?>
					<a class="details" style="right:152px;" data-toggle="modal" href="#addObjectType"><i class="icon-plus"></i> Добавить тип</a>
				<? endif;?>
					<?=anchor('agentstvo-nedvijimosti','Подробнее &gt;',array('class'=>'details'));?>
				</div>
				-->
				<!--<div class="aside-block">
					<h3>Смотреть интерьеры</h3>
					<ul>
				<? if(count($objects) > 1):?>
					<? for($i=0;$i<count($objects);$i++):?>
						<li>
					<? if(count($objects[$i]['interior'])):?>
							<?=anchor('design-interierov/'.$objects[$i]['translit'].'/'.$objects[$i]['interior'][0]['translit'],$objects[$i]['title']);?>
					<? else:?>
						<? if($loginstatus['status']):?>
							<a class="insInterior" data-toggle="modal" itype="<?=$objects[$i]['id'];?>" href="#addInterior"><?=$objects[$i]['title'];?></a>
							<a class="deleteTypes" data-toggle="modal" itype="<?=$objects[$i]['id'];?>" title="Удалить" href="#deleteObjectType"><i class="icon-trash"></i></a>
						<? endif;?>
					<? endif;?>
						</li>
					<? endfor;?>
				<? else:?>
					<? for($i=0;$i<count($interiors);$i++):?>
						<li><?=anchor('design-interierov/'.$objects[0]['translit'].'/'.$interiors[$i]['translit'],$interiors[$i]['title']);?></li>
					<? endfor;?>
				<? endif;?>
					</ul>
				<? if($loginstatus['status']):?>
					<a class="details" style="right:151px;" data-toggle="modal" href="#addObjectType"><i class="icon-plus"></i> Добавить тип</a>
				<? endif;?>
					<?=anchor('design-interierov','Подробнее &gt;',array('class'=>'details'));?>
				</div>-->
				<div class="aside-block list">
					<h3>Oбъекты строительства</h3>
					<ul>
					<? for($i=0;$i<count($constructions);$i++):?>
						<li><?=anchor('stroitelstvo/object/'.$constructions[$i]['translit'],$constructions[$i]['title']);?></li>
					<? endfor;?>
					</ul>
					<?=anchor('stroitelstvo','Подробнее &gt;',array('class'=>'details'));?>
				</div>
			</div>
			<div class="clear"></div>
		</section>
		<? if($loginstatus['status']):?>
			<? $this->load->view('modal/admin-add-interior');?>
			<? $this->load->view('modal/admin-add-objectstype');?>
			<? $this->load->view('modal/admin-delete-objectstype');?>
		<? endif;?>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>
	<script type="text/javascript">
		$(document).ready(function(){
		<? if($loginstatus['status']):?>
			var objType = 0;
			$("#atsend").click(function(event){
				var err = false;
				$(".control-group").removeClass('error');
				$(".help-inline").hide();
				$(".atinput").each(function(i,element){
					if($(this).val()==''){
						$(this).parents(".control-group").addClass('error');
						$(this).siblings(".help-inline").html("Поле не может быть пустым").show();
						err = true;
					}
				});
				if(err){event.preventDefault();}
			});
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
			$(".insInterior").click(function(){$("#types").val($(this).attr('itype'));});
			$("#addObjectType").on("hidden",function(){$(".control-group").removeClass('error');$(".help-inline").hide();});
			$(".deleteTypes").click(function(){objType = $(this).attr('itype');});
			$("#DelInterior").click(function(){location.href='<?=$baseurl;?>admin-panel/delete/object-types/'+objType});
		<? endif;?>
			$('div#samples-row').cycle({
				fx:     'scrollHorz',
				speed:  '1000',					
				easing: 'easeInOutExpo',
				timeout:  0,
				prev:    '#prev',
				next:    '#next'
			});
		});
	</script>
</body>
</html>