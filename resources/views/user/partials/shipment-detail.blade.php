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
	<td>{{$detail->net_weight}}</td>
	<input type="hidden" name="net_weight[]" value="{{$detail->net_weight}}">
	<td >{{$detail->price}}</td>
	<input type="hidden"name="price[]" value="{{$detail->price}}">
	<td class="text-right" >{{$detail->total_amount}}</td>
	<input type="hidden" name="amount[]" value="{{$detail->total_amount}}">
</tr>
@endforeach
@endif