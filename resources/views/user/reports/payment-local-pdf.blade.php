<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">

	<title>Invoice</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{public_path('assets/css/my-style.css')}}">

	<style>
		.text-right {
			text-align: right;
		}
		.hint{
			font-size: 75%; 
			font-weight: normal;
		}
	</style>

</head>
<body class="login-page" style="background: white; font-family: DejaVu Sans;">

	<div>
		<div class="row">
			<div class="col-xs-7">
				<h4>From:</h4>
				<strong>8.4_MVN_06_18_F02 : PURCHASE ORDER</strong><br>
				<table width="100%" style="width:100%" border="0">
					<tbody>
						<tr>
							<td style="width: 35%;">Author</td>
							<td style="text-align:left;"> {{$data['author']}}</td>
						</tr>
						<tr>
							<td style="width: 35%;">Country/Affiliate</td>
							<td style="text-align:left;"> {{$data['country']}}</td>
						</tr>
						<tr>
							<td style="width: 35%;">BU/Department</td>
							<td style="text-align:left;"> {{$data['department']}}</td>
						</tr>
						<tr>
							<td style="width: 35%;">Responsibility Area</td>
							<td style="text-align:left;"> {{$data['responsibility']}}</td>
						</tr>
						<tr>
							<td style="width: 35%;">Original Date of Issue</td>
							<td style="text-align:left;"> {{$data['origin_date_issue']}}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-xs-4">
				<img src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1537151698/website/logo.png" alt="logo">
			</div>
		</div>

		<div style="margin-bottom: 0px">&nbsp;</div>

		<div class="row">
			<div class="col-xs-6">
				<table width="100%" style="width:100%" border="0">
					<tbody>
						<tr>
							<td style="width: 35%;">Loại PO <i class="hint">(Type PO):</i></td>
							<td style="text-align:left;"> {{$data['type_po']}}</td>
						</tr>
						<tr>
							<td style="width: 35%;">Loại dịch vụ <i class="hint">(Type of service):</i></td>
							<td style="text-align:left;"> {{$data['type_service']}}</td>
						</tr>
						<tr>
							<td style="width: 35%;">Đối tác liên hệ <i class="hint">(Contact):</i></td>
							<td style="text-align:left;"> {{$data['contact']}}</td>
						</tr>
						
					</tbody>
				</table>
			</div>

			<div class="col-xs-5">
				<table style="width: 100%">
					<tbody>
						<tr>
							<td>Số <i class="hint">(No.-sub No.):</i></td>
							<td class="text-right">{{$data['sub_po']}}</td>
						</tr>
						<tr>
							<td>Ngày <i class="hint">(Date):</i></td>
							<td class="text-right">{{$data['date']}}</td>
						</tr>
					</tbody>
				</table>

				<div style="margin-bottom: 0px">&nbsp;</div>

				<table style="width: 100%;">
					<tbody>
						<tr style="padding: 5px">
							<td style="padding: 5px"><div> Điện thoại <i class="hint">(Tel)</i> </div></td>
							<td style="padding: 5px" class="text-right">{{$data['tel']}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-11">
				<table>
					<tr>
						<td style="width: 35%;">Địa chỉ <i class="hint">(Address): &nbsp;</i></td>
						<td>&nbsp;{{$data['address']}}</td>
					</tr>
				</table>
			</div>
		</div>
		<table class="table invoice-product">
			<thead class="header" >
				<tr>
					<th>Tên vật tư<br><i class="hint">(Product name)</i></th>
					<th class="w-20">Ngày giao hàng<br><i class="hint">(Delivery date)</i></th>
					<th class="w-10">Số lượng<br><i class="hint">(Quantity)</i></th>
					<th class="w-20">Đơn giá<br><i class="hint">(Unit price)</i></th>
					<th class="text-right">Thành tiền<br><i class="hint">(Amount)</i></th>
				</tr>
			</thead>
			<tbody>
				@if(isset($data['product']))
				@for ($i=0; $i < count($data['product']); $i++) {
				<tr>
					<td class="w-30">{{$data['product'][$i]}}</td>
					<td>{{$data['bl_date']}}</td>
					<td>{{$data['qty'][$i]}}</td>
					<td>{{$data['unit_price'][$i]}}</td>
					<td class="text-right">{{$data['amount'][$i]}}</td>
				</tr>
			}
			@endfor
			@else
			<tr>
				<td colspan="5">Empty</td>
			</tr>
			@endif
		</tbody>
	</table>

	<table class="table invoice-total ">
		<tbody>
			@if($data['type_service'] == 'tax')
			<tr>
				<td rowspan="5">Ghi chú:<br><div class="note break">{{$data['note']}}</div> </td>
				<td class="text-right" colspan="2" style="border-bottom: 0"><strong>Thuế suất</strong><i class="hint">(Tax levels):</i></td>
				<td class="text-right small-width">{{$data['tax_level']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2"  style="border: 0"><strong>Tổng tiền hàng trước thuế </strong><i class="hint">(Total amount before VAT):</i></td>
				<td class="text-right small-width">{{$data['amout_before_vat']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2" style="border: 0"><strong>Tổng tiền thuế VAT </strong><i class="hint">(Total amount VAT):</i></td>
				<td class="text-right small-width">{{$data['sum_vat']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2" style="border: 0"><strong>Tổng tiền thanh toán </strong><i class="hint">(Total amount):</i></td>
				<td class="text-right small-width">{{$data['total_amount']}}</td>
			</tr>
			@elseif($data['type_service'] == 'localCharge')
			<tr>
				<td rowspan="7">Ghi chú:<br><div class="note break">{{$data['note']}}</div> </td>
				<td class="text-right" colspan="2" style="border-bottom: 0"><strong>Số lượng container </strong><i class="hint">(# CONT):</i></td>
				<td class="text-right small-width">{{$data['cont']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2"  style="border: 0"><strong>Phí chứng từ </strong><i class="hint">(DOCS):</i></td>
				<td class="text-right small-width">{{$data['docs']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2" style="border: 0"><strong>Phụ phí THC </strong><i class="hint">(DTHC):</i></td>
				<td class="text-right small-width">{{$data['dthc']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2" style="border: 0"><strong>Phí cân bằng container </strong><i class="hint">(CIC):</i></td>
				<td class="text-right small-width">{{$data['cic']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2" style="border: 0"><strong>Phí vệ sinh container</strong><i class="hint">(Cleaning):</i></td>
				<td class="text-right small-width">{{$data['cleaning']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2" style="border: 0"><strong>Các phí khác </strong><i class="hint">(Others):</i></td>
				<td class="text-right small-width">{{$data['others']}}</td>
			</tr>
			<tr>
				<td class="text-right" colspan="2" style="border: 0"><strong>Tổng tiền phí địa phương </strong><i class="hint">(Total amount):</i></td>
				<td class="text-right small-width">{{$data['total_amount']}}</td>
			</tr>
			@endif
		</tbody>
	</table>
	<div class="page-break"></div>
	<hr><br>
	<table class="table invoice-term">
		<tbody>
			<tr>
				<td class="text-left">Quy tắc thương mại quốc tế <br><i class="hint">(Incoterms):</i></td>
				<td>{{$data['incoterm']}}</td>
			</tr>
			<tr>
				<td class="text-left">Cảng đi <br><i class="hint">(POL):</i></td>
				<td>{{$data['pol']}}</td>
			</tr>
			<tr>
				<td class="text-left">Số yêu cầu đặt hàng <br><i class="hint">(PR No.):  </i></td>
				<td>{{$data['pr_no']}}</td>
			</tr>
			<tr>
				<td class="text-left">Thời gian giao hàng dự kiến <br><i class="hint">(Scheduled Delivery):</i></td>
				<td>{{$data['eta']}}</td>
			</tr>
			<tr>
				<td class="text-left">Ngày vận đơn <br><i class="hint">(B/L date):</i></td>
				<td>{{$data['bl_date']}}</td>
			</tr>
			<tr>
				<td class="text-left">Ngày đáo hạn <br><i class="hint">(Due date):</i></td>
				<td>{{$data['due_date']}}</td>
			</tr>
			<tr>
				<td class="text-left">Ngày yêu cầu đặt hàng <br><i class="hint">(PR date):</i></td>
				<td>{{$data['pr_date']}}</td>
			</tr>
		</tbody>
	</table>
	<div class="row">
		<div class="col-xs-3 text-center">
			<strong>Người lập phiếu</strong><br><i class="hint">(Prepared by)</i><br><br>
			<i>{{$data['prepared_by']}}</i>
		</div>
		<div class="col-xs-3 text-center">
			<strong>Người duyệt</strong><br><i class="hint">(Approved by)</i><br><br>
			<i>{{$data['approved_by']}}</i>
		</div>
		<div class="col-xs-4 text-center">
			<strong>Xác nhận của nhà cung cấp</strong><br><i class="hint">(Confirmed by supplier)</i><br><br>
			<i>{{$data['confirmed_by_supplier']}}</i>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-xs-6"><i class="hint">Nếu có phát sinh bất kỳ thắc mắc về Đơn hàng, vui lòng liên hệ…</i><br><i class="hint">(Should you have any enquiries concerning this purchase order, please contact):</i>
		</div>
		<div class="col-xs-5">{{$data['concern']}}</div>
	</div>

	<div class="row">
		<div class="col-xs-3 text-right hint">
			<i>ISO REF: 8.4_MVN_06_18_F02</i>
		</div>
		<div class="col-xs-3 text-center hint">
			<i>Prep by: COO– App by: GD –</i>
		</div>
		<div class="col-xs-4 text-right hint">
			<i>Rev: 3 – Issued date: 01.04.2020</i>
		</div>
	</div>
	
</body>
</html>