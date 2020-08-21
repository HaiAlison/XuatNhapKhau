@if(!empty($details))
@foreach($details as $key => $detail)
<tr >
	<td class="w-25" style="word-break: break-all;">{{$detail->product->product}}</td>
	<input type="hidden" name="product[]" value="{{$detail->product->product}}">
	<td>{{$detail->packing->packing}}</td>
	<input type="hidden" name="packing[]" value="{{$detail->packing->packing}}">
	<td>{{$detail->weightUnit->weight_unit}}</td>
	<input type="hidden" name="weight_unit[]" value="{{$detail->weightUnit->weight_unit}}">
	<td>{{$detail->binding->binding}}</td>
	<input type="hidden" name="binding[]" value="{{$detail->binding->binding}}">
	<td>{{number_format($detail->net_weight,2,',','.')}}</td>
	<input type="hidden" name="net_weight[]" value="{{number_format($detail->net_weight,2,',','.')}}">
	<td >{{number_format($detail->price,2,',','.')}}</td>
	<input type="hidden"name="price[]" value="{{number_format($detail->price,2,',','.')}}">
	<td class="text-right" >{{number_format($detail->total_amount,2,',','.')}}</td>
	<input type="hidden" name="amount[]" value="{{number_format($detail->total_amount,2,',','.')}}">
</tr>
@endforeach
@endif