<nav>
	<div class="grid_24">
		<ul id="main-nav">
			<li><?=anchor('/','Главная');?></li>
			<!--<li><?=anchor('design-interierov','Дизайн интерьеров');?></li>-->
			<li><?=anchor('remont','Ремонт');?></li>
			<li><?=anchor('stroitelstvo','Строительство');?></li>
			<li><?=anchor('injenernue-seti','Инженерные сети');?></li>
			<!--<li><?=anchor('agentstvo-nedvijimosti','Агентство недвижимости');?></li>-->
			<li><?=anchor('o-kompanii','О компании');?></li>
		<?php if($loginstatus['status']):?>
			<li><?=anchor('logoff','Выход');?></li>
		<?php endif;?>
		</ul>
	</div>
	<div class="clearfix"></div>
</nav>