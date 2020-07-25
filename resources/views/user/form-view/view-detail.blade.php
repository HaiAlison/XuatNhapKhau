<form>
  <div class="form-group">
    <div class="col-lg-12 col-md-12">
      <div class="billing-details">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="form-group row">
              <label   class="col-sm-4 col-form-label">PO No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->id}}" disabled="disabled">
              </div>

              <label class="col-sm-4 col-form-label">Sub PO No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->id}}" disabled="disabled">
              </div>

              <label class="col-sm-4 col-form-label">PO date</label>
              <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->po_date}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Sale Contract No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->sale_contract_no}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Invoice No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" value="{{$shipment->invoice_no}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Supplier</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm"  value="{{$order->supplier->supplier}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Origin</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" value="{{$order->origin->origin_name}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Manufacturer</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" value="{{$order->manufacturer->manufacturer_name}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">PO Incoterms</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->incoterm->incoterms}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">POL</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->pols->pod_name}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">POD</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->pods->pod_name}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">BL No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->bl_no}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">BL date</label>
              <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->bl_date}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">ETA</label>
              <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->eta}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Vessel name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->vessel_name}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Carrier</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->carrier}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Shipment status</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->shipmentStatus->shipment_status ?? ''}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Marking</label>
              <div class="col-sm-8">
                <textarea class="form-control form-control-sm" disabled="disabled">{{$order->marking}}</textarea>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Type of Shipment</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->type_of_shipment }}" disabled="disabled">
              </div>

              <label class="col-sm-4 col-form-label">Number Container</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->number_container}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Container size</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->containerSize->container_size ?? ''}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Payload (MT/Cont)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->payload}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">DEM/DET</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->dem_det}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Freight per container</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->freight_per_container}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">DTHC (USD) | (VND)</label>
              <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->dthc}}" disabled="disabled">
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->dthc}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">CIC (USD) | (VND)</label>
              <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->cic}}" disabled="disabled">
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->cic}}" disabled="disabled">
              </div>
              <div class="col-sm-12">
                <ul class="accordion" style="text-align: left;list-style-type: none;padding-left: 0">
                  <li class="accordion-item">
                    <a class="accordion-title"  href="javascript:void(0)"><i class="fa fa-bars"></i>Target</a>
                    <div class="accordion-content show" style="display: none;">
                      <label  class="col-sm-4 col-form-label">Freight target</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$typeOfShipmentDetail->freight_target ?? ''}}" disabled="disabled">
                      </div>
                      <label  class="col-sm-4 col-form-label">DTHC target</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$typeOfShipmentDetail->dthc_target ?? ''}}" disabled="disabled">
                      </div>
                      <label  class="col-sm-4 col-form-label">CIC target</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$typeOfShipmentDetail->cic_target ?? ''}}" disabled="disabled">
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <label class="col-sm-4 col-form-label">Gross Weight (MT)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->gross_weight}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Number of bags</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->number_of_bags}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Freight per MT</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$shipment->freight_per_mt}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">Purchase CFR price</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="Purchase price + Freight per MT" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">End Customer</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->end_customer}}" disabled="disabled">
              </div>

              <label   class="col-sm-4 col-form-label">CO provided</label>
              <div class="col-sm-8">
                <input type="checkbox" class="form-control form-control-sm" name="id" id="poNo" @if($shipment->co_provider == 1) checked @endif disabled="disabled">
              </div>

              <label class="col-sm-4 col-form-label">HS code</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->hs_code}}" disabled="disabled">
              </div>

              <label class="col-sm-4 col-form-label">End Customer</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->end_customer}}" disabled="disabled">
              </div>

              <label class="col-sm-4 col-form-label">Currency|FX</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{$order->currency}}" disabled="disabled">
              </div>
            </div>
          </div>
          <div class="cart-table table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Product name</th>
                  <th scope="col">Packing</th>
                  <th scope="col">Weight unit</th>
                  <th scope="col">Binding</th>
                  <th scope="col">Net Weight (MT)</th>
                  <th scope="col">Price/MT</th>
                  <th scope="col">Total amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach($shipmentDetails as $shipmentDetail)
                <tr>
                  <td>{{$shipmentDetail->product->product}}</td>
                  <td>{{$shipmentDetail->packing->packing}}</td>
                  <td>{{$shipmentDetail->weightUnit->weight_unit}}</td>
                  <td>{{$shipmentDetail->binding->binding}}</td>
                  <td>{{$shipmentDetail->net_weight_id}}</td>
                  <td>{{$shipmentDetail->price}}</td>
                  <td>{{$shipmentDetail->total_amount}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
          <!-- Show error when order or shipment null -->
          @if(session('error')) 
          <div class="alert alert-danger">{{session('error')}} </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</form>