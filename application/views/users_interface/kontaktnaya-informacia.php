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
					<h1 class="no-padding">Контакты</h1>
					<p class="spacing">ООО «Стройковъ»</p>
					<p class="spacing">
						344019, г.Ростов-на-Дону, ул.16-я линия, 16Б <br />
						Тел.: (863) 295-51-10, (863) 295-51-11 Факс: (863) 295-51-12 <br />
						<?= safe_mailto('info@sk-stroikov.ru', 'info@sk-stroikov.ru'); ?>
					</p>
					<p class="spacing">
						Режим работы: пн-чт - 9:00-18:00, пт - 9:00-16:00, сб-вс - выходные
					</p>
					<p class="spacing">
						На карте:
					</p>
					<div class="map-wrapper">
						<div id="YMapsID" style="width: 540px; height: 350px;"></div>
					</div>

					<?php $this->load->view('alert_messages/alert-error');?>
					<?php $this->load->view('alert_messages/alert-success');?>
					<?php $this->load->view('forms/formsendmail');?>
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
	<script src="http://api-maps.yandex.ru/1.1/?key=ADG8dU8BAAAAOSTEWAIAOCSb5a335lezATTshFJfLe73rxsAAAAAAAAAAABS2NE-euw3ov51cR9sfxpgNiyn6Q==&modules=pmap&wizard=constructor" type="text/javascript"></script>
  	<style type="text/css">
  		.overlay { position: absolute; z-index: 1; width: 40px; height: 36px; background: url(img/home_contacts.png); cursor:pointer; }
		.map-wrapper { border: 1px solid #999; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; height: 350px; padding: 3px; text-align: center; width: 540px; margin-bottom: 20px; }
		img { max-width: none; }
	</style>
	<script type="text/javascript">
	    YMaps.jQuery(window).load(function () {
	        var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
	        map.setCenter(new YMaps.GeoPoint(39.756184,47.235372), 15, YMaps.MapType.MAP);
	        map.addControl(new YMaps.Zoom());
	        map.addControl(new YMaps.ToolBar());
	        YMaps.MapType.PMAP.getName = function () { return "Народная"; };
	        map.addControl(new YMaps.TypeControl([
	            YMaps.MapType.MAP,
	            YMaps.MapType.SATELLITE,
	            YMaps.MapType.HYBRID,
	            YMaps.MapType.PMAP
	        ], [0, 1, 2, 3]));
	
	        YMaps.Styles.add("constructor#pmgnlPlacemark", {
	            iconStyle : {
	                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgnl.png",
	                size : new YMaps.Point(36,41),
	                offset: new YMaps.Point(-13,-40)
	            }
	        });
	
	       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.75833,47.23204), "constructor#pmgnlPlacemark", "Строительная компания и студия архитектуры и дизайна «Стройковъ»"));
	        
	        function createObject (type, point, style, description) {
	            var allowObjects = ["Placemark", "Polyline", "Polygon"],
	                index = YMaps.jQuery.inArray( type, allowObjects),
	                constructor = allowObjects[(index == -1) ? 0 : index];
	                description = description || "";
	            
	            var object = new YMaps[constructor](point, {style: style, hasBalloon : !!description});
	            object.description = description;
	            
	            return object;
	        }
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