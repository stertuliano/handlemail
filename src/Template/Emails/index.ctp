<?php
/**
  * @var \App\View\AppView $this
  */ 
?>

<!-- Bootstrap DataTable -->
<?php echo $this->Html->css('AdminLTE./plugins/datatables/dataTables.bootstrap'); ?>

<!-- JS DataTable -->
<?php echo $this->Html->script('AdminLTE./plugins/datatables/jquery.dataTables.min'); ?>
<?php echo $this->Html->script('AdminLTE./plugins/datatables/dataTables.bootstrap.min'); ?>

<div class="users form large-9 medium-8 columns content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">List of Invalid Emails</h3>
		</div>
		<div class="box-body" >
    		<div class="col-xs-12 col-md-6">
    			<div class="col-xs-6">
    <?php 
    			echo $this->Form->control('IdAccount', ['label' => 'Dt Inicial', 'empty' => ' ', 'options' => $accounts]);
    ?>
    			</div>
    			
    			<div class="col-xs-6">
    <?php 
    			echo $this->Form->control('IdUser', ['label' => 'Dt Final', 'empty' => ' ', 'options' => $users]);
    ?>    			
    			</div>
    		</div>
    		<div class="col-xs-12 col-md-6">						
    			<div class="col-xs-6">
    <?php 
    			echo $this->Form->control('IdAccount', ['label' => 'Account', 'empty' => ' ', 'options' => $accounts]);
    ?>
    			</div>
    			<div class="col-xs-6">
    <?php 
    			echo $this->Form->control('IdAccount', ['label' => 'User', 'empty' => ' ', 'options' => $accounts]);
    ?>
    			</div>
    		</div>
		</div>		
		<div class="box-body">
		
			<table id="data-table" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th scope="col">Invalid Email</th>
		                <th scope="col">Date</th>
		                <th scope="col">Email From</th>
		                <th scope="col">User</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($emails as $email): ?>
		            <tr>
		                <td><?= h($email->Email) ?></td>
		                <td><?= h($email->DtRegister) ?></td>
		                <td></td>
		                <td><?= $email->user->NameUser ?></td>
		            </tr>
		            <?php endforeach; ?>
		        </tbody>
		    </table>
		    
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
    $('#data-table').DataTable();
} );
</script>