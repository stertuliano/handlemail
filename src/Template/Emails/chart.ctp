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
					<?= $this->Form->control('IdAccount', ['label' => false, 'empty' => 'Account', 'options' => $accounts]);?>
    			</div>
    			<div class="col-xs-3">
    				<?= $this->Form->control('IdUser', ['label' => false, 'empty' => 'User', 'options' => $users]);?>    			
    			</div>
    			<div class="col-xs-2">
    				<?= $this->Form->submit('Pesquisar');?>    			
    			</div>
    		</div>
    		<?= $this->Form->end()?>
		</div>
		<div class="box-body">
			<canvas id="myChart"></canvas>
		</div>
	</div>
</div>



<script>
	$('#datepicker').daterangepicker({
	    "startDate": "07/20/2017",
	    "endDate": "07/26/2017"
	}, function(start, end, label) {
	  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
	});



	var labels = [];
	var values = [];
<?php 
	foreach($data as $d){
		echo 'labels.push("' .$d->label. '");';
		echo 'values.push("' .$d->value. '");';
	}
?>

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: '# Email',
            data: values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>