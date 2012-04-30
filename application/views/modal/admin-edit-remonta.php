<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<input type="hidden" value="<?=$object['id'];?>" name="object" />
	<div id="editObject" class="modal hide fade dmodal">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Редактирование объекта ремонта</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="title" class="control-label">Название: </label>
					<div class="controls">
						<input type="text" id="title" class="input-xlarge edinput" name="title" value="<?=$object['title'];?>">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="address" class="control-label">Адрес: </label>
					<div class="controls">
						<input type="text" id="address" class="input-xlarge edinput" name="address" value="<?=$object['address'];?>">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="note" class="control-label">Описание: </label>
					<div class="controls">
						<textarea rows="2" id="note" class="input-xlarge edinput" name="note"><?=$object['note'];?></textarea>
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="over" class="control-label">Состояние: </label>
					<div class="controls">
						<label class="checkbox">
						<?php if(!$object['over']):?>
							<input type="checkbox" value="1" id="over" name="over">
						<?php else:?>
							<input type="checkbox" value="1" id="over" name="over" checked="checked">
						<?php endif;?>
						
							Объект завершен
						</label>
					</div>
				</div>
				<div class="control-group">
					<label for="translit" class="control-label">Транслит: </label>
					<div class="controls">
						<input type="text" id="translit" class="input-xlarge" name="translit" value="<?=$object['translit'];?>">
						<p class="help-block">Заполните поле на транслитом или оставьте пустым</p>
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" id="edsend" name="edsubmit" value="edsend">Сохранить</button>
		</div>
	</div>
<?= form_close(); ?>