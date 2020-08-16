@if(isset($editPaymentLocal))
<form action="{{ route('user.update-payment-local',['po_no'=> $editPaymentLocal->po_no_id,'sub_po' => $editPaymentLocal->sub_po_no_id,'type_service' => $editPaymentLocal->type_of_service]) }}"  method="post">
  @else
  <form action="{{ route('user.store-payment-local') }}" class="frm" method="post">
    @endif
    @csrf
    <div class="form-group">
      <div class="col-lg-12 col-md-12">
        <div class="billing-details">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="form-group row">
                <label   class="col-sm-4 col-form-label">PO No.</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="po_no_id" id="poNo" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->po_no_id}}" @else value="{{$purchaseOrder->id}}" @endif readonly="true">
                  <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                </div>
                <label   class="col-sm-4 col-form-label">Sub PO No.</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="sub_po_no_id" id="poNo" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->sub_po_no_id}}" @else value="{{$inputDetail->id }}" @endif readonly>
                </div>

                <label   class="col-sm-4 col-form-label">PO date</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control form-control-sm" name="po_date" id="poNo" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->po_date}}" @else value="{{$purchaseOrder->po_date}}" @endif readonly>
                </div>

                <label class="col-sm-4 col-form-label">Type of Service</label>
                <div class="col-sm-8">
                  @if(isset($editPaymentLocal))
                  <input type="text" name="type_of_service" id="inputTypeService" class="form-control form-control-sm" value="{{$editPaymentLocal->type_of_service}}" readonly>
                  @else
                  <select class="form-control form-control-sm"  id="type_of_service"  name="type_of_service">
                    <option selected disabled>Choose a service</option>
                    <option value="tax">Tax</option>
                    <option  value="localCharge">Local Charge</option>
                  </select>
                  @endif
                </div>

                <label class="col-sm-4 col-form-label">Tax level</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control form-control-sm" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->tax_level}}" disabled="false" @endif name="tax_level" id="taxLevel" disabled>
                </div>

                <label   class="col-sm-4 col-form-label">Item name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->product->product}}" @else value="{{$shipmentDetail->product->product}}" @endif readonly>
                  <input type="hidden" name="item_name" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->item_name}}" @else  value="{{$shipmentDetail->product->id}}" @endif>

                </div>

                <label   class="col-sm-4 col-form-label">Item Origin</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->origin->origin_name}}" @else  value="{{$purchaseOrder->origin->origin_name}}" @endif readonly>
                  <input type="hidden" name="item_origin" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->item_origin}}" @else  value="{{$purchaseOrder->origin->id}}" @endif>

                </div>

                <label   class="col-sm-4 col-form-label">QTY</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="qty" id="qty" @if(isset($editPaymentLocal))
                  value="{{$editPaymentLocal->qty}}" @else value="675" @endif readonly>
                </div>

                <label   class="col-sm-4 col-form-label">Unit Price ($)</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="unit_price" id="unitPrice" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->unit_price}}" @else value="82" @endif readonly>
                </div>

                <label   class="col-sm-4 col-form-label">Incoterms</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm"  id="incoterms_id" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->incoterm->incoterms}}" @else  value="{{$purchaseOrder->incoterm->incoterms}}" @endif readonly>
                  <input type="hidden" name="incoterms_id" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->incoterms_id}}" @else  value="{{$purchaseOrder->incoterm->id}}" @endif>
                </div>

                <label class="col-sm-4 col-form-label">Freight</label>
                <div class="col-sm-8">

                  @if(isset($inputDetail))
                  <?php 
                  $conts = $inputDetail->freight_per_container ?? 0;
                  $mt = $inputDetail->freight_per_mt ?? 1;
                  $freight = $conts/$mt;
                  ?>
                  @endif
                  <input type="text" class="form-control form-control-sm" name="freight" id="poNo" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->freight}}" @else value="{{$freight}}" @endif readonly>
                </div>

                <label   class="col-sm-4 col-form-label">POL</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm"  @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->pols->pod_name}}" @else value="{{$purchaseOrder->pols->pod_name}}" @endif readonly>
                  <input type="hidden" name="pol" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->pol}}" @else value="{{$purchaseOrder->pol}}" @endif >
                </div>

                <label   class="col-sm-4 col-form-label">Ship</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="ship" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->ship}}"  @else   value="{{ $purchaseOrder->type_of_shipment }}" @endif readonly>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group row">
                <label   class="col-sm-4 col-form-label"># CONT</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" name="cont" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->cont}}"  @else value="25" @endif id="cont"  readonly="true">
                </div>

                <label   class="col-sm-4 col-form-label">DOCS</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm local" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->docs}}"  @endif name="docs" id="docs" disabled >
                </div>

                <label   class="col-sm-4 col-form-label">DTHC</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm local" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->dthc}}"  @else value="25" @endif  name="dthc" id="dthc" disabled>
                </div>

                <label   class="col-sm-4 col-form-label">CIC</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm local" name="cic" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->cic}}"  @else value="25" @endif id="cic" disabled>
                </div>

                <label   class="col-sm-4 col-form-label">Cleaning</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm local" name="cleaning" id="cleaning" disabled>
                </div>

                <label   class="col-sm-4 col-form-label local">Others</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm local" name="other" id="other" disabled>
                </div>

                <label   class="col-sm-4 col-form-label">BL Date</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control form-control-sm" name="bl_date" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->bl_date}}" @else  value="{{$inputDetail->bl_date}}" @endif readonly="true">
                </div>
                <?php 
                if(isset($inputDetail)){
                  $etaDay = $inputDetail->eta;
                  $dueDate = date_create($etaDay)->modify('-1 days')->format('Y-m-d');
                }
                ?>
                <label class="col-sm-4 col-form-label">ETA</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control form-control-sm" name="eta" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->eta}}" @else  value="{{$etaDay}}" @endif readonly>
                </div>

                <label class="col-sm-4 col-form-label">Amount</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->amount}}" @endif name="amount" id="amount" readonly>
                </div>

                <label class="col-sm-4 col-form-label">Due date</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control form-control-sm" name="due_date" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->due_date}}" @else value="{{$dueDate}}" @endif readonly>
                </div>

                <label class="col-sm-4 col-form-label">Week</label>
                <div class="col-sm-8">
                  <?php
                  if(isset($inputDetail)){
                    $week = date_create($dueDate)->format("W"); }?>
                    <input type="text" class="form-control form-control-sm" name="week" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->week}}" @else value="{{ $week }}" @endif readonly>
                  </div>

                  <label   class="col-sm-4 col-form-label">PR No.</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->pr_no}}" @endif name="pr_no">
                  </div>

                  <label   class="col-sm-4 col-form-label">PR date</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control form-control-sm" @if(isset($editPaymentLocal)) value="{{$editPaymentLocal->pr_date}}" @endif name="pr_date">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <button class=" col-md-12 btn btn-primary payment-local-btn" @if(isset($editPaymentLocal)) id="edit" @else id="create" @endif type="submit" >@if(isset($editPaymentLocal)) Edit @else Create @endif</button>
            </div>
          </div>
        </div>
      </div>
    </form>
