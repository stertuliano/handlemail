<!-- InputMask -->
<?php echo $this->Html->script('AdminLTE./plugins/input-mask/jquery.inputmask'); ?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($account) ?>

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Add Account</h3>
		</div>
		<div class="box-body">
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-12"> 
<?php 
					echo $this->Form->control('NameAccount', ['label' => 'Name']);
					echo $this->Form->control('TaxId', ['id' => 'taxId', 'label' => 'Tax Id']);
					echo $this->Form->control('ZipCode', ['id' => 'cep', 'label' => 'Zip Code']);
					echo $this->Form->control('StateRegion', ['label' => 'State Region']);
?>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-12"> 
<?php 
		            echo $this->Form->control('Address1', ['label' => 'Address1']);
		            echo $this->Form->control('Address2', ['label' => 'Address2']);
		            echo $this->Form->control('NameCity', ['label' => 'City']);
		            echo $this->Form->control('Country', ['label' => 'Country']);
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

<script>
	$("#cep").inputmask("99999-999", {"placeholder": "_____-___"});
	$("#taxId").inputmask("99.999.999/9999-99", {"placeholder": "__.___.___/____-__"});
	
    $("#cep").on('change', function(){
    	preencheCep($("#cep").val());
	})
</script>