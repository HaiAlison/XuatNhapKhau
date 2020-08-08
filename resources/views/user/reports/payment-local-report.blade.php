@extends('master.masterpage')
@section('css')
<style type="text/css">
	.hint{
		font-size: 75%; 
		font-weight: normal;
	}
	.drop{
		padding: 0 10px 0 10px; 
	}
</style>
@endsection
@section('content')

<form action="{{ route('user.print-local') }}" style="text-align: left; background-color: #fafafa"  method="post">
	@csrf
	<div class="container container-smaller">
		<div class="row">
			<div class="col-lg-12 col-lg-offset-1" style="margin-top:20px; text-align: right">
				<div class="btn-group mb-4">
					<button type="submit" class="btn btn-success">Save as PDF</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="invoice">
					<div class="row">
						<div class="col-sm-6">
							<h2>From:</h2>
							<h4><strong class="col-sm-6">8.4_MVN_06_18_F02 : PURCHASE ORDER</strong></h4><br>
							<div class="row">
								<label class="col-sm-5">Author</label>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-sm" name="author"/>
								</div>
								<label class="col-sm-5">Country/Affiliate</label>	
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-sm" name="country"/>
								</div>

								<label class="col-sm-5">BU/Department</label>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-sm" name="department"/>
								</div>

								<label class="col-sm-5">Responsibility Area</label>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-sm" name="responsibility"/>
								</div>

								<label class="col-sm-5">Original Date of Issue</label>
								<div class="col-sm-6">
									<input type="date" class="form-control form-control-sm" name="origin_date_issue"/>
								</div>
							</div>
						</div>

						<div class="col-sm-6 text-right">
							<img src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1537151698/website/logo.png" alt="logo">
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<label class="col-sm-5">Loại PO <i class="hint">(Type PO):</i></label>
								<div class="col-sm-6">
									<select class="form-control form-control-sm drop" id="po_no" name="type_po">
										<option selected disabled>Select PO.</option>
										@foreach($shipments as $key => $shipment)
										<option>{{$shipments[$key]}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-5">Loại dịch vụ<i class="hint">(Type of service):</i></label>
								<div class="col-sm-6">
									<select class="form-control form-control-sm drop" id="type_service" name="type_service">
										<option selected disabled>Select Type of service</option>
									</select>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-5">Đối tác liên hệ <i class="hint">(Contact):</i></label>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-sm" name="contact"  placeholder="">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<label class="col-sm-4 ">Số <i class="hint">(No.-sub No.):</i></label>
								<div class="col-sm-6">
									<select class="form-control form-control-sm drop" id="sub_po" name="sub_po">
										<option disabled selected>Select Sub PO.</option>
									</select>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-4 ">Ngày <i class="hint">(Date):</i></label>
								<div class="col-sm-6">
									<input type="date" class="form-control form-control-sm" id="po_date" name="date" placeholder="">
								</div>
							</div>
							<div class="row">
								<label class="col-sm-4 ">Điện thoại <i class="hint">(Tel):</i></label>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-sm" name="tel" placeholder="">
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="row">
								<label class="col-sm-2">Địa chỉ <i class="hint">(Address):</i></label>
								<div class="col-sm-9">
									<textarea name="address" class="form-control form-control-sm"></textarea>
								</div>
							</div>
						</div>

						<div style="margin-bottom: 0px">&nbsp;</div>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table invoice-product">
						<thead style="background: #F5F5F5;">
							<tr class="header">
								<th>Tên vật tư<br><i class="hint">(Product name)</i></th>
								<th>Ngày giao hàng<br><i class="hint">(Delivery date)</i></th>
								<th>Số lượng<br><i class="hint">(Quantity)</i></th>
								<th>Đơn giá<br><i class="hint">(Unit price)</i></th>
								<th class="text-right">Thành tiền<br><i class="hint">(Amount)</i></th>
							</tr>
						</thead>
						<tbody id="details">
							
							

						</tbody>
					</table>
				</div><!-- /table-responsive -->

				<hr>
				<table class="table invoice-term">
					<tbody>
						<tr>
							<td class="text-left">Quy tắc thương mại quốc tế <i class="hint">(Incoterms):</i></td>
							<td><input type="text" name="incoterm" id="incoterm" class="form-control form-control-sm"/></td>
						</tr>
						<tr>
							<td class="text-left">Cảng đi <i class="hint">(POL):</i></td>
							<td><input type="text" name="pol" id="pol" class="form-control form-control-sm"/></td>
						</tr>
						<tr>
							<td class="text-left">Số yêu cầu đặt hàng <i class="hint">(PR No.):</i></td>
							<td><input type="text" name="pr_no" id="pr_no" class="form-control form-control-sm"/></td>
						</tr>
						<tr>
							<td class="text-left">Thời gian giao hàng dự kiến <i class="hint">(Scheduled Delivery):  </i></td>
							<td><input type="date" name="eta" id="eta" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td class="text-left">Ngày vận đơn <i class="hint">(B/L date):</i></td>
							<td><input type="date" name="bl_date" id="bl_date" class="form-control form-control-sm"/></td>
						</tr>
						<tr>
							<td class="text-left">Ngày đáo hạn <i class="hint">(Due date):</i></td>
							<td><input type="date" name="due_date" id="due_date" class="form-control form-control-sm"/></td>
						</tr>
						<tr>
							<td class="text-left">Ngày yêu cầu đặt hàng <i class="hint">(PR date):</i></td>
							<td><input type="date" name="pr_date" id="pr_date" class="form-control form-control-sm"/></td>
						</tr>
					</tbody>
				</table>
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-sm-4 text-center">
								<strong>Người lập phiếu</strong><br><i class="hint">(Prepared by)</i><br><br>
								<input type="text" class="form-control form-control-sm" name="prepared_by"/>
							</div>
							<div class="col-sm-4 text-center">
								<strong>Người duyệt</strong><br><i class="hint">(Approved by)</i><br><br>
								<input type="text" class="form-control form-control-sm" name="approved_by"/>
							</div>
							<div class="col-sm-4 text-center">
								<strong>Xác nhận của nhà cung cấp</strong><br><i class="hint">(Confirmed by supplier)</i><br><br>
								<input type="text" class="form-control form-control-sm" name="confirmed_by_supplier"/>
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-6">Nếu có phát sinh bất kỳ thắc mắc về Đơn hàng, vui lòng liên hệ…<br><i class="hint">(Should you have any enquiries concerning this purchase order, please contact):</i>
					</div>
					<div class="col-sm-6"><textarea class="form-control form-control-sm" name="concern"></textarea> </div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-4 text-right">
								<i>ISO REF: 8.4_MVN_06_18_F02</i>
							</div>
							<div class="col-lg-4 text-center">
								<i>- Prep by: COO– App by: GD –</i>
							</div>
							<div class="col-lg-4 text-right">
								<i>Rev: 3 – Issued date: 01.04.2020</i>
							</div>
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</form>
@endsection
@section('script')
<script type="text/javascript">
	$("#po_no").on('change',function(e){
		$.ajax({
			url: "{{ route('user.show-po')}}",
			method: 'POST',
			data: {po_no_id: $("#po_no").val(),
			_token: $('input[name="_token"]').val()},
			success: function(result){
				$("#sub_po").html(result.output);
			},
			error: function(){
				alert("fail");
			}
		});
		e.preventDefault();
	})

	$("#sub_po").on('change',function(e){
		$.ajax({
			url: "{{ route('user.show-detail-po')}}",
			method: 'POST',
			data: {po_no_id: $("#po_no").val(),
			sub_po: $("#sub_po").val(),
			_token: $('input[name="_token"]').val()},
			success: function(result){
				$("#type_service").html(result.output);
			},
			error: function(){
				$("#type_service").html("<option>Loading...</option>");
			}

		});
		e.preventDefault();
	})
	$("#type_service").on('change',function(e){
		$.ajax({
			url: "{{ route('user.show-detail-local')}}",
			method: 'POST',
			data: {type_of_service: $("#type_service").val(),
			sub_po: $("#sub_po").val(),
			_token: $('input[name="_token"]').val()},
			success: function(result){
				$("#details").html(result.html);
				$("#po_date").prop('value', result.local.po_date);
				$("#incoterm").prop('value', result.local.incoterm);
				$("#pol").prop('value', result.local.pol);
				$("#pr_no").prop('value', result.local.pr_no);
				$("#eta").prop('value', result.local.eta);
				$("#bl_date").prop('value', result.local.bl_date);
				$("#due_date").prop('value', result.local.due_date);
				$("#pr_date").prop('value', result.local.pr_date);
			},
			error: function(){
				$("#details").html("Loading...");
			}

		});
		e.preventDefault();
	})
	
</script>
@endsection