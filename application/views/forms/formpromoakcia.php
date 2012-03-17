<div id="kontakt">
	<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
		<fieldset>
			<legend>Форма для подачи проекта на конкурс</legend>
			<div class="control-group">
				<label for="name" class="control-label">Ваше имя: </label>
				<div class="controls">
					<input type="text" id="title" class="input-xlarge cinput" name="name" placeholder="Укажите ваше полное имя и фамилию">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="phone" class="control-label">Контактный телефон: </label>
				<div class="controls">
					<input type="text" id="title" class="input-xlarge cinput" name="phone" placeholder="Чтобы мы могли связаться с Вами">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group" id="cgemail">
				<label for="email" class="control-label">E-Mail: </label>
				<div class="controls">
					<input type="text" id="email" class="input-xlarge cinput" name="email" placeholder="Или отправить Вам письмо">
					<span class="help-inline" id="useremail" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="education" class="control-label">Образование: </label>
				<div class="controls">
					<input type="text" id="education" class="input-xlarge" name="education" placeholder="Если Вы работаете, то укажите где и кем">
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="control-group">
				<label for="ImageFile" class="control-label">Фотография: </label>
				<div class="controls">
					<input type="file" id="ImageFile" class="input-file" name="userfile">
					<span class="help-inline" style="display:none;">&nbsp;</span>
					<div class="help-block">Фотографию загружать необязательно. Но как же тогда люди будут узнавать Вас на улице?</div>
				</div>
			</div>
			<div class="control-group">
				<label for="ArhiveFile" class="control-label">Архив с материалами: </label>
				<div class="controls">
					<input type="file" id="ArhiveFile" class="input-file cinput" name="userarhiv">
					<span class="help-inline" style="display:none;">&nbsp;</span>
					<div class="help-block">Объедините пожалуйста все необходимые по Вашему мнению файлы в один архив. Мы принимаем RAR, ZIP и 7Zip архивы.</div>
				</div>
			</div>
			<div class="control-group">
				<label for="note" class="control-label">Комментарий: </label>
				<div class="controls">
					<textarea rows="4" id="note" class="input-xlarge" name="note" placeholder="Если в создании данной работы участвовало несколько человек, то перечислите всех участников в данном поле."></textarea>
					<span class="help-inline" style="display:none;">&nbsp;</span>
				</div>
			</div>
			<div class="alert alert-success">
		        <strong>Внимание!</strong> В том случае если у вас не получается 
		        отправить проект через указанную форму, то вы можете отправить свой проект
		        по адресу <?= safe_mailto('info@sk-stroikov.ru', 'info@sk-stroikov.ru'); ?>. 
		        Также не стесняйтесь позвонить кураторам конкурса и задать все имеющиеся
		        у вас вопросы.
		    </div>
		</fieldset>
		<div class="modal-footer">
			<button class="btn btn-success" type="submit" id="send" name="submit" value="csend">Отправить</button>
		</div>
	<?=form_close(); ?>
	<p>&nbsp;</p>					
</div>