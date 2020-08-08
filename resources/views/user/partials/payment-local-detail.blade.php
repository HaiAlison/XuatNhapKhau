@if(!empty($detail))
<?php 
$unit_price = $detail->unit_price;
$qty = $detail->qty;
$tax_level = $detail->tax_level;
$amount = $unit_price*$qty;
$before_vat = $unit_price*$qty*$tax_level;
$amount_vat = ($before_vat*0.1);
#localCharge
$cont = $detail->cont;
$docs = $detail->docs;
$dthc = $detail->dthc;
$cic = $detail->cic;
$cleaning = $detail->cleaning;
$others = $detail->other;
?>
<tr >
	<td class="w-25" style="word-break: break-all;">{{$detail->item_name}}</td>
	<input type="hidden" name="product[]" value="{{$detail->item_name}}">
	<td>{{date("d/m/Y",strtotime($detail->bl_date))}}</td>
	<input type="hidden" name="bl_date[]" value="{{date('d/m/Y',strtotime($detail->bl_date))}}">
	<td>{{$detail->qty}}</td>
	<input type="hidden" name="qty[]" value="{{$detail->qty}}">
	<td>{{$detail->unit_price}}</td>
	<input type="hidden" name="unit_price[]" value="{{$detail->unit_price}}">
	<td class="text-right" >{{$amount}}</td>
	<input type="hidden" name="amount[]" value="{{$amount}}">
</tr>
@endif


@if($detail->type_of_service == 'tax')
	<tr>
		<td rowspan="5">Ghi chú:<br><textarea class="form-control" name="note"></textarea> </td>

		<td class="text-right" colspan="3" style="border-bottom: 0"><strong>Thuế suất</strong><i class="hint">(Tax levels):</i></td>
		<td class="text-right small-width">{{$tax_level}}%</td>
		<input type="hidden" name="tax_level" value="{{$tax_level}}%">
	</tr>
	<tr>
		<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền hàng trước thuế </strong><i class="hint">(Total amount before VAT):</i></td>

		<td class="text-right small-width">{{$before_vat}}</td>
		<input type="hidden" value="{{$before_vat}}" name="amout_before_vat">
	</tr>
	<tr>
		<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền thuế VAT </strong><i class="hint">(Total amount VAT):</i></td>
		<td class="text-right small-width">{{$amount_vat}}</td>
		<input type="hidden" name="sum_vat" value="{{$amount_vat}}">
	</tr>
	<tr>
		<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền thanh toán </strong><i class="hint">(Total amount):</i></td>
		<td class="text-right small-width">{{$detail->amount}}</td>
		<input type="hidden" name="total_amount" value="{{$detail->amount}}">
	</tr>
@endif

@if($detail->type_of_service == 'localCharge')
<tr>
	<td rowspan="7">Ghi chú:<br><textarea class="form-control" name="note"></textarea> </td>

	<td class="text-right" colspan="3" style="border-bottom: 0"><strong>Số lượng container</strong><i class="hint">(# CONT):</i></td>
	<td class="text-right small-width">{{$cont}}</td>
	<input type="hidden" name="cont" value="{{$cont}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Phí chứng từ</strong><i class="hint">(DOCS):</i></td>
	<td class="text-right small-width">{{$docs}}</td>
	<input type="hidden" name="docs" value="{{$docs}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Phụ phí THC </strong><i class="hint">(DTHC):</i></td>

	<td class="text-right small-width">{{$dthc}}</td>
	<input type="hidden" value="{{$dthc}}" name="dthc">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Phí cân bằng container </strong><i class="hint">(CIC):</i></td>
	<td class="text-right small-width">{{$cic}}</td>
	<input type="hidden" name="cic" value="{{$cic}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Phí vệ sinh container </strong><i class="hint">(Cleaning):</i></td>
	<td class="text-right small-width">{{$cleaning}}</td>
	<input type="hidden" name="cleaning" value="{{$cleaning}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Các phí khác</strong><i class="hint">(Others):</i></td>
	<td class="text-right small-width">{{$others}}</td>
	<input type="hidden" name="others" value="{{$others}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền phí địa phương </strong><i class="hint">(Total amount local charge):</i></td>
	<td class="text-right small-width">{{$detail->amount}}</td>
	<input type="hidden" name="total_amount" value="{{$detail->amount}}">
</tr>
@endif