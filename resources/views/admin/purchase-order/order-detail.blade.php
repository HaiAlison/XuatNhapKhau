@extends('master.masterpage-admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
	<h2 class="h4">Edit Order Details</h2> <div><User></User></div>
</div><br>
<div class="row">
	<form action="{{ route('admin.update-order-detail',['id' => $orderDetail->id])}}" method="post">
		@csrf
		<div class="col-lg-6 col-md-12">
			<div class="form-group row cal-amount">


				<label for="postatus" class="col-sm-4 col-form-label">PO No.</label>
				<div class="col-sm-8 select-box">
					<input type="text" readonly id="po_no_id" name="po_no_id" class="form-control form-control-sm " value="{{$orderDetail->po_no_id}}" >
				</div>
				<label for="postatus" class="col-sm-4 col-form-label">Product name</label>
				<div class="col-sm-8 select-box">
					<select class="form-control form-control-sm" id="product_code_id" name="product_code_id" >
						@foreach($products as  $product)
						<option value="{{$product->id}}" {{ $orderDetail->product_code_id == $product->id ? 'selected' : '' }}>{{$product->product}}</option>
						@endforeach
					</select>
				</div>

				<label for="origin" class="col-sm-4 col-form-label">Packings</label>
				<div class="col-sm-8">
					<select class="form-control form-control-sm" name="packing_id" id="packing_id">
						@foreach($packings as $packing)
						<option value="{{$packing->id}}" {{ $orderDetail->packing_id == $packing->id ? 'selected' : '' }} >{{$packing->packing}}</option>
						@endforeach
					</select>
				</div>

				<label for="manufacturer" class="col-sm-4 col-form-label">Weight Unit</label>
				<div class="col-sm-8">
					<select class="form-control form-control-sm" id="weight_unit_id" name="weight_unit_id">
						@foreach($weightUnits as  $weightUnit)
						<option value="{{$weightUnit->id}}" {{ $orderDetail->weight_unit_id == $weightUnit->id ? 'selected' : '' }}>{{$weightUnit->weight_unit}}</option>
						@endforeach
					</select>
				</div>

				<label for="inputEmail3" class="col-sm-4 col-form-label">Binding</label>
				<div class="col-sm-8">
					<select class="form-control form-control-sm" name="binding_id" id="supplier" >
						@foreach($bindings as  $binding)
						<option value="{{$binding->id}}" {{ $orderDetail->binding_id == $binding->id ? 'selected' : '' }}>{{$binding->binding}}</option>
						@endforeach
					</select>
				</div>

				<label for="inputEmail3" class="col-sm-4 col-form-label">Net weight</label>
				<div class="col-sm-8">
					<input type="number" id="net_weight" name="net_weight" step=".01" class="form-control form-control-sm {!! ($errors->has('net_weight') ? 'is-invalid' : '' ) !!} " value="{{$orderDetail->net_weight}}" >
				</div>

				<label for="inputEmail3" class="col-sm-4 col-form-label">Price</label>
				<div class="col-sm-8">
					<input type="number" id="price" name="price" step=".01" class="form-control form-control-sm {!! ($errors->has('price') ? 'is-invalid' : '' ) !!} " value="{{$orderDetail->price}}" >
				</div>

				<label for="inputEmail3" class="col-sm-4 col-form-label">Total Amount</label>
				<div class="col-sm-8">
					<input type="text" id="total_amount" step=".01" class="form-control form-control-sm " readonly value="{{number_format($orderDetail->total_amount,2,',','.')}}" >
					<input type="hidden" id="total_amount_hidden" name="total_amount" step=".01" class="form-control form-control-sm " readonly value="{{$orderDetail->total_amount}}" >

				</div>
			</div>
		</div>
		<button class="btn btn-secondary">Save</button>
	</form>
</div>
@stop
