@extends('master.masterpage-admin')
@section('content')
<div id="room" class="col-lg-12 mb-3 pt-3 pb-2">
  <div id="room" class="btn-toolbar mb-2 mb-md-0 float-right">
    <div class="btn-group mr-2">
      <a href="{{route('admin.edit-order',['id'=>$order->id])}}" id="edit" class="btn btn-sm btn-outline-secondary">
        Edit
      </a>
    </div>
    <div class="btn-group mr-2">
      <a href="#" class="btn btn-sm btn-outline-secondary">
        Delete
      </a>
    </div>
  </div>
</div>
<br>
<form>
  @csrf
  <div class="row" id="show-form">
    <div class="col-lg-6 col-md-12">
      <div class="form-group row">
        <label   class="col-sm-4 col-form-label">PO No.</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->id}}" disabled="disabled">
        </div>

        <label class="col-sm-4 col-form-label edit">PO date</label>
        <div class="col-sm-8">
          <input type="date" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->po_date}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Supplier</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit"  value="{{$order->supplier->supplier}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Origin</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" value="{{$order->origin->origin_name}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Manufacturer</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" value="{{$order->manufacturer->manufacturer_name}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">PO Incoterms</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->incoterm->incoterms}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">POL</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->pols->pod_name}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">POD</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->pods->pod_name}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">ETA</label>
        <div class="col-sm-8">
          <input type="date" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->eta}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Marking</label>
        <div class="col-sm-8">
          <textarea class="form-control form-control-sm edit" disabled="disabled">{{$order->marking}}</textarea>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Type of Shipment</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="ship" value="{{$order->type_of_shipment }}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Number of container</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$container->number_container ?? ''}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Container size</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$container->containerSize->container_size ?? ''}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Payload (MT/Cont)</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$container->payload ?? ''}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">Freight target</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$container->freight_target ?? ''}}" disabled="disabled">
        </div>
        <label   class="col-sm-4 col-form-label">DTHC target</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$container->dthc_target ?? ''}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">CIC target</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$container->cic_target ?? ''}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">End Customer</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->end_customer}}" disabled="disabled">
        </div>

        <label   class="col-sm-4 col-form-label">CO</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->certificateOfOrigin->certificate_of_origin}}" disabled="disabled">
        </div>

        <label class="col-sm-4 col-form-label">HS code</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->hs_code}}" disabled="disabled">
        </div>

        <label class="col-sm-4 col-form-label">End Customer</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->end_customer}}" disabled="disabled">
        </div>

        <label class="col-sm-4 col-form-label">Currency|FX</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm edit" name="id" id="poNo" value="{{$order->currency}}" disabled="disabled">
        </div>
      </div>
    </div>
  </div>



</form>
@stop
