<div id="kontakt">
	<p>Используйте данную контактную форму, чтобы связаться с нами. Вы также можете написать нам напрямую по электронной почте. <nobr>Для этого нажмите на ссылку: <?=safe_mailto('info@sk-stroikov.ru','info@sk-stroikov.ru');?></nobr>
	<br/><br/>
	</p>
	<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="control-group">
				<label for="name" class="control-label">Ваше имя: </label>
				<div class="controls">
					<input type="text" id="title" class="input-xlarge cinput" name="name">
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
				<label for="note" class="control-label">Сообщение: </label>
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