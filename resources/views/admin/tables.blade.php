@extends('master.masterpage-admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Tables</h1>
</div>
<div class="row events">
	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.shipment-status') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Shipment Status</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.payment-terms') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Payment terms</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.incoterms') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Incoterms</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.packing') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Packing</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.binding') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Binding</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.container-size') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Container size</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.certificate-of-origin') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Certificate of origin</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.po-status') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">PO status</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.weight-unit') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Weight unit</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.pod') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">POD</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.supplier') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Supplier</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.origin') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Origin</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.manufacturer') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Manufacturer</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.customer') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Customer</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-4 shadow-sm">
			<a href="{{ route('admin.product') }}" class="btn text-left event">
				<div class="card-body">
					<h5 class="card-title">Product</h5>
					<p class="card-subtitle"></p>
					<hr>
					<p class="card-text"></p>
				</div>
			</a>
		</div>
	</div>
</div>

@endsection