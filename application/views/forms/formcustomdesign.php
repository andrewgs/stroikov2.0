<div id="kontakt">
	<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
		<fieldset>
			<legend>Форма заказа</legend>
			<div class="control-group">
				<label for="name" class="control-label">Ваше имя: </label>
				<div class="controls">
					<input type="text" id="title" class="input-xlarge cinput" name="name">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="phone" class="control-label">Контактный номер: </label>
				<div class="controls">
					<input type="text" id="phone" class="input-xlarge cinput" name="phone">
					<span class="help-inline" id="useremail" style="display:none;">&nbsp;</span>
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
				<label for="region" class="control-label">Район: </label>
				<div class="controls">
					<input type="text" id="region" class="input-xlarge cinput" name="region">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="area" class="control-label">Площадь квартиры: </label>
				<div class="controls">
					<input type="text" id="area" class="input-xlarge cinput" name="area">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="note" class="control-label">Комментарий: </label>
				<div class="controls">
					<textarea rows="4" id="note" class="input-xlarge cinput" name="note"></textarea>
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