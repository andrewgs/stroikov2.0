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
			<div class="grid_16">
				<div class="info list">
					<h1 class="no-padding" id="top">О компании</h1>
					<p>Строительная компания ООО СК «Стройковъ» имеет возможность и рада предложить Вам широкий спектр услуг в сфере строительства, производства и финансовой деятельности. Наличие в штате опытных высококвалифицированных специалистов практически всех аспектов строительного производства позволяет решать в кратчайшие сроки задачи различного характера и уровня сложности по конкурентным ценам. В основе работы с Заказчиком для компании приоритетным является конструктивный диалог и своевременное качественное исполнение взятых на себя обязательств. Мы придерживаемся передовых технологий, работаем на самых перспективных площадках города, имеем опыт реализации значимых для Ростовской области объектов, претворяем в жизнь самые смелые решения.</p>
					<p>Мы проводим предварительные  обследования территории, занимаемся разработкой технического задания  на проектирование и строительство, а также технико-экономического обоснования строительства и  инвестиций в строительство, занимаемся оформлением разрешительной, конструкторской, проектной, рабочей документацией, получаем технические условия на подключение объекта к инженерным сетям, выполняем строительные работы.</p>
					<p>Наша дизайно-ремонтная студия занимается ландшафтным, архитектурным, художественным дизайном, декорированием.</p>
					<p>ООО СК «Стройковъ» также предлагает Вам информационно-консультационные, помощь в сдаче объекта в эксплуатацию, определение стоимости проектных и строительных работ, консультативную поддержку.</p>
					
				<? if($loginstatus['status']):?>
					<?=anchor('o-kompanii/photo-album','Просмотреть фотоальбом');?>
				<? endif;?>
					
					<h2 id="stuff">Сотрудники компании</h2>
					<div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_1.png" alt=""/>
							<strong>Киргинцев Виталий</strong>
							<em>Директор</em>
						</div>
						<div class="clear"></div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_2.png" alt=""/>
							<strong>Сердобинцева Ольга</strong>
							<em>Архитектор-дизайнер</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_3.png" alt=""/>
							<strong>Волков Дмитрий</strong>
							<em>Архитектор-дизайнер, искусствовед</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_4.png" alt=""/>
							<strong>Палабеков Кирилл</strong>
							<em>Слаботочные сети, пожарные и охранные системы</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_5.png" alt=""/>
							<strong>Чернышов Александр</strong>
							<em>Менеджер</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_6.png" alt=""/>
							<strong>Холостов Алексей</strong>
							<em>Системы вентиляции и кондиционирования</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_7.png" alt=""/>
							<strong>Дарья Турова</strong>
							<em>Помощник директора</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_8.png" alt=""/>
							<strong>Карнаухова Диана</strong>
							<em>Архитектор-дизайнер</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_9.png" alt=""/>
							<strong>Чернышев Руслан</strong>
							<em>Архитектор-дизайнер</em>
						</div>
						<div class="stuff-photo">
							<img src="<?=$baseurl;?>img/photo_10.png" alt=""/>
							<strong>Сергеева Елена</strong>
							<em>Главный бухгалтер</em>
						</div>
						<div class="clear"></div>
					</div>
					<h2 id="awards">Наши награды</h2>
					<div class="grid_4 alpha diplom">
						<img src="<?=$baseurl;?>img/diploms/str_gr_1.jpg" alt=""/>
					</div>
					<div class="grid_4 prefix_1 diplom">
						<img src="<?=$baseurl;?>img/diploms/str_gr_2.jpg" alt=""/>
					</div>
					<div class="grid_4 prefix_1 omega diplom">
						<img src="<?=$baseurl;?>img/diploms/str_gr_3.jpg" alt=""/>
					</div>
					
					<div class="grid_4 alpha diplom">
						<img src="<?=$baseurl;?>img/diploms/str_gr_4.jpg" alt=""/>
					</div>
					<div class="grid_4 prefix_1 diplom">
						<img src="<?=$baseurl;?>img/diploms/str_gr_5.jpg" alt=""/>
					</div>
					<div class="grid_4 prefix_1 omega diplom">
						<img src="<?=$baseurl;?>img/diploms/str_gr_6.jpg" alt=""/>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="grid_7 prefix_1">
				<div class="aside-block list">
					<h3></h3>
					<ul>
						<!--
						<li><a href="#top">Информация</a></li>
						-->
						<li><a href="#stuff">Сотрудники компании</a></li>
						<li><a href="#awards">Наши награды</a></li>
					</ul>
				<? if($loginstatus['status']):?>
					<a class="details" data-toggle="modal" href="#addPhotoAlbum"><i class="icon-plus"></i> Добавить фотографии в альбом</a>
				<? endif;?>
				</div>
				<div class="aside-block green">
					<a class="promo-action" href="#">
						<p>
							<strong>Вопросы?</strong> <br />
							Звоните!
							<nobr>(863) 295-51-10</nobr>
							<nobr>(863) 295-51-11</nobr>
						</p>
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</section>
	<? if($loginstatus['status']):?>
		<? $this->load->view('modal/admin-add-photoalbum');?>
	<? endif;?>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<?=$this->load->view('users_interface/google');?>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).scroll(function() {
			  	if ( $(document).scrollTop() > 114 ) {
			  		$('.aside-block.list').addClass('fixed');
			  		$('.aside-block.green').addClass('fixed-after');
			  	} else {
			  		$('.aside-block.list').removeClass('fixed');
			  		$('.aside-block.green').removeClass('fixed-after');
			  	} 
			});
		});
	</script>
</body>
</html>