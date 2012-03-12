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
					<?=$this->load->view('forms/autorization');?>
				</div>
			</div>
			<div class="grid_7 prefix_1">
				<div class="aside-block green">
					<a href="#" class="promo-action">
						<p></p>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>
		<?=$this->load->view('users_interface/footer');?>
	</div>
	<?=$this->load->view('users_interface/scripts');?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#send").click(function(event){var err = false;$(".help-inline").hide();$(".focused").each(function(i,element){if($(this).val()==''){$(this).siblings(".help-inline").html('<i class="icon-exclamation-sign" title="Поле не может быть пустым"></i>').show();err = true;}});if(err){event.preventDefault()};});
			$("#reset").click(function(){$(".help-inline").html('').hide();});
			$("#msgclose").click(function(){$("#msgalert").fadeOut(1000,function(){$(this).remove();});});
		});
	</script>
</body>
</html>