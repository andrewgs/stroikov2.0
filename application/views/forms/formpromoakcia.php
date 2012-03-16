<div id="kontakt">
	<p>Форма обратной связи<br/><br/></p>
	<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="control-group">
				<label for="name" class="control-label">Ваше имя: </label>
				<div class="controls">
					<input type="text" id="title" class="input-xlarge cinput" name="name">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="phone" class="control-label">Контактный телефон: </label>
				<div class="controls">
					<input type="text" id="title" class="input-xlarge cinput" name="phone">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group" id="cgemail">
				<label for="email" class="control-label">E-Mail: </label>
				<div class="controls">
					<input type="text" id="email" class="input-xlarge cinput" name="email">
					<span class="help-inline" id="useremail" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="education" class="control-label">Образование: </label>
				<div class="controls">
					<input type="text" id="education" class="input-xlarge" name="education">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="ImageFile" class="control-label">Фотография: </label>
				<div class="controls">
					<input type="file" id="ImageFile" class="input-file" name="userfile" size="30">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="ArhiveFile" class="control-label">Архив с материалами: </label>
				<div class="controls">
					<input type="file" id="ArhiveFile" class="input-file cinput" name="userarhiv" size="30">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="note" class="control-label">Комментарий: </label>
				<div class="controls">
					<textarea rows="4" id="note" class="input-xlarge" name="note"></textarea>
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
		</fieldset>
		<div class="modal-footer">
			<button class="btn btn-success" type="submit" id="send" name="submit" value="csend">Отправить</button>
		</div>
	<?=form_close(); ?>
	<p>&nbsp;</p>					
</div>