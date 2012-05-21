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
					<h1 class="no-padding">Заказ дизайна интерьера</h1>
					<p>Используйте форму чтобы заказать дизайн интерьера сейчас.<br/>Все поля формы должны быть заполнены</p>
					<?php $this->load->view('alert_messages/alert-error');?>
					<?php $this->load->view('alert_messages/alert-success');?>
					<?php $this->load->view('forms/formcustomdesign');?>
				</div>
			</div>
			
			<div class="grid_7 prefix_1">
				<div class="aside-block green">
					<a class="promo-action" href="#">
						<p>
							<strong>Телефоны</strong> <br />
							<nobr>(863) 295-51-10</nobr> <br />
							<nobr>(863) 295-51-11</nobr>
						</p>
					</a>
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
			function isValidEmailAddress(emailAddress){var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);return pattern.test(emailAddress);};
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).scroll(function() {
			  	if ( $(document).scrollTop() > 114 ) {
			  		$('.aside-block.green').addClass('fixed');
			  	} else {
			  		$('.aside-block.green').removeClass('fixed');
			  	} 
			});
		});
	</script>	
</body>
</html>