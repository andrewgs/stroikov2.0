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
					<?php for($i=0;$i<count($interiors);$i++):?>
						<li><?=anchor('design-interierov/'.$interiors[$i]['pranslit'],$interiors[$i]['title']);?></li>
					<?php endfor;?>
					</ul>
					<a href="#" class="details">Подробнее &gt;</a>
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
						<div class="grid_4 alpha">
							<div class="design-sample">
								<img src="img/design-1.png" alt="" />
								<a href="#">Розовая гостинная</a>
								<p>Решая проектные задачи, специалисты студии Стройковъ создают неповторимый дизайн различного уровня сложности.</p>
								<a href="#" class="details">Подробнее &gt;</a>
							</div>
						</div>
						<div class="grid_4 prefix_1">
							<div class="design-sample">
								<img src="img/design-2.png" alt="" />
								<a href="#">Спальня «Барокко»</a>
								<p>Мы специализируемся на ремонтно-отделочных работах любой сложности и категории, начиная от эконом–класса и заканчивая элитным ремонтом квартир по эксклюзивному заказу.</p>
								<a href="#" class="details">Подробнее &gt;</a>
							</div>
						</div>
						<div class="grid_4 prefix_1 omega">
							<div class="design-sample">
								<img src="img/design-3.png" alt="" />
								<a href="#">Солнечная детская</a>
								<p>Решая проектные задачи, специалисты студии Стройковъ создают неповторимый дизайн различного уровня сложности.</p>
								<a href="#" class="details">Подробнее &gt;</a>
							</div>
						</div>
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
				<div class="aside-block">
					<h3>Объекты недвидижимости</h3>
					<ul>
					<?php for($i=0;$i<count($estate);$i++):?>
						<li><?=anchor('obektu-stroitelstva/'.$estate[$i]['pranslit'],$estate[$i]['title']);?></li>
					<?php endfor;?>
					</ul>
					<?=anchor('obektu-stroitelstva','Подробнее &gt;',array('class'=>'details'));?>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>
</body>
</html>