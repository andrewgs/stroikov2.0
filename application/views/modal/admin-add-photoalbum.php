<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<div id="addPhotoAlbum" class="modal hide fade dmodal">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Добавление фотографий а альбом</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="ImageFile" class="control-label">Фотография</label>
					<div class="controls">
						<input type="file" class="input-file imginput imagefile" name="userfile[]" size="30">
					</div>
				</div>
				<div class="control-group">
					<label for="ImageFile" class="control-label">Фотография</label>
					<div class="controls">
						<input type="file" class="input-file imginput imagefile" name="userfile[]" size="30">
					</div>
				</div>
				<div class="control-group">
					<label for="ImageFile" class="control-label">Фотография</label>
					<div class="controls">
						<input type="file" class="input-file imginput imagefile" name="userfile[]" size="30">
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" id="imgsend" name="imgsubmit" value="send">Загрузить</button>
		</div>
	</div>
<?= form_close(); ?>