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
					<?= $this->Form->control('IdAccount', ['label' => false, 'empty' => 'Account', 'options' => $accounts, 'id' => 'id-account']);?>
    			</div>
    			<div class="col-xs-3">
    				<?= $this->Form->control('IdUser', ['label' => false, 'empty' => 'User', 'options' => $users, 'id' => 'id-user']);?>    			
    			</div>
    			<div class="col-xs-2">
    				<?= $this->Form->control('Pesquisar', ['id' => 'btn-search', 'type' => 'button', 'label' => false] );?>    			
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
	$(function() {		
		/*
	    var randomScalingFactor = function() {
	        return Math.ceil(Math.random() * 10.0) * Math.pow(10, Math.ceil(Math.random() * 5));
	    };
	    
	    var config = {
	            type: 'line',
	            data: {
	                labels: ["January", "February", "March", "April", "May", "June", "July"],
	                datasets: [{
	                    label: "My First dataset",
	                    //backgroundColor: window.chartColors.red,
	                    //borderColor: window.chartColors.red,
	                    fill: false,
	                    data: [
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor()
	                    ],
	                }, {
	                    label: "My Second dataset",
	                    //backgroundColor: window.chartColors.blue,
	                    //borderColor: window.chartColors.blue,
	                    fill: false,
	                    data: [
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor(), 
	                        randomScalingFactor()
	                    ],
	                }]
	            },
	            options: {
	                responsive: true,
	                title:{
	                    display:true,
	                    text:'Chart.js Line Chart - Logarithmic'
	                },
	                scales: {
	                    xAxes: [{
	                        display: true,
	                    }],
	                    yAxes: [{
	                        display: true,
	                        type: 'logarithmic',
	                    }]
	                }
	            }
	        };

        var ctx = document.getElementById("myChart").getContext("2d");
        window.myLine = new Chart(ctx, config);
		*/
		var startDate = '';
		var finishDate = '';
		
		$('#btn-search').on('click', function(){
			console.log(startDate + ' - ', finishDate + ' - ', $('#id-account').val() + ' - ', $('#id-user').val());
			$.ajax({
				method: 'POST',
				//dataType: "json",
				url: '<?= $this->Url->build(['action' => 'getChart'])?>',
				data: {
						startDate: startDate,
						finishDate: finishDate,
						idAccount: $('#id-account').val(),
						idUser: $('#id-user').val(),
					}
			})
			.done(function(data){
				data = JSON.parse(data);
				
				var labels = Object.keys(data);
				console.log(data);
				for(var i = 0; i<=data.length-1; i++){
					//datasets
				}
				
				
			});
		});

		$('#datepicker').daterangepicker({
		    format: "DD/MM/YYYY",
		}, function(start, end, label) {
		  //console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
		  startDate = start.format('YYYY-MM-DD');
		  finishDate = end.format('YYYY-MM-DD');
		});
	});
	
/*
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
*/
</script>