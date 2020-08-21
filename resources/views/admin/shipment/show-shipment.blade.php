@extends('master.masterpage-admin')
@section('content')
<div id="room" class="col-lg-12 mb-3 pt-3 pb-2">
    <div id="room" class="btn-toolbar mb-2 mb-md-0 float-right">
        <div class="btn-group mr-2">
            <a href="{{route('admin.edit-shipment',['po_no_id'=>$shipments->po_no_id,'id' => $shipments->id])}}" id="edit"
                class="btn btn-sm btn-outline-secondary">
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
                <label for="PO_No." class="col-sm-4 col-form-label">PO No.</label>
                <div class="col-sm-8">
                    <input type="text" name="po_no_id" id="po_no_id" class="form-control form-control-sm" placeholder="" value="{{$shipments->po_no_id}}"> 
                </div>
                <label class="col-sm-4 col-form-label" for="Sub_PO_No.">Sub PO No.</label>
                <div class="col-sm-8">
                    <input type="hidden" class="form-control form-control-sm " value="{{auth()->user()->id}}"
                        name="user_id">
                    <input type="text" name="sub_po_id" id="sub_po_id" class="form-control form-control-sm"
                        placeholder="" value="{{$shipments->sub_po_id}}"> 
                </div>
                <label class="col-sm-4 col-form-label" for="SeleContractNo">Sale Contract No</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="sale_contract_no" id="sale_contract_no"  value="{{$shipments->sale_contract_no}}" placeholder=""  >
                </div>
                <label class="col-sm-4 col-form-label" for="InvoiceNo">Invoice No.</label>
                <div class="col-sm-8">
                    <input type="text" id="invoice_no" class="form-control form-control-sm" name="invoice_no" value="{{$shipments->invoice_no}}"
                        placeholder="">
                </div>
                <label class="col-sm-4 col-form-label" for="BLNO">BL No</label>
                <div class="col-sm-8">
                    <input type="text" name="bl_no" class="form-control form-control-sm" id="bl_no" placeholder="" value="{{$shipments->bl_no}}">
                </div>
                <label class="col-sm-4 col-form-label" for="BLDate">BL date</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control form-control-sm" name="bl_date" id="bl_date" placeholder="" value="{{$shipments->bl_date}}">
                </div>
                <label class="col-sm-4 col-form-label" for="ETA">ETA</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control form-control-sm" name="eta" id="eta" placeholder="" value="{{$shipments->eta}}">
                </div>
                <label class="col-sm-4 col-form-label" for="VesselName">Vessel name</label>
                <div class="col-sm-8">
                    <input type="text" name="vessel_name" class="form-control form-control-sm" id="vessel_name" value="{{$shipments->vessel_name}}"
                        placeholder="">
                </div>
                <label class="col-sm-4 col-form-label" for="Carrier">Carrier</label>
                <div class="col-sm-8">
                    <input type="text" name="carrier" class="form-control form-control-sm" id="carrier" placeholder="" value="{{$shipments->carrier}}">
                </div>
                <label class="col-sm-4 col-form-label" for="ShipmentStatus">Shipment status</label>
                <div class="col-sm-8">
                    <select name="shipment_status_id" class="form-control form-control-sm" id="shipment_status_id">
                        @if(isset($shipmentStatus))
                        @foreach($shipmentStatus as $pod)
                        <option @if($pod->id==$shipments->shipment_status_id) selectted @endif value="{{$pod->id}}">{{$pod->shipment_status}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <label class="text-primary col-sm-4 col-form-label" for="Incoterms">Incoterms</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="incoterms_id" placeholder=""
                        @if(isset($incotermList))
                         @foreach($incotermList as $incoterm) 
                         @if($shipments->incoterms_id==$incoterm->id)
                    value="{{$incoterm->incoterms}}"
                    @endif
                    @endforeach
                    @endif readonly />
                    <input type="hidden" name="incoterms_id" id="incoterms_id" placeholder="" @if(isset($incotermList))
                        @foreach($incotermList as $incoterm) @if(isset($shipments)&& $shipments->incoterms_id==$incoterm->id)
                    value="{{$incoterm->id}}"
                    @endif
                    @endforeach
                    @endif readonly />
                </div>

                <label class=" col-sm-4 col-form-label" style="color: red;" for="POD">POD</label>
                <div class="col-sm-8">
                    <!-- <input type="text" name="pod" id="pod" placeholder="" @if(isset($order)) value="{{$order->pod}}" -->
                    <!-- @endif> -->
                    <select type="text" class="form-control form-control-sm selectpicker select" name="pod" id="pod">
                        @if(isset($podList))
                        @foreach($podList as $pod)
                        <option @if(isset($shipments) && $pod->id == $shipments->pod) selected="selected"
                            @endif value="{{$pod->id}}">{{$pod->pod_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group row">
                <label class="text-primary col-sm-4 col-form-label" for="typeofshipment">Type of
                    shipment</label>
                <div class="col-sm-8">
                    <input name="type_of_shipment" class="form-control form-control-sm" id="type_of_shipment"
                        @if(isset($shipments)) value="{{$shipments->type_of_shipment}}" readonly="readonly" @endif>
                </div>
                <label class=" col-sm-4 col-form-label" style="color: red;" for="Number_Container">Number
                    Container</label>
                <div class="col-sm-8">
                    <input type="text" id="number_container" class="form-control form-control-sm"
                        name="number_container" @if(isset($type)) value="{{$type->number_container}}" @else
                        disabled="disabled" @endif placeholder="">
                </div>
                <label class="col-sm-4 col-form-label" for="ContainerSize">Container size</label>
                <div class="col-sm-8">
                  
                    <select @if(!isset($type)) disabled="disabled" @endif class="form-control form-control-sm"
                        name="container_size" id="container_size">
                        @if(isset($containerSizesList))
                        @foreach($containerSizesList as $container_size)
                        <option @if(isset($type) && $container_size->id == $type->container_size_id)
                            selected="selected"
                            @endif
                            value="{{$container_size->id}}">
                            {{$container_size->container_size}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <label class=" col-sm-4 col-form-label" style="color: red;" for="Payload">Payload
                    (MT/Cont)</label>
                <div class="col-sm-8">
                    <input type="text" name="payload" class="form-control form-control-sm" id="payload"
                        @if(isset($type)) value="{{$type->payload}}" @else disabled="disabled" @endif placeholder="">
                </div>
                <label class="col-sm-4 col-form-label" for="DEM_DET">DEM/DET</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="dem_det" id="dem_det" placeholder="" value="{{$shipments->dem_det}}">
                </div>
                <label class="col-sm-4 col-form-label" for="Freightpercontainer">Freight per
                    container</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="freight_per_container"
                        id="freight_per_container" placeholder="" value="{{$shipments->freight_per_container}}">
                </div>
                <label class="col-sm-4 col-form-label" for="DTHCUSD">DTHC (USD) | (VND)</label>
                <div class="col-sm-8">
                    <input type="text" style="width: 49%" name="dthc" id="dthc" placeholder="" value="{{$shipments->dthc}}">
                    <input type="text" style="width: 49%" name="dTHC_VND" id="dTHC_VND" placeholder="">
                </div>
                <label class="col-sm-4 col-form-label" for="CIC_USD">CIC (USD) | (VND)</label>
                <div class="col-sm-8">
                    <input type="text" style="width: 49%" name="cic" id="cic" placeholder="" value="{{$shipments->cic}}">
                    <input type="text" style="width: 49%" name="cIC_VND" id="cIC_VND" placeholder="">
                </div>
                <label class="col-sm-4 col-form-label" for="FreightperMT">Freight per MT</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="freight_per_mt" id="freight_per_mt"
                        placeholder="" value="{{$shipments->freight_per_mt}}">
                </div>
                <label class="col-sm-4 col-form-label" for="Numberofbags">Number of bags</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="number_of_bags" id="number_of_bags"
                        placeholder=""  value="{{$shipments->number_of_bags}}">
                </div>
                <label class="col-sm-4 col-form-label" for="GrossWeight">Gross Weight (MT)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="gross_weight" id="gross_weight" value="{{$shipments->gross_weight}}"
                        placeholder="">
                </div>
                <label class="col-sm-4 col-form-label" for="CurrencyFX">Currency|FX</label>
                <div class="col-sm-8">
                    <input type="text" name="currency" class="form-control form-control-sm" id="currency"
                        placeholder="" value="{{$shipments->currency}}">
                </div>
                <input type="checkbox" style="width: 5vh" id="co_provider" name="co_provider" />
                <label class="col-sm-4 col-form-label" for="checked"><span class=" text-nowrap">ICO
                        provided</span></label>
            </div>
        </div>
    </div>



</form>
@stop