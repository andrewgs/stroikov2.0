<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?=$this->load->view('users_interface/head');?>
<body>
	<style type="text/css">
		#stroika-pointer { display: none; }
		[class*="span"] { float: none; }
	</style>
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<div class="container_24">
		<?=$this->load->view('users_interface/header');?>
		<?=$this->load->view('users_interface/navigation');?>
		<section class="proposals">
			<div class="grid_24">
				<div id="stroika-promo-block" class="info list">
					<div class="stb"> </div>
					<a target="_blank" href="img/agreement.jpg" id="stroika-agreement"> </a>
					<div class="sponsors">
						при поддержке:
						<a href="#"><img src="<?= base_url().'img/sponsor-5.png' ?>" alt="" /></a>
						<a href="#"><img src="<?= base_url().'img/sponsor-6.png' ?>" alt="" /></a>
					</div>
					<div class="sponsors info">
						при информационной поддержке:
						<a href="#"><img src="<?= base_url().'img/sponsor-1.png' ?>" alt="" /></a>
						<a href="#"><img src="<?= base_url().'img/sponsor-2.png' ?>" alt="" /></a>
						<a href="#"><img src="<?= base_url().'img/sponsor-3.png' ?>" alt="" /></a>
						<a href="#"><img src="<?= base_url().'img/sponsor-4.png' ?>" alt="" /></a>
					</div>
					<h1>Конкурс проектных идей <br>в области архитектуры малых форм</h1>
					<div class="pnav">
						<a href="#kontakt" id="participants">Участникам </a>
						<a href="#kontakt-velo" id="velo-participants">Велосипедистам </a>
						<a href="#kontakt-walk" id="walk-participants">Пешеходам </a>
					</div>
					<h2>Цель проекта:</h2>
					<p>
						Создать арт-объекты (велопарковки, лавочки) для г. Ростова-на-Дону<br />
						Награждение победителей: 27 апреля 2012 г.<br />
						Реализация проектов: май 2012 г.
					</p>
					<p>Сроки регистрации и подачи проектов <u>20 марта</u> по <u>20 апреля</u> 2012 года</p>
					<div class="btn-toolbar">
						<a href="<?= base_url(); ?>press_release.pdf" class="btn btn-danger" id="download">
							<i class="icon-download-alt icon-white"></i> Скачать пресс-релиз
						</a>
						<!--				
						<a href="#kontakt" class="btn btn-success" id="download">
							<i class="icon-pencil icon-white"></i> Принять участие
						</a>
						-->
					</div>
					<p>
						контакты:<br />
						т.: 295-51-11 ; 295-51-12 - студия <br />
						т.: 8[988]544 21 23 - куратор Диана Карнаухова <br />
						т.: 8[951]535 78 55 - координатор Руслан Чернышев
					</p>
					<div class="separator"> </div>
					<?php $this->load->view('alert_messages/alert-error');?>
					<?php $this->load->view('alert_messages/alert-success');?>
					<div class="row">
						<div class="span7">
							<?php $this->load->view('forms/formpromoakcia');?>
						</div>
					</div>
					<div class="row">
						<div class="span7">
							<?php $this->load->view('forms/formpromoakcia_velo');?>
						</div>
					</div>
					<div class="row">
						<div class="span7">
							<?php $this->load->view('forms/formpromoakcia_walk');?>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
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
				$(".cinput").each(function(i,element){if($(this).val()==''){$(this).parents(".control-group").addClass('error');$(this).siblings(".help-inline").html("Поле не может быть пустым").show();err = true;}});
				if(!err && !isValidEmailAddress($("#email").val())){$("#cgemail").addClass('error');$("#useremail").html("Не верный адрес E-Mail").show();event.preventDefault();}
				if(err){event.preventDefault();}
			});
			
			$("#vsend").click(function(event){
				var err = false;
				$(".control-group").removeClass('error');
				$(".help-inline").hide();
				$(".vinput").each(function(i,element){if($(this).val()==''){$(this).parents(".control-group").addClass('error');$(this).siblings(".help-inline").html("Поле не может быть пустым").show();err = true;}});
				if(!err && !isValidEmailAddress($("#vemail").val())){$("#vgemail").addClass('error');$("#vuseremail").html("Не верный адрес E-Mail").show();event.preventDefault();}
				if(err){event.preventDefault();}
			});
			
			$("#wsend").click(function(event){
				var err = false;
				$(".control-group").removeClass('error');
				$(".help-inline").hide();
				$(".winput").each(function(i,element){if($(this).val()==''){$(this).parents(".control-group").addClass('error');$(this).siblings(".help-inline").html("Поле не может быть пустым").show();err = true;}});
				if(!err && !isValidEmailAddress($("#wemail").val())){$("#wgemail").addClass('error');$("#wuseremail").html("Не верный адрес E-Mail").show();event.preventDefault();}
				if(err){event.preventDefault();}
			});
			
			function isValidEmailAddress(emailAddress){var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);return pattern.test(emailAddress);};
		});
	</script>
</body>
</html>