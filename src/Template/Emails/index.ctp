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
			<h3 class="box-title">Usuários</h3>
		</div>
		<div class="box-body">
		
			<table id="data-table" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th scope="col">Email</th>
		                <th scope="col">DtRegister</th>
		                <th scope="col">EmailFrom</th>
		                <th scope="col">IdUser</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($emails as $email): ?>
		            <tr>
		                <td><?= h($email->Email) ?></td>
		                <td><?= h($email->DtRegister) ?></td>
		                <td><?= h($email->EmailFrom) ?></td>
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
    $('#data-table').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
        }
	});
} );
</script>