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

<?php echo $this->Html->script('AdminLTE./plugins/datepicker/bootstrap-datepicker'); ?>
<?php echo $this->Html->script('AdminLTE./plugins/daterangepicker/moment.min'); ?>
<?php echo $this->Html->script('AdminLTE./plugins/daterangepicker/daterangepicker'); ?>
<?php echo $this->Html->css('AdminLTE./plugins/daterangepicker/daterangepicker-bs3'); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js">

</script>

<div class="users form large-9 medium-8 columns content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Invalid Emails</h3>
		</div>
		<div class="box-body" >
			<?= $this->Form->create()?>
    		<div class="col-xs-12">
    			<div class="col-xs-4">
					<div class="form-group">
						<div class="input-group date">
							<div class="input-group-addon">
                    			<i class="fa fa-calendar"></i>
							</div>
							<?= $this->Form->control('date', ['label' => false, 'class' => 'form-control pull-right', 'id' => 'datepicker']);?>
						</div>
					</div>
                	<!-- /.input group -->
				</div>
    			<div class="col-xs-3">
					<?= $this->Form->control('IdAccount', ['label' => false, 'empty' => 'All Accounts', 'options' => $accounts, 'id' => 'id-account']);?>
    			</div>
    			<div class="col-xs-3">
    				<?= $this->Form->control('IdUser', ['label' => false, 'empty' => 'All Users', 'options' => $users, 'id' => 'id-user']);?>    			
    			</div>
    			<div class="col-xs-2">
    				<?= $this->Form->control('Pesquisar', ['id' => 'btn-search', 'type' => 'button', 'label' => false] );?>    			
    			</div>
    		</div>
    		<?= $this->Form->end()?>
		</div>
		<div class="box-body">
			<canvas id="myChart">
				<div class="text-center">Carregando gráfico...</div>
			</canvas>
		</div>
	</div>
</div>



<script>
	function makeChart(startDate, finishDate, idAccount, idUser){
		$('#myChart').html('<div class="text-center">Carregando gráfico...</div>');
		var colors = ['red', 'blue', 'orange', 'green', 'pink', 'black', 'gray', 'brown', 'yellow', 'red', 'blue', 'orange', 'green', 'pink', 'black', 'gray', 'brown', 'yellow', 'red', 'blue', 'orange', 'green', 'pink', 'black', 'gray', 'brown', 'yellow', 'red', 'blue', 'orange', 'green', 'pink', 'black', 'gray', 'brown', 'yellow'];
		console.log(startDate + ' - ', finishDate + ' - ', $('#id-account').val() + ' - ', $('#id-user').val());
		$.ajax({
			method: 'POST',
			//dataType: "json",
			url: '<?= $this->Url->build(['action' => 'getChart'])?>',
			data: {
					startDate: startDate,
					finishDate: finishDate,
					idAccount: idAccount,
					idUser: idUser,
				}
		})
		.done(function(data){
			var labels = [];
			var datasets = [];
			var d = JSON.parse(data);
			console.log(d);
			if(d.length > 0){
		        $.each(d[0].values, function () {
		            labels.push(this[0]);
		        });
	
		        var count = 0;
		        $.each(d, function () {
		        	var obj = {};
		        	obj.label = this.email; 
		        	var values = [];
		        	$.each(this.values, function () {
		        		values.push(this[1]);
		        	});
		        	obj.data = values;
		        	obj.backgroundColor = colors[count];
		        	obj.borderColor = colors[count];
		        	obj.fill = false;
		        	datasets.push(obj);
		        	count++;
		        });
			}
			console.log(datasets);
	
			var config = {
				type: 'line',
				data: {
					labels: labels,
					datasets: datasets
				}
			}
	
	        var ctx = document.getElementById("myChart").getContext("2d");
	        window.myLine = new Chart(ctx, config);
		});
	}

	$(function() {		
		var startDate = '<?=date('Y-m-d')?>';
		var finishDate = '<?$date = new DateTime();$date->modify('-30 days');echo $date->format('Y-m-d');?>';
		var idAccount = <?= ($this->request->session()->read('Auth.User.Admin') > 0)?$this->request->session()->read('Auth.User.IdAccount'):'0'; ?>;
		var idUser = <?= ($this->request->session()->read('Auth.User.Admin') == 0)?$this->request->session()->read('Auth.User.IdUser'):'0'; ?>;
		
		makeChart(startDate, finishDate, idAccount, idUser);
		
		$('#btn-search').on('click', function(){
			makeChart(startDate, finishDate, $('#id-account').val(), $('#id-user').val());
		});

		$('#datepicker').daterangepicker({
		    format: "DD/MM/YYYY",
		}, function(start, end, label) {
		  //console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
		  startDate = start.format('YYYY-MM-DD');
		  finishDate = end.format('YYYY-MM-DD');
		});
	});
</script>