@if(!empty($detail))
<?php 
$unit_price = $detail->unit_price;
$qty = $detail->qty;
$tax_level = $detail->tax_level;
$amount = $unit_price*$qty;

$cont = $detail->cont;
$bl_date = date("m/d/Y",strtotime($detail->bl_date));
$f_date = date("m/d/Y",strtotime($detail->first_payment_date));
$s_date = date("m/d/Y",strtotime($detail->second_payment_date));
$t_date = date("m/d/Y",strtotime($detail->third_payment_date));
$fourth_date = date("m/d/Y",strtotime($detail->fourth_payment_date));
$fifth_date = date("m/d/Y",strtotime($detail->fifth_payment_date));

?>
<tr >
	<td class="w-25" style="word-break: break-all;">{{$detail->item_name}}</td>
	<input type="hidden" name="product[]" value="{{$detail->item_name}}">
	<td>{{$bl_date}}</td>
	<input type="hidden" name="bl_date[]" value="{{$bl_date}}">
	<td>{{$qty}}</td>
	<input type="hidden" name="qty[]" value="{{$detail->qty}}">
	<td>{{$unit_price}}</td>
	<input type="hidden" name="unit_price[]" value="{{$detail->unit_price}}">
	<td class="text-right" >{{$amount}}</td>
	<input type="hidden" name="amount[]" value="{{$amount}}">
</tr>
<tr>
	<td rowspan="11">Ghi chú:<br><textarea class="form-control" name="note"></textarea> </td>

	<td class="text-right" colspan="3" style="border-bottom: 0"><strong>Ngày thanh toán thứ nhất </strong><i class="hint">(1st Payment Date):</i></td>
	<td class="text-right small-width">{{$f_date}}</td>
	<input type="hidden" name="f_date" value="{{$f_date}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền ngày thứ nhất </strong><i class="hint">(1st Payment Amount):</i></td>

	<td class="text-right small-width">{{$detail->first_payment_amount}}</td>
	<input type="hidden" value="{{$detail->first_payment_amount}}" name="f_amount">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Ngày thanh toán thứ hai </strong><i class="hint">(2nd Payment Date):</i></td>
	<td class="text-right small-width">{{$s_date}}</td>
	<input type="hidden" name="s_date" value="{{$s_date}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền ngày thứ hai </strong><i class="hint">(2nd Payment Amount):</i></td>
	<td class="text-right small-width">{{$detail->second_payment_amount}}</td>
	<input type="hidden" name="s_amount" value="{{$detail->second_payment_amount}}">
</tr>

<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Ngày thanh toán thứ ba </strong><i class="hint">(3rd Payment Date):</i></td>
	<td class="text-right small-width">{{$t_date}}</td>
	<input type="hidden" name="third_date" value="{{$t_date}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền ngày thứ ba </strong><i class="hint">(3rd Payment Amount):</i></td>
	<td class="text-right small-width">{{$detail->third_payment_amount}}</td>
	<input type="hidden" name="third_amount" value="{{$detail->third_payment_amount}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Ngày thanh toán thứ tư </strong><i class="hint">(4th Payment Date):</i></td>

	<td class="text-right small-width">{{$fourth_date}}</td>
	<input type="hidden" value="{{$fourth_date}}" name="fourth_date">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền ngày thứ tư </strong><i class="hint">(4th Payment Amount):</i></td>
	<td class="text-right small-width">{{$detail->fourth_payment_amount}}</td>
	<input type="hidden" name="fourth_amount" value="{{$detail->fourth_payment_amount}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Ngày thanh toán thứ năm </strong><i class="hint">(5th Payment Date):</i></td>
	<td class="text-right small-width">{{$fifth_date}}</td>
	<input type="hidden" name="fifth_date" value="{{$fifth_date}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền ngày thứ năm </strong><i class="hint">(5th Payment Amount):</i></td>
	<td class="text-right small-width">{{$detail->fifth_payment_amount}}</td>
	<input type="hidden" name="fifth_amount" value="{{$detail->fifth_payment_amount}}">
</tr>
<tr>
	<td class="text-right" colspan="3" style="border: 0"><strong>Tổng tiền thanh toán </strong><i class="hint">(Total payment):</i></td>
	<td class="text-right small-width">({{$detail->total_payment}})</td>
	<input type="hidden" name="total_amount" value="{{$detail->total_payment}}">
</tr>
@endif
