<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Add User</h3>
		</div>
		<div class="box-body">
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-12"> 
<?php 
					echo $this->Form->input('NameUser', ['label' => 'Name']);
					echo $this->Form->input('EmailUser', ['label' => 'Email']);
					echo $this->Form->input('PhoneNumber', ['label' => 'Phone Number']);
?>
				</div>
				<div class="col-xs-6">
					<?= $this->Form->control('password', ['label' => 'Password:', 'value' => '']);?>
				</div>
				<div class="col-xs-6">
					<?= $this->Form->control('confirm_password', ['label' => 'Confirm Password:', 'type' => 'password']);?>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-12">
<?php 
					echo $this->Form->control('IdAccount', ['label' => 'Account', 'empty' => ' ', 'options' => $accounts]);
					echo $this->Form->control('Admin', ['label' => 'Administrator']);
?>
				</div>
			</div>
		</div> 
		<div class="box-footer">
			<?= $this->Form->button(__('Cancel'), ['class' => 'btn btn-danger']) ?>
			<?= $this->Form->button(__('Add'), ['class' => 'btn btn-primary', 'type' => 'submit']) ?>
		</div>
	</div>
</div>