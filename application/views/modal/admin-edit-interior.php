<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<input type="hidden" value="<?=$interior['id'];?>" name="type" />
	<div id="editInterior" class="modal hide fade dmodal">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Редактирование интерьера</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="title" class="control-label">Название: </label>
					<div class="controls">
						<input type="text" id="title" class="input-xlarge edinput" name="title">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="rooms" class="control-label">Количество комнат: </label>
					<div class="controls">
						<input type="text" id="rooms" class="input-small edinput" name="rooms">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="address" class="control-label">Адрес: </label>
					<div class="controls">
						<input type="text" id="address" class="input-xlarge edinput" name="address">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="area" class="control-label">Площадь (м<sup>2</sup>): </label>
					<div class="controls">
						<input type="text" id="area" class="input-small edinput" name="area">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="note" class="control-label">Описание: </label>
					<div class="controls">
						<textarea rows="2" id="note" class="input-xlarge edinput" name="note"></textarea>
						<span class="help-inline"  style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="pranslit" class="control-label">Транслит: </label>
					<div class="controls">
						<input type="text" id="pranslit" class="input-xlarge" name="pranslit">
						<p class="help-block">Заполните поле на транслитом или оставьте пустым</p>
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" id="edsend" name="edsubmit" value="edsend">Добавить</button>
		</div>
	</div>
<?= form_close(); ?>