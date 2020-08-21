@extends('master.masterpage-admin')
@section('css')
<style type="text/css">thead input {
	width: 100%;
}
td { cursor: pointer;}</style>
@stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
	<h2 class="h4">Shipment</h2> <div><User></User></div>
</div><br>

<br>
@if(isset($shipments))
<table  id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>PO No.</th>
            <th>Sub PO No.</th>
			<th>BL Date</th>
			<th>Type Of Shipment</th>
			<th>Shipment Status</th>
			<th>Staff</th>
		</tr>
	</thead>
	<tbody>
		@foreach($shipments as $key => $shipment)
		<tr>
			<td>{{$shipment->po_no_id}}</td>
            <td>{{$shipment->id}}</td>
			<td class="date">{{$shipment->bl_date}}</td>
			<td>{{$shipment->type_of_shipment}}</td>
			<td>{{$shipment->ShipmentStatus->shipment_status}}</td>
			<td>{{$shipment->user_id}}</td>
		</tr>
		@endforeach
	</tbody>
</table>


@elseif(isset($shipmentDetails))
<div class="row events">
	<table  id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Product name</th>
				<th>Packing</th>
                <th>Weight unit</th>
                <th>Binding</th>
				<th>Net weight(MT)</th>
				<th>Price/MT</th>
				<th>Total amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($shipmentDetails as $key => $order)
           
			<tr>
				<td>{{$order->product->product}}</td>
				<td>{{$order->product->product}}</td>
				<td>{{$order->packing->packing}}</td>
				<td>{{$order->binding->binding}}</td>
                <td>{{$order->weightUnit->weight_unit}}</td>
				<td>{{$order->net_weight_id}}</td>
				<td>{{$order->price}}</td>
				<td>{{$order->total_amount}}</td>
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
    	var hrf = "{{route('admin.show-shipment',[':po_no_id',':id'])}}";
    	hrf = hrf.replace(':po_no_id',data[0]);
        hrf = hrf.replace(':id',data[1]);
        console.log(hrf);
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