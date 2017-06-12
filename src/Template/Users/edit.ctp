<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Editar Usuário</h3>
		</div>
		<div class="box-body">
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-12"> 
<?php 
					echo $this->Form->input('NameUser');
					echo $this->Form->input('EmailUser');
?>
				</div>
				<div class="col-xs-6">
					<?= $this->Form->control('password', ['label' => 'Senha:', 'value' => '']);?>
				</div>
				<div class="col-xs-6">
					<?= $this->Form->control('confirm_password', ['label' => 'Cornfirmação:', 'type' => 'password']);?>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-12"> 
<?php 
					echo $this->Form->control('IdAccount', ['empty' => ' ', 'options' => $accounts]);
					echo $this->Form->control('Admin');
?>
				</div>
			</div>
		</div> 
		<div class="box-footer">
			<?= $this->Form->button(__('Cancelar'), ['class' => 'btn btn-danger']) ?>
			<?= $this->Form->button(__('Alterar'), ['class' => 'btn btn-primary', 'type' => 'submit']) ?>
		</div>
	</div>
</div>