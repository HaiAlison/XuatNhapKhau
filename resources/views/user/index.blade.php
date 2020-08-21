@extends('master.masterpage')

@section('index')
<div class="row h-100 justify-content-center align-items-center">
	<div class="col-lg-6 col-md-12 services-left-image">
		<img src="{{ asset('assets/img/services-left-image/big-monitor.png') }}" class="wow fadeInDown" data-wow-delay="0.6s" alt="big-monitor">
		<img src="{{ asset('assets/img/services-left-image/creative.png') }}" class="wow fadeInUp" data-wow-delay="0.6s" alt="creative">
		<img src="{{ asset('assets/img/services-left-image/developer.png') }}" class="wow fadeInLeft" data-wow-delay="0.6s" alt="developer">
		<img src="{{ asset('assets/img/services-left-image/flower-top.png') }}" class="wow zoomIn" data-wow-delay="0.6s" alt="flower-top">
		<img src="{{ asset('assets/img/services-left-image/small-monitor.png') }}" class="wow bounceIn" data-wow-delay="0.6s" alt="small-monitor">
		<img src="{{ asset('assets/img/services-left-image/small-top.png') }}" class="wow fadeInDown" data-wow-delay="0.6s" alt="small-top">
		<img src="{{ asset('assets/img/services-left-image/table.png') }}" class="wow zoomIn" data-wow-delay="0.6s" alt="table">
		<img src="{{ asset('assets/img/services-left-image/target.png') }}" class="wow fadeInUp" data-wow-delay="0.6s" alt="target">
		<img src="{{ asset('assets/img/services-left-image/cercle-shape.png') }}" class="bg-image rotateme" alt="shape">

		<img src="assets/img/services-left-image/main-pic.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="main-pic">
	</div>
	<div class="col-lg-6 col-md-12">
		<div class="about-content">
			<div class="section-title">
				<h2>About Import and Export Operation</h2>
				<div class="bar"></div>
				<p>Import and export is the international trade </p>
			</div>

			<p>An import is a good or service brought into one country from another country as well as export; which is the process of taking product from one country to another country. The backbone of international trade is specially formed around the term import and export; because the act of international exchange of goods is a significant part of international trading. It is very necessary to balance the value of trading between importation and the amount of product leaving the country so that the host country will have a positive trade balance; else there will be negative balance of trade; which is a critical factor of economy growth and development.</p>
		</div>
	</div>
</div>
@endsection
@section('boxes')
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="single-box">
			<div class="icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
			</div>
			<h3>Purchase Order</h3>
			<p>A purchase order (PO) is a commercial document and first official offer issued by a buyer to a seller indicating types, quantities, and agreed prices for products or services. It is used to control the purchasing of products and services from external suppliers <br><br></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="single-box bg-f78acb">
			<div class="icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
			</div>
			<h3>Purchase Order Shipments</h3>
			<p>Use the Shipments window to enter multiple shipments for standard and planned purchase order lines and to edit shipments that Purchasing automatically created for you. <br><br><br><br></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="single-box bg-c679e3">
			<div class="icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
			</div>
			<h3>Payment Overseas</h3>
			<p>Making an overseas payment requires you to pay money to an intermediary to handle your transfer — typically your local bank or a money transfer company. The provider you choose then converts your US dollars into the currency you’re sending overseas and transfers the money to your recipient.</p>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="single-box bg-eb6b3d">
			<div class="icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
			</div>
			<h3>Payment Local</h3>
			<p>Local payment methods are payment methods popular in specific regions. For example, Boleto is a local payment method in South America, while AliPay is a local payment method of China.<br><br><br><br><br></p>
		</div>
	</div>
</div>
@endsection