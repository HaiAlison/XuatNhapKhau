@extends('master.masterpage-admin')
@section('css')
<style type="text/css">thead input {
	width: 100%;
}
td { cursor: pointer;}</style>
@stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
	<h2 class="h4">Purchase Order</h2> <div><User></User></div>
</div><br>

<br>
@if(isset($orders))
<table  id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>PO No.</th>
			<th>PO Date</th>
			<th>POD</th>
			<th>POL</th>
			<th>PO Status</th>
			<th>Staff</th>
		</tr>
	</thead>
	<tbody>
		@foreach($orders as $key => $order)
		<tr>
			<td>{{$order->id}}</td>
			<td class="date">{{$order->po_date}}</td>
			<td>{{$order->pods->pod_name}}</td>
			<td>{{$order->pols->pod_name}}</td>
			<td>{{$order->poStatus->po_status}}</td>
			<td>{{$order->user->firstname}}</td>
		</tr>
		@endforeach
	</tbody>
</table>


@elseif(isset($orderDetails))
<div class="row events">
	<table  id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Product name</th>
				<th>PO No.</th>
				<th>Net weight</th>
				<th>Price</th>
				<th>Total amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $key => $order)
			<tr>
				<td>{{$order->id}}</td>
				<td>{{$order->po_date}}</td>
				<td>{{$order->pods->pod_name}}</td>
				<td>{{$order->pols->pod_name}}</td>
				<td>{{$order->po_date}}</td>
				<td>{{$order->po_date}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
</div>
@endif
@stop

@section('script')
<script type="text/javascript">

	//datatables
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
    	var title = $(this).text();
    	$(this).html( '<input type="text" placeholder="Search '+title+'" />' );

    	$( 'input', this ).on( 'keyup change', function () {
    		if ( table.column(i).search() !== this.value ) {
    			table
    			.column(i)
    			.search( this.value )
    			.draw();
    		}
    	} );
    } );

    // onclick row
    $('#example tbody').on('click', 'tr', function () {
    	var data = table.row( this ).data();
    	var hrf = "{{route('admin.show-order',':id')}}";
    	hrf = hrf.replace(':id',data[0]);
    	window.location = hrf;
    } );

    var table = $('#example').DataTable( {
    	lengthMenu: [ 10, 25, 50, 75, 100 ],
    	orderCellsTop: true,  
    	fixedHeader: true, 
    } );
} );

	// end datatable
	
</script>
@stop