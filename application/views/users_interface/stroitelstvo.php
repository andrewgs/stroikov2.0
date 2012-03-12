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
				<h2>Консультативно-диагностический центр <span class="details">г.Ростов-на-Дону</span></h2>
				<div class="grid_1">
					<div class="slider-arrow left">Пред.</div>
				</div>
				<div class="slider">
					<div class="grid_14 alpha omega">
						<div class="design-sample">
							<img src="img/design-1b.png" alt="" />
							<a href="#">Консультативно-диагностический центр</a>
							<p>
								Профессиональный опыт наших мастеров, отточенный множеством интересных и 
								разнообразных проектов, выполненных нами на данный момент, позволяет 
								воплощать в жизнь самые различные дизайн-проекты, созданные как нашими 
								специалистами, так и уже полученными от заказчика. В арсенале работ по 
								созданию дизайна интерьера в большом количестве квартир Ростова Вы сможете 
								найти строгую классику, элегантный арт-деко, высокотехнологичный hi-tech, 
								роскошный ампир.
							</p>
						</div>
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
				<div class="aside-block green">
					<a href="#" class="promo-action">
						<p><strong><nobr>Скидка 10%</nobr></strong> ремонт помещений</p>
					</a>
				</div>
				<div class="aside-block list">
					<h3>Строящиеся объекты</h3>
					<ul>
						<li><a href="#">Детский садик</a></li>
						<li><a href="#">Больница</a></li>
						<li><a href="#">Многоэтажный дом</a></li>
					</ul>
					<a href="#" class="details">Подробнее &gt;</a>
				</div>
				<div class="aside-block list">
					<h3>Сданные объекты</h3>
					<ul>
						<li><a href="#">Московский Банк</a></li>
						<li><a href="#">Гостиница Astor Plaza</a></li>
						<li><a href="#">Лечебный корпус</a></li>
					</ul>
					<a href="#" class="details">Подробнее &gt;</a>
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