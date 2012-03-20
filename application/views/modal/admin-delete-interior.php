<div id="deleteInterior" class="modal hide fade">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Удаление интерьера</h3>
	</div>
	<div class="modal-body">
		<p>Сейчас будет произведено удаление интерьера "<?=$interior['title'];?>".<br/>Так же будет удалена вся принадлежащая удаляемому интерьеру информация. Продолжить?</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal">Отменить</button>
		<button class="btn btn-danger" type="submit" id="DelInterior">Удалить</button>
	</div>
</div>