<div id="deleteObject" class="modal hide fade">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Удаление объекта ремонта</h3>
	</div>
	<div class="modal-body">
		<p>Сейчас будет произведено удаление объекта ремонта "<?=$object['title'];?>".<br/>Так же будет удалена вся принадлежащая удаляемому объекту информация. Продолжить?</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal">Отменить</button>
		<button class="btn btn-danger" type="submit" id="DelObject">Удалить</button>
	</div>
</div>