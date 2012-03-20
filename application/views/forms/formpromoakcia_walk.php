<div id="kontakt-walk">
	<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
		<fieldset>
			<legend>Выбор мест для отдыха на лавочках</legend>
			<div class="control-group">
				<label for="name" class="control-label">Ваше имя: </label>
				<div class="controls">
					<input type="text" id="title" class="input-xlarge winput" name="name" placeholder="Укажите ваше имя или никнейм">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group" id="wgemail">
				<label for="email" class="control-label">E-Mail: </label>
				<div class="controls">
					<input type="text" id="wemail" class="input-xlarge winput" name="email" placeholder="Никто не останется без ответа">
					<span class="help-inline" id="wuseremail" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="note" class="control-label">Комментарий: </label>
				<div class="controls">
					<textarea rows="4" id="note" class="input-xlarge winput" name="note" placeholder="Укажите улицу или место, на котором по вашему мнению стоит установить новые лавочки или обновить старые."></textarea>
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
		</fieldset>
		<div class="modal-footer">
			<button class="btn btn-success" type="submit" id="wsend" name="wsubmit" value="wsend">Отправить заявку</button>
		</div>
	<?=form_close(); ?>
	<p>&nbsp;</p>					
</div>