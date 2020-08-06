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

<form action="{{ route('user.print') }}" style="text-align: left; background-color: #fafafa"  method="post">
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
									@if(count($errors)>0)
									<div class="text-danger">
										{{$errors->first('type_po')}}
									</div>
									@endif
								</div>
							</div>
							<div class="row">
								<label class="col-sm-5">Nhà cung cấp <i class="hint">(Supplier):</i></label>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-sm" id="supplier" name="supplier" placeholder="">
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
									@if(count($errors)>0)
									<div class="text-danger">
										{{$errors->first('sub_po')}}
									</div>
									@endif
								</div>
							</div>
							<div class="row">
								<label class="col-sm-4 ">Ngày <i class="hint">(Date):</i></label>
								<div class="col-sm-6">
									<input type="date" class="form-control form-control-sm" name="date" placeholder="">
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
								<th>Đơn vị tính<br><i class="hint">(Unit)</i></th>
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

				<table class="table invoice-total">
					<tbody>
						<tr>
							<td rowspan="5">Ghi chú:<br><textarea class="form-control" name="note"></textarea> </td>
							<td class="text-right" style="border-bottom: 0"><strong>Tổng tiền hàng trước thuế </strong><i class="hint">(Total amount before VAT):</i></td>
							<td class="text-right small-width">$600</td>
							<input type="hidden" name="amout_before_vat">
						</tr>
						<tr>
							<td class="text-right" style="border: 0"><strong>Số tiền giảm giá/ chiết khấu </strong><i class="hint">(Total discounted amount):</i></td>
							<td class="text-right small-width">$600</td>
							<input type="hidden" name="discount">
						</tr>
						<tr>
							<td class="text-right" style="border: 0"><strong>Tổng tiền thuế VAT </strong><i class="hint">(Total amount VAT):</i></td>
							<td class="text-right small-width">$600</td>
							<input type="hidden" name="sum_vat">
						</tr>
						<tr>
							<td class="text-right" style="border: 0"><strong>Tổng tiền thanh toán </strong><i class="hint">(Total amount):</i></td>
							<td class="text-right small-width">$600</td>
							<input type="hidden" name="total_amount">
						</tr>
						<tr>
							<td class="text-right" style="border-top: 0"><strong>Tiền tệ </strong><i class="hint">(Currency):</i></td>
							<td class="text-right small-width">$600</td>
							<input type="hidden" name="currency">
						</tr>
					</tbody>
				</table>

				<hr>
				<table class="table invoice-term">
					<tbody>
						<tr>
							<td class="text-left">Điều khoản thanh toán<br><i class="hint">(Payment term):</i></td>
							<td><textarea name="payment_term" class="form-control form-control-sm"></textarea></td>
						</tr>
						<tr>
							<td class="text-left">Địa chỉ giao hàng<br><i class="hint">(Deliver to):</i></td>
							<td><textarea name="deliver_to" class="form-control form-control-sm"></textarea></td>
						</tr>
						<tr>
							<td class="text-left">Thời gian giao hàng dự kiến<i class="hint">(Scheduled Delivery):  </i></td>
							<td><input type="date" name="schedule" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td class="text-left">Xuất hóa đơn cho<br><i class="hint">(Invoice to):</i></td>
							<td><textarea name="invoice_to" class="form-control form-control-sm"></textarea></td>
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
				<div class="row">
					<div class="col-sm-12 text-center header" style="border: 2px solid;margin: 20px 0 20px 0"><strong>ONLINE APPROVAL PROCESS (OAP)</strong></div>
					<table class="table invoice-approval">
						<thead>
							<tr>
								<th colspan="5" class="text-center header">PURCHASE ORDER APPROVAL</th>
							</tr>
							<tr>
								<th class="text-center">Requestor</th>
								<th class="text-center">Pre-approver</th>
								<th class="text-center">HOD</th>
								<th class="text-center">HODiv</th>
								<th class="text-center">BOD</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="border-yellow"><input type="text" name=""></td>
								<td class="border-yellow"><input type="text" name=""></td>
								<td class="border-yellow"><input type="text" name=""></td>
								<td class="border-yellow"><input type="text" name=""></td>
								<td class="border-yellow"><input type="text" name=""></td>
							</tr>
							<tr>
								<td><strong>Reason for injection</strong></td>
								<td><input type="text" name=""></td>
								<td><input type="text" name=""></td>
								<td><input type="text" name=""></td>
								<td><input type="text" name=""></td>
							</tr>
						</tbody>
					</table>
				</div>	
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
				$("#supplier").prop('value',result.order.supplier_id );
			}

		});
		e.preventDefault();
	})

	$("#sub_po").on('change',function(e){
		$.ajax({
			url: "{{ route('user.show-detail-po')}}",
			method: 'POST',
			data: {sub_po: $("#sub_po").val(),
			_token: $('input[name="_token"]').val()},
			success: function(result){
				$("#details").html(result.html);
			},
			error: function(){
				$("#details").html("Loading...");
			}

		});
		e.preventDefault();
	})
	
</script>
@endsection