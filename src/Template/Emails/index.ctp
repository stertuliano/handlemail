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
		                <th>Nome</th>
		                <th>Email</th>
		                <th>Telefone</th>
		                <th>Conta</th>
		                <th>Admin</th>
		                <th></th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($emails as $email){ ?>
			            <tr>
			            	<td><?= h($email->NameUser) ?></td>
			                <td><?= h($email->EmailUser) ?></td>
			                <td><?= h($email->PhoneNumber) ?></td>
			                <td><?= h($email->idAccount) ?></td>
			                <td><?= h($email->Admin) ?></td>
			                <td> 
			                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $email->IdEmail]) ?>
			                </td>
			            </tr>
		            <?php } ?>
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