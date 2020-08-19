@extends('master.masterpage-admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
	<h2 class="h4">Order Details</h2> <div><User></User></div>
</div><br>
<div class="row events">
	@foreach($orderDetails as $key => $order)
	<div class="col-md-4">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.show-order',['id'=>$order->id]) }}" class="btn text-left event">
				<div class="card-body">

					<h5 class="card-title text-left"><strong>Product name: {{$order->product->product}}</strong></h5>
					<div class="card-subtitle">PO No.: {{$order->po_no_id}}</div>
					<hr>
					<p class="card-text">Total amount: {{number_format($order->total_amount,2, ',', '.')}}</p>
				</div>
			</a>
		</div>
	</div>
	@endforeach
</div>
	<ul class="pagination justify-content-center">
		<li class="page-item">{{$orderDetails->links()}}</li>
	</ul>
@stop
