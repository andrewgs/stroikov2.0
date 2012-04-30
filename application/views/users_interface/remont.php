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
				<h1>Ремонт <span class="details">Список ремонтных объектов компании Стройковъ</span></h1>
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
			
			<!--<div class="grid_16">
				<div class="info list">
					<h1>Ремонтно-отделочные работы <br>в Ростове-на-Дону</h1>
					<p>
						Решая проектные задачи, специалисты дизайно-ремонтной студии Стройковъ 
						создают неповторимый дизайн различного уровня сложности, ориентируясь на 
						эргономичность труда, психологические критерии восприятия, эстетику 
						визуальных форм, сочетание красоты и функциональности, несомненное качество, 
						происхождение и специфику материалов, создание гармонии и комфорта и самое 
						главное, на индивидуальные требования и особенности Заказчика.
					</p>
					<h2>Ремонт квартир</h2>
					<p>
						Наша компания предоставляет полный спектр услуг, связанных с ремонтом и отделкой 
						квартир в Ростове-на-Дону. Компания Стройковъ - ремонтно-строительная фирма, которая 
						имеет за плечами многолетний опыт и сотни безупречно красивых работ, сделанных с 
						душой. Мы специализируемся на ремонтно-отделочных работах любой сложности и категории, 
						начиная от эконом–класса и заканчивая элитным ремонтом квартир по эксклюзивному заказу.
					</p>
					<p>
						Мы опровергаем народную мудрость, что ремонт можно начать, но невозможно закончить. 
						Компания Стройковъ делает ремонт качественно и организованно, поэтому такое сложное и 
						важное испытание в вашей жизни, как ремонт, будет ассоциироваться только с положительными 
						ощущениями. Наша компания возьмет все заботы и трудности на себя, а вам останется получать 
						удовольствие от процесса выбора обоев и других отделочных материалов. Мы занимаемся всеми 
						видами отделки квартир: обычные отделочные работы или капитальный ремонт квартиры. Виды 
						работ: проведение капитального, косметического, а также ремонта квартир под ключ.
					</p>
					<p>
						"С чего начать?"- мы неуверенно задумываемся над этим вопросом перед началом ремонта квартиры. 
						Очень часто кажется, что трудно воплотить замыслы в реальность. Мы поможем Вам в этом. Перед 
						началом ремонта, наши специалисты составляют точный план-смету. После абсолютного согласования, 
						наши работники немедленно приступают к строительно-ремонтным работам. Ремонт или отделка квартир 
						производится нашими первоклассными специалистами с применением современных и качественных 
						материалов, что значительно сокращает сроки и стоимость ремнонтно-отделочных работ.
					</p>
					<p>
						Если вы хотите провести ремонт в кратчайшие сроки, обращайтесь к нам! Мы делаем работу по 
						индивидуальному заказу. Мы любим находить интересные и эксклюзивные решения для каждого нашего 
						клиента. Примеры наших работ вы можете посмотреть на сайте, а также по вашему желанию, мы можем 
						показать несколько квартир, в которых на данный момент производятся ремонтные работы.
					</p>
					<p>
						Сотрудничая с нами, Вы находите надежного партнера и друга. Мы ценим Ваше доверие и сделаем 
						все, чтобы воплотить ваши уютные мечты в реальность. Мы несем полную ответственность за нашу 
						работу. За нашими плечами многолетний опыт.
					</p>
					<h2>Ремонт офисов в Ростове-на-Дону</h2>
					<p>
						Офис является лицом организации и главной составляющей в формировании имиджа вашей компании. 
						Если дизайн и отделка офиса выполнена оригинально, современно и качественно, то клиенты непременно 
						оценят это. Успешно сделанный ремонт в офисе являются залогом успешно организованного бизнеса. 
						Наша компания предоставляет полный спектр по ремонту и отделке офисных помещений.
					</p>
					<p>
						Компания "Стройковъ" занимается ремонтом офисов и коммерческих помещений в Ростове-на-Дону с 
						2006 года. На сегодняшний день сотни людей успешно работают в наших качественно отремонтированных 
						и комфортных офисных помещениях. Мы ответственно и комплексно подходим к ремонту и отделке офисов, 
						потому что мы знаем, что в современном мире, человек проводит в офисе большую часть своего времени. 
						Мы гордимся, что большую часть наших клиентов пришли по рекомендации своих друзей и коллег.
					</p>
					<p>
						Компания "Стройковъ" предлагает услуги от косметического до капитального ремонта офиса в 
						Ростове-на-Дону и в его окрестностях. Главная отличительная черта нашей компании - это 
						индивидуальный подход. Мы разработаем концепцию дизайна офиса вашей организации с учетом 
						замыслов заказчика и сохранения стиля компании. Мы делаем ремонты с применением самых 
						современных технологий, что позволяет ускорить строительный процесс, а также гарантирует 
						неизменное качество.
					</p>
					<p>
						Перед проведением строительных работ, наши специалисты составляют точный план-смету. 
						После согласования с обеих сторон, наши работники немедленно приступают к 
						строительно-ремонтным работам. Примеры наших работ Вы можете посмотреть на сайте, 
						а также вы можете посетить уже отремонтированные офисные помещения для того, чтобы оценить 
						качество сделанного нами ремонта.
					</p>
				</div>
			</div>-->
			
			
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