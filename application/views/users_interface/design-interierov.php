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
			<? if(count($interiors)>0):?>
				<h1>Дизайн интерьеров <span class="details">Новые проекты жилых и офисных интерьеров</span></h1>
				<div class="grid_16 alpha omega">
					<!--
					<div class="slider">
						<div id="samples">
							<? for($i=0;$i<count($interiors[0]['images']);$i++):?>
							<div class="design-sample">
								<img src="<?=$baseurl.$this->uri->uri_string();?>/viewimage/<?=$interior[0]['images'][$i]['id'];?>" alt=""/>
							</div>
							<? endfor;?>
						</div>
						<?=anchor('design-interierov/'.$objects[0]['translit'].'/'.$interior[0]['translit'],$interior[0]['title']);?>
						<p>
							<?=$interior[0]['note'];?>
						</p>
					</div>
					-->
					<div class="slider interiors" id="samples-row">
				<?php for($i=0;$i<count($interiors);$i++):?>
						<div class="design-row">
							<div class="design-sample">
								<div class="frame">
									<div class="inner">
										<img alt="<?=$interiors[$i]['phtitle'];?>" src="<?=$this->uri->uri_string();?>/viewsmallimage/<?=$interiors[$i]['phid']?>">
									</div>
								</div>
								<a class="caption" href="<?=$baseurl;?>design-interierov/<?=$interiors[$i]['objtrans'];?>/<?=$interiors[$i]['translit'];?>"><?=$interiors[$i]['title'];?></a>
								<div class="note">
									<?=$interiors[$i]['note'];?>
								</div>
							</div>
						</div>
				<?php endfor;?>
					</div>
				</div>
			<? else:?>
				<? if(isset($objects) && !count($interiors)):?>
					<? if($loginstatus['status']):?>
						<a class="btn btn-success" data-toggle="modal" href="#addInterior"><i class="icon-plus"></i> Добавить первый интерьер</a>
					<? endif;?>
				<? endif;?>
			<? endif;?>
			
			<div class="grid_16 alpha omega">
				<div class="info list">
					<h2>Дизайн интерьеров квартир в Ростове-на-Дону</h2>
					<p>
						Компания "Стройковъ" работает на рынке ремонтно-строительных услуг, дизайна интерьера 
						квартир, домов и офисных помещений более 5 лет в Ростове-на-Дону. Дизайн интерьера 
						является ключевым направлением компании. Первоклассные дизайнеры и высококвалифицированные 
						рабочие реализовывают самые непростые и креативные замыслы заказчиков. За нашими плечами 
						около 100 реализованных дизайн проектов.
					</p>
					<p>
						Наш главный критерий работы - это индивидуальный подход к каждому клиенту. В чем 
						заключается работа профессионального дизайнера, спросите вы. Замечали ли вы, что когда 
						вы воображаете свою будущую квартиру или офис, вы представляете общую картину, не 
						акцентируя внимания на детали. Задача дизайнера- выделить частное из общего, подобрать 
						стиль, выделить детали и сделать все по высшему разряду.
					</p>
					<p>
						В услуги дизайнера интерьера включается подготовка дизайн проекта квартиры или офиса, 
						согласование с клиентом всех деталей, выбор материалов, а также согласование сроков 
						выполняемых работ. Мы подбираем оптимальный по стоимости вариант, при этом учитывая 
						все требования нашего заказчика.
					</p>
					<p>
						Компания "Стройковъ" занимается дизайном интерьера отдельных квартир. Примеры дизайн 
						интерьеров кухни, спальни, гостиной вы можете посмотреть на сайте. Все что вы увидите, 
						это авторские решения, разработанные по индивидуальным дизайн проектам.
					</p>
				</div>
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
				</div>
			</div>
			<div class="clear"></div>
			<? if(isset($objects[0]) && !count($interiors)):?>
				<? if($loginstatus['status']):?>
					<? $this->load->view('modal/admin-add-interior');?>
				<? endif;?>
			<? endif;?>
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
			
			$(document).scroll(function() {
			  	if ( $(document).scrollTop() > 114 ) {
			  		$('.aside-block.list').addClass('fixed');
			  	} else {
			  		$('.aside-block.list').removeClass('fixed');
			  	} 
			});
		});
	</script>
</body>
</html>