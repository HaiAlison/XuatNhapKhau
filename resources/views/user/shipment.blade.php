@extends('master.masterpage', ['title' => 'Shipment'])

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/css.css') }}">
@endsection
@section('content')
<section class="checkout-area ptb-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="user-actions">
          <i data-feather="edit"></i>
          <span>Please complete the form</span>
        </div>
      </div>
    </div>
    <form  action="{{ route('user.store-shipment') }} " method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <div class="col-lg-12 col-md-12">
          <div class="billing-details">
            <h3 class="title">Shipment</h3>
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="form-group row">
                  <label for="PO_No." class="col-sm-4 col-form-label">PO No.</label>
                  <div class="col-sm-8 dropdown">
                    <!-- <button id='orderId' style="text" value="btn">@if(isset($order)){{$order->id}} @endif</button> -->
                    <input id='po_no_id' name="po_no_id" class="form-control form-control-sm" style="button"
                    value="@if(isset($order)){{$order->id}} @endif" />
                    @if(isset($orderList))
                    <div class="dropdown-content">
                      @foreach($orderList as $orders)
                      <a href="{{route('user.shipment_id',['id'=> $orders->id])}}">{{$orders->id}}</a>
                      @endforeach
                    </div>
                     <!--  <select class="form-control form-control-sm po_no">
                        @foreach($orderList as $orders)
                        <option value="{{route('user.shipment_id',['id'=> $orders->id])}}">{{$orders->id}}</option>
                        @endforeach
                      </select> -->
                      @endif
                    </div>

                    <label class="col-sm-4 col-form-label" for="Sub_PO_No.">Sub PO No.</label>
                    <div class="col-sm-8">
                      <input type="text" name="sub_po_id" id="sub_po_id" class="form-control form-control-sm" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="SeleContractNo">Sale Contract No</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="sale_contract_no" id="sale_contract_no" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="InvoiceNo">Invoice No.</label>
                    <div class="col-sm-8">
                      <input type="text" id="invoice_no" class="form-control form-control-sm" name="invoice_no" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="BLNO">BL No</label>
                    <div class="col-sm-8">
                      <input type="text" name="bl_no" class="form-control form-control-sm" id="bl_no" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="BLDate">BL date</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control form-control-sm" name="bl_date" id="bl_date" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="ETA">ETA</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control form-control-sm" name="eta" id="eta" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="VesselName">Vessel name</label>
                    <div class="col-sm-8">
                      <input type="text" name="vessel_name" class="form-control form-control-sm" id="vessel_name" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="Carrier">Carrier</label>
                    <div class="col-sm-8">
                      <input type="text" name="carrier" class="form-control form-control-sm" id="carrier" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="ShipmentStatus">Shipment status</label>
                    <div class="col-sm-8">
                      <input type="text" name="shipment_status_id" class="form-control form-control-sm" id="shipment_status_id" placeholder="">
                    </div>

                    <label class="text-primary col-sm-4 col-form-label" for="Incoterms">Incoterms</label>
                    <div class="col-sm-8">
                      <input type="text" name="incoterms_id" class="form-control form-control-sm" id="incoterms_id" placeholder="" 
                      @if(isset($incotermList))
                      @foreach($incotermList as $incoterm)
                      @if(isset($order)&& $order->incoterm_id==$incoterm->id)
                      value="{{$incoterm->incoterms}}" 
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
                        <option @if(isset($order) && $pod->id == $order->pod) selected="selected" @endif value="{{$pod->id}}">{{$pod->pod_name}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group row">
                    <label class="text-primary col-sm-4 col-form-label" for="typeofshipment">Type of shipment</label>
                    <div class="col-sm-8">
                      <input name="type_of_shipment" class="form-control form-control-sm" id="type_of_shipment" @if(isset($order)) value="{{$order->type_of_shipment}}" readonly="readonly" @endif>
                    </div>
                    <label class=" col-sm-4 col-form-label" style="color: red;" for="Number_Container">Number Container</label>
                    <div class="col-sm-8">
                      <input type="text" id="number_container" class="form-control form-control-sm" name="number_container" @if(isset($type))
                      value="{{$type->number_container}}" @else disabled="disabled" @endif placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="ContainerSize">Container size</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" id="container_size" name="container_size" placeholder="" @if(isset($size)) value="{{$size->container_size}}" @else disabled="disabled" @endif> -->
                      <select  @if(!isset($type)) disabled="disabled" @endif class="form-control form-control-sm" name="container_size" id="container_size">
                        @if(isset($containerSizesList))
                        @foreach($containerSizesList as $container_size)
                        <option @if(isset($type) && $container_size->id == $type->container_size_id) selected="selected"
                          @endif
                          value="{{$container_size->id}}">
                          {{$container_size->container_size}}
                        </option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                    <label class=" col-sm-4 col-form-label" style="color: red;" for="Payload">Payload (MT/Cont)</label>
                    <div class="col-sm-8">
                      <input type="text" name="payload" class="form-control form-control-sm" id="payload" @if(isset($type)) value="{{$type->payload}}" @else
                      disabled="disabled" @endif placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="DEM_DET">DEM/DET</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="dem_det" id="dem_det" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="Freightpercontainer">Freight per container</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="freight_per_container" id="freight_per_container" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="DTHCUSD">DTHC (USD) | (VND)</label>
                    <div class="col-sm-8">
                      <input type="text" style="width: 49%" name="dthc" id="dthc" placeholder="">
                      <input type="text" style="width: 49%" name="dTHC_VND" id="dTHC_VND" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="CIC_USD">CIC (USD) | (VND)</label>
                    <div class="col-sm-8">
                      <input type="text" style="width: 49%" name="cic" id="cic" placeholder="">
                      <input type="text" style="width: 49%" name="cIC_VND" id="cIC_VND" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="FreightperMT">Freight per MT</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="freight_per_mt" id="freight_per_mt" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="Numberofbags">Number of bags</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="number_of_bags" id="number_of_bags" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="GrossWeight">Gross Weight (MT)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="gross_weight" id="gross_weight" placeholder="">
                    </div>
                    <label class="col-sm-4 col-form-label" for="CurrencyFX">Currency|FX</label>
                    <div class="col-sm-8">
                      <input type="text" name="currency" class="form-control form-control-sm" id="currency" placeholder="">
                    </div>
                    <input type="checkbox" style="width: 5vh" id="co_provider" name="co_provider" />
                    <label class="col-sm-4 col-form-label" for="checked"><span class=" text-nowrap">ICO provided</span></label>
                  </div>
                </div>
              </div>
            </div>
            <!--EndShipment-->
<br>
            <!-- Shipmen Detail -->
            <div class="billing-details">
              <h3 class="title">Order details</h3>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <form>
                    <div class="cart-table table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Packing</th>
                            <th scope="col">Weight unit</th>
                            <th scope="col">Binding</th>
                            <th scope="col">Net Weight (MT)</th>
                            <th scope="col">Price/MT</th>
                            <th scope="col">Total amount</th>
                          </tr>
                        </thead>
                        <tbody id="form_shipment_detail">
                          <tr>
                            <td class="product-thumbnail">
                              <select type="text" class="selectpicker" onchange="Shipmentdetail()" id="product_code_id"
                              name="product_code_id[]">
                                <option value="" selected="selected" hidden></option>
                                @if(isset($productList))
                                @foreach($productList as $product)
                                <option value="{{$product->product_code_id}}">{{$product->product_code_id}}</option>
                                @endforeach
                                @endif
                              </select>
                            </td>
                            <td class="product-name">
                              <div class="col-sm-12">
                                <input type="text" id="product" name="product[]" disabled="disabled" class="form-control form-control-md" readonly placeholder="" />
                              </div>
                            </td>
                            <td class="product-name">
                              <div class="col-sm-12">
                                <input type="text" name="packing_id[]" id="packing_id" class="form-control form-control-md" disabled="disabled" readonly placeholder="" />
                              </div>
                            </td>
                            <td class="product-name">
                              <div class="col-sm-12">
                                <input type="text" name="weight_unit_id[]"  id="weight_unit_id" class="form-control form-control-md" disabled="disabled" readonly placeholder="">
                              </div>
                            </td>
                            <td class="product-name">
                              <div class="col-sm-12">
                                <input type="text" id="binding_id" name="binding_id[]" class="form-control form-control-md" disabled="disabled" readonly placeholder="">
                              </div>
                            </td>
                            <td class="product-name">
                              <div class="col-sm-12">
                                <input type="text" id="net_weight_id" name="net_weight_id[]" class="form-control form-control-md" disabled="disabled" placeholder="">
                              </div>
                            </td>
                            <td class="product-name">
                              <div class="col-sm-12">
                                <input type="text" id="price" name="price[]" disabled="disabled" class="form-control form-control-md" placeholder="" />
                              </div>
                            </td>
                            <td class="product-name">
                              <div class="col-sm-12">
                                <input type="text" id="total_amount" name="total_amount[]" class="form-control form-control-md" disabled="disabled" placeholder="" onkeydown=" CheckKeyTab()">
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <!--end ShipmentDetil-->
          <hr>
          <button type="submit" onclick="KT_check()" class="btn btn-primary btn-user btn-block">
            Update
          </button>
        </div>
      </form>
    </div>
  </section>
  @endsection

  @section('script')

  <script type="text/javascript">
    var identitiId = 0;
// window.addEventListener("keydown", CheckKeyTab, false);
function CheckKeyTab() {

  if (event.which == '9') {
    identitiId++;
    var table = $('#form_shipment_detail');
    table.append('<hr/>\
      <div class="form-group row">\
      <div class="col-1 title">\
      <select type="text" class="selectpicker changeId" onchange="Shipmentdetail()" id="product_code_id0" name="product_code_id[]">\
      <option value="" selected="selected" hidden ></option>\
      @if(isset($productList))\
      @foreach($productList as $product)\
      <option value="{{$product->product_code_id}}">{{$product->product_code_id}}</option>\
      @endforeach\
      @endif\
      </select>\
      </div>\
      <div class="col-2 title">\
      <input type="text" id="product0" name="product[]" class="changeId"   disabled="disabled" readonly placeholder=""/>\
      </div>\
      <div class="col-2 title">\
      <input type="text" class="changeId" name="packing_id[]"  id="packing_id0" disabled="disabled" readonly placeholder=""/>\
      </div>\
      <div class="col-2 title">\
      <input type="text" class="changeId" id="weight_unit_id0" name="weight_unit_id[]"disabled="disabled" readonly placeholder="">\
      </div>\
      <div class="col-1 title">\
      <input type="text" class="changeId" name="binding_id[]"  id="binding_id0" disabled="disabled" readonly placeholder="">\
      </div>\
      <div class="col-2 title">\
      <input type="text" class="changeId"  id="net_weight_id0" name="net_weight_id[]" disabled="disabled" placeholder="">\
      </div>\
      <div class="col-1 title">\
      <input type="text"  id="price0" name="price[]" class="changeId"  disabled="disabled" placeholder=""\
      />\
      </div>\
      <div class="col-1 title">\
      <input type="text"  id="total_amount0" name="total_amount[]" class="changeId" disabled="disabled" placeholder="" onkeydown=" CheckKeyTab()">\
      </div>\
      </div>')
  }
  $('#form_shipment_detail').find('.changeId').each(function() {
    var id = $(this).attr('id') || null;
    var i = id.substr(id.length - 1);
    var prefix = id.substr(0, id.length - 1);
    $(this).attr('id', prefix + (+i + 1));
    console.log(id);
  })
}

function idProductNull() {

  if (identitiId > 0) {
    for (var i = 1; i < identitiId + 1; i++) {
      console.log($("#product_code_id" + i).children('option:selected').val());
      if ($('#product_code_id' + i).children('option:selected').val() != "") {
        $('#product' + i).removeAttr('disabled', 'disabled');
        $('#packing_id' + i).removeAttr('disabled', 'disabled');
        $('#weight_unit_id' + i).removeAttr('disabled', 'disabled');
        $('#binding_id' + i).removeAttr('disabled', 'disabled');
        $('#net_weight_id' + i).removeAttr('disabled');
        $('#price' + i).removeAttr('disabled');
        $('#total_amount' + i).removeAttr('disabled');
      }
    }
  } else {

    if ($('#product_code_id').children('option:selected').val() != "") {

      $('#product').removeAttr('disabled', 'disabled');
      $('#packing_id').removeAttr('disabled', 'disabled');
      $('#weight_unit_id').removeAttr('disabled', 'disabled');
      $('#binding_id').removeAttr('disabled', 'disabled');
      $('#net_weight_id').removeAttr('disabled');
      $('#price').removeAttr('disabled');
      $('#total_amount').removeAttr('disabled');

    }


  }

}
$(".po_no").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
    alert(window.location.href);
  }
  //set isopen to opposite so next time when use clicked select box
  //it wont trigger this event
  $(this).data("isopen", !open);
});
function selectShipmentDetail() {
  <?php
  if (isset($productList)) ?>
    var shipment_pro = <?php
  if (isset($productList)) echo $productList;
  else echo null; ?> ;
  console.log(shipment_pro);
  if (shipment_pro != null) {
    shipment_pro.forEach(function(product, index) {
      if (identitiId < 1) {

        if ($('#product_code_id').children('option:selected').val() === product.product_code_id) {
          document.getElementById("product").value = product.product_code_id;
          document.getElementById("packing_id").value = product.packing_id;
          document.getElementById("weight_unit_id").value = product.weight_unit_id;
          document.getElementById("binding_id").value = product.binding_id;
          return;
        }
      }

      for (var i = 1; i <= identitiId; i++) {

        if ($('#product_code_id' + i).children('option:selected').val() === product.product_code_id) {

          document.getElementById("product" + i).value = product.product_code_id;
          document.getElementById("packing_id" + i).value = product.packing_id;
          document.getElementById("weight_unit_id" + i).value = product.weight_unit_id;
          document.getElementById("binding_id" + i).value = product.binding_id;
          return;
        }
      }
    })
  }
}

function Shipmentdetail() {
  idProductNull();
  selectShipmentDetail();
}

function KT_check() {
  if ($('#co_provider').attr('checked', true)) {
    $('#co_provider').val(1);
  } else {
    $('#co_provider').val(0);
  }
  console.log($('#co_provider').val());
}

$('.date').datetimepicker({
  format: 'YYYY-MM-DD'
});
</script>
@endsection