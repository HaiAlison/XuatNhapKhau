@extends('master.masterpage-admin')
@section('content')
<form action="{{ route('admin.update-order',['id'=>$order->id])}}" method="post">
  @csrf
<div id="room" class="col-lg-12 mb-3 pt-3 pb-2">
  <div id="room" class="btn-toolbar mb-2 mb-md-0 float-right">
    <div class="btn-group mr-2">
      <a href="{!!url()->previous() !!}" id="edit" class="btn btn-sm btn-outline-secondary">
        Back
      </a>
    </div>
    <div class="btn-group mr-2">
      <button type="submit" class="btn btn-sm btn-outline-secondary">
        Update
      </button>
    </div>
  </div>
</div>
<br>

  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="form-group row">
        <label for="poNo" class="col-sm-4 col-form-label">PO No.</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('id') ? 'is-invalid' : '') !!}"  value="{{ $order->id }}" name="id" id="poNo" readonly >
          <input type="hidden" class="form-control form-control-sm " value="{{auth()->user()->id}}" name="user_id" >
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('id')}}
          </div>
          @endif
        </div>

        <label for="po_date" class="col-sm-4 col-form-label">PO Date</label>
        <div class="col-sm-8">
          <input type="date" class="form-control form-control-sm {!! ($errors->has('po_date')? 'is-invalid' : '') !!}" id="po_date" placeholder="" name="po_date" value="{{ $order->po_date }}" >
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('po_date')}}
          </div>
          @endif
        </div>

        <label for="postatus" class="col-sm-4 col-form-label">PO status</label>
        <div class="col-sm-8 select-box">
          <select class="form-control form-control-sm" id="postatus" name="po_status_id" >
            @foreach($poStatuses as  $poStatus)
            <option value="{{$poStatus->id}}" {{ $order->po_status_id == $poStatus->id ? 'selected' : '' }}>{{$poStatus->po_status}}</option>
            @endforeach
          </select>
        </div>

        <label for="origin" class="col-sm-4 col-form-label">Origin</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" name="origin_id" id="origin">
            @foreach($origins as $origin)
            <option value="{{$origin->id}}" {{ $order->origin_id == $origin->id ? 'selected' : '' }} >{{$origin->origin_name}}</option>
            @endforeach
          </select>
        </div>

        <label for="manufacturer" class="col-sm-4 col-form-label">Manufacturer</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" id="manufacturer" name="manufacturer_id">
            @foreach($manufacturers as  $manufacturer)
            <option value="{{$manufacturer->id}}" {{ $order->manufacturer_id == $manufacturer->id ? 'selected' : '' }}>{{$manufacturer->manufacturer_name}}</option>
            @endforeach
          </select>
        </div>

        <label for="inputEmail3" class="col-sm-4 col-form-label">Supplier</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" name="supplier_id" id="supplier" >
            @foreach($suppliers as  $supplier)
            <option value="{{$supplier->id}}" {{ $order->supplier_id == $supplier->id ? 'selected' : '' }}>{{$supplier->supplier}}</option>
            @endforeach
          </select>
        </div>

        <label for="inputEmail3" class="col-sm-4 col-form-label">POL</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" id="pol" name="pol">
            @foreach($pods as  $pol)
            <option value="{{$pol->id}}" {{ $order->pol == $pol->id ? 'selected' : '' }}>{{$pol->pod_name}}</option>
            @endforeach
          </select>
        </div>

        <label for="inputEmail3" class="col-sm-4 col-form-label">POD</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" name="pod" id="pod">
            @foreach($pods as  $pod)

            <option value="{{$pod->id}}" {{ $order->pod == $pod->id ? 'selected' : '' }}>{{$pod->pod_name}}</option>
            @endforeach
          </select>
        </div>

        <label for="inputEmail3" class="col-sm-4 col-form-label">Incoterm</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" id="incoterm" name="incoterm_id">
            @foreach($incoterms as  $incoterm)
            <option value="{{$incoterm->id}}" {{ $order->incoterm_id == $incoterm->id ? 'selected' : '' }}>{{$incoterm->incoterms}}</option>
            @endforeach
          </select>
        </div>

        <label for="inputEmail3" class="col-sm-4 col-form-label">ETA requested</label>
        <div class="col-sm-8">
          <input type="date" class="form-control form-control-sm {!! ($errors->has('eta_request') ? 'is-invalid' : '') !!}" id="eta_request" name="eta_request" value="{{$order->eta_request}}" placeholder="">
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('eta_request')}}
          </div>
          @endif
        </div>

        <label for="inputEmail3" class="col-sm-4 col-form-label">End Customer</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('end_customer') ? 'is-invalid' : '') !!}"  id="end_customer" name="end_customer" value="{{$order->end_customer}}" placeholder="">
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('end_customer')}}
          </div>
          @endif
        </div>

        <div class="form-check col-sm-12">
          <input type="checkbox" name="inspection_required" id="inspection_required" class="form-check-input" id="ship-different-address" value="1">
          <input type="hidden" value="0" class="form-check-input" name="inspection_required" >
          <label class="form-check-label" for="inspection_required">Inspection required</label>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label">Type of shipment</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" id="type_of_shipment" name="type_of_shipment" onchange="select()">
            <option value="vessel" {{$order->type_of_shipment == 'vessel' ? 'selected' : ''}}>Vessel</option>
            <option  value="container" {{$order->type_of_shipment == 'container' ? 'selected' : ''}}>Container</option>
          </select>
        </div>

        <label for="number_container" class="col-sm-4 col-form-label">Number of container</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('number_container') ? 'is-invalid' : '') !!}" id="number_container" name="number_container" value="{{$container->number_container ?? ''}}" disabled="true">
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('number_container')}}
          </div>
          @endif
        </div>

        <label for="container_size" class="col-sm-4 col-form-label">Container size</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" id="container_size" name="container_size_id" disabled="true">
            @foreach($containerSizes as  $containerSize)
            <option value="{{$containerSize->id}}" >{{$containerSize->container_size}}</option>
            @endforeach
          </select>
        </div>

        <label for="payload" class="col-sm-4 col-form-label">Payload (MT/Cont.)</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('payload') ? 'is-invalid' : '') !!}" step=".01" id="payload" name="payload" disabled="true" value="{{$container->payload ?? ''}}">
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('payload')}}
          </div>
          @endif
        </div>

        <label for="freight_target" class="col-sm-4 col-form-label">Freight target</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('freight_target') ? 'is-invalid' : '') !!}" step=".01" id="freight_target"  name="freight_target" value="{{$container->freight_target ?? ''}}" placeholder="" disabled="true">
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('freight_target')}}
          </div>
          @endif
        </div>

        <label for="dthc_target" class="col-sm-4 col-form-label">DTHC target</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('dthc_target') ? 'is-invalid' : '') !!}" step=".01" id="dthc_target" name="dthc_target" value="{{$container->dthc_target ?? ''}}"  disabled="true">
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('dthc_target')}}
          </div>
          @endif
        </div>

        <label for="cic_target" class="col-sm-4 col-form-label">CIC target</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('cic_target') ? 'is-invalid' : '') !!}" step=".01" id="cic_target" name="cic_target" value="{{$container->cic_target ?? ''}}"  disabled="true">
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('cic_target')}}
          </div>
          @endif
        </div>

        <label for="hs_code" class="col-sm-4 col-form-label">HS code</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm {!! ($errors->has('hs_code') ? 'is-invalid' : '') !!}" id="hs_code" name="hs_code" value="{{ $order->hs_code }}" >
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('hs_code')}}
          </div>
          @endif
        </div>

        <label for="co" class="col-sm-4 col-form-label">CO</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" id="co" name="certificate_of_origin">
            @foreach($cos as  $co)
            <option value="{{$co->id}}" {{ $order->certificate_of_origin == $co->id ? 'selected' : '' }}>{{$co->certificate_of_origin}}</option>
            @endforeach
          </select>
        </div>

        <label for="paymentterm" class="col-sm-4 col-form-label">Payment terms</label>
        <div class="col-sm-8">
          <select class="form-control form-control-sm" id="paymentterm" name="payment_term_id" onchange="optionTT()">
            @foreach($paymentTerms as  $paymentTerm)
            <option value="{{$paymentTerm->id}}" {{ $order->payment_term_id == $paymentTerm->id ? 'selected' : '' }}>{{$paymentTerm->payment_terms}}</option>
            @endforeach
          </select>
        </div>

        <label for="within_x_day" class="col-sm-4 col-form-label">Within # days</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm  {!! ($errors->has('within_x_day') ? 'is-invalid' : '') !!}" name="within_x_day" value="{{ $order->within_x_day }}" id="within_x_day" >
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('within_x_day')}}
          </div>
          @endif
        </div>

        <label for="inputEmail3" class="col-sm-4 col-form-label">Currency|Fx</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm  {!! ($errors->has('currency') ? 'is-invalid' : '') !!}" id="currency" value="{{ $order->currency }}" name="currency" >
          @if(count($errors)>0)
          <div class="text-danger text-left">
            {{$errors->first('currency')}}
          </div>
          @endif
        </div>

      </div>
    </div>
    <div class="col-lg-12 col-md-12">
      <label for="inputEmail3" class="col-sm-4 col-form-label">Marking</label>
      <div class="col-sm-12">
        <textarea name="marking" id="notes" cols="30" rows="4" placeholder=""  class="form-control {!! ($errors->has('marking') ? 'is-invalid' : '') !!}">{{$order->marking }}</textarea>
        @if(count($errors)>0)
        <div class="text-danger text-left">
          {{$errors->first('marking')}}
        </div>
        @endif
      </div>
    </div>
  </div>
</form>
@stop
@section('script')
<script type="text/javascript">
  //select vessel or container to hidden value input.
  function select(){
    var option = document.getElementById('type_of_shipment');
    if(option.value == "container")
    {
     $('#number_container').prop('disabled',false);
     $('#container_size').prop('disabled',false);
     $('#payload').prop('disabled',false);
     $('#freight_target').prop('disabled',false);
     $('#dthc_target').prop('disabled',false);
     $('#cic_target').prop('disabled',false);
   }
   else{
     $('#number_container').prop('disabled', true);
     $('#container_size').prop('disabled', true);
     $('#payload').prop('disabled', true);
     $('#freight_target').prop('disabled', true);
     $('#dthc_target').prop('disabled', true);
     $('#cic_target').prop('disabled', true);
   }
 }
 function optionTT(){
  var selectedVal = $("#paymentterm option:selected").val();
  if(selectedVal ==='PaymentTerms_TT'){
   $('#within_x_day').prop('readonly', true);
   $('#within_x_day').attr('min',0);
   $('#within_x_day').val("0");
 }
 else {
   $('#within_x_day').prop('readonly', false);
   $('#within_x_day').attr('min',1);
   $('#within_x_day').val("");
 }
}
</script>
@stop