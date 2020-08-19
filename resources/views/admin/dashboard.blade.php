@extends('master.masterpage-admin')
@section('content')
<!-- Rooms -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
	<h2 class="h4">Dashboard</h2> <div><User></User></div>
</div>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "><strong>Purchase Orders</strong></div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$orders->number}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1"><strong>Shipments</strong></div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$shipments->number}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1"><strong>Total Payments</strong></div>
						<div class="col-auto">
							<div class="h5 mb-0 font-weight-bold text-gray-800 " style="text-align: center;">{{$account->number}}</div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total accounts</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$account->number}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-user-friends fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
	var month = <?php echo $month ?>;
	order =  <?php echo $order;?>;
	var m = {'1':0,'2':0,'3':0,'4':0,'5':0,'6':0,'7':0,'8':0,'9':0,'10':0,'11':0,'12':0};
	for (var i = 0; i < order.length; i++) {
		m[order[i].month] = order[i].count;
	}
	
	var values = Object.values(m);
	var barChartData = {
		labels: month,
		datasets: [{
			label: 'Order',
			backgroundColor: "rgba(220,220,220,0.5)",
			data: values
		}]
	};
	window.onload = function() {
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx, {
			type: 'bar',
			data: barChartData,
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
				elements: {
					rectangle: {
						borderWidth: 2,
						borderColor: 'rgb(0, 255, 0)',
						borderSkipped: 'bottom'
					}
				},
				responsive: true,
				title: {
					display: true,
					text: 'Yearly Purchase Orders'
				}
			}
		});


	};
</script>
<canvas id="canvas" height="280" width="600"></canvas>
@stop