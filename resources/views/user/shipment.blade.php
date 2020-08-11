<<<<<<< Updated upstream
<!DOCTYPE html>

<html>

<head>

  <title>Laravel Bootstrap Timepicker</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  

</head>

<body>

<div class="container">

    <h1>Laravel Bootstrap Timepicker</h1>

    <div style="position: relative">

      <strong>Timepicker:</strong>

      <input class="date form-control" type="text">

    </div>

</div>

<script type="text/javascript">

    $('.date').datetimepicker({

        format: 'DD/MM/YYYY'

    }); 

</script>  

</body>

</html>
=======
@extends('master.masterpage', ['title' => 'Shipment'])

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/css.css') }}">
@endsection
@section('content')
<form class='col-12' action="{{ route('user.store-shipment') }} " method="post" enctype="multipart/form-data">
    @csrf
    <div class='shipment row col-10'>
        <div class="title_shipment col-12">
            <h5>Shipment</h5>
        </div>
        <div class="col-5 left">
            <div class="row">
                <div class="col-5">
                    <label for="PO_No.">PO No.</label>
                </div>
                <div class="custom-file col-7">
                    <div class="dropdown">
                        <!-- <button id='orderId' style="text" value="btn">@if(isset($order)){{$order->id}} @endif</button> -->
                        <input id='po_no_id' name="po_no_id" style="button"
                            value="@if(isset($order)){{$order->id}} @endif" />
                        @if(isset($orderList))
                        <div class="dropdown-content">
                            @foreach($orderList as $orders)
                            <a href="{{route('user.shipment_id',['id'=> $orders->id])}}">{{$orders->id}}</a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="Sub_PO_No.">Sub PO No.</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="sub_po_id" id="sub_po_id" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="SeleContractNo">Sale Contract No</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="sale_contract_no" id="sale_contract_no" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="InvoiceNo">Invoice No.</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" id="invoice_no" name="invoice_no" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    <label for="BLNO">BL No</label>
                </div>
                <div class="col-7">
                    <input type="text" name="bl_no" id="bl_no" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="BLDate">BL date</label>
                </div>
                <div class="custom-file col-7">
                    <input type="date" class="date" name="bl_date" id="bl_date" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="ETA">ETA</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" class="date" name="eta" id="eta" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="VesselName">Vessel name</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="vessel_name" id="vessel_name" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label c for="Carrier">Carrier</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="carrier" id="carrier" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="ShipmentStatus">Shipment status</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="shipment_status_id" id="shipment_status_id" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label class="text-primary" for="Incoterms">Incoterms</label>
                </div>
                <div class="custom-file col-7">
                    
                    <input type="text" name="incoterms_id" id="incoterms_id" placeholder="" 
                    @if(isset($incotermList))
                    @foreach($incotermList as $incoterm)
                    @if(isset($order)&& $order->incoterm_id==$incoterm->id)
                        value="{{$incoterm->incoterms}}" 
                    @endif
                    @endforeach
                    @endif
                        readonly>
                   
                </div>
            </div>
            <div class="row">

                <div class="col-5">
                    <label class="text-danger" for="POD">POD</label>
                </div>
                <div class="custom-file col-7">
                    <!-- <input type="text" name="pod" id="pod" placeholder="" @if(isset($order)) value="{{$order->pod}}"
                        @endif> -->
                    <select type="text" class="selectpicker select" name="pod" id="pod">
                        @if(isset($podList))
                        @foreach($podList as $pod)
                        <option @if(isset($order) && $pod->id == $order->pod) selected="selected" @endif
                            value="{{$pod->id}}">{{$pod->pod_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

            </div>
        </div>

        <div class="col-5 right">
            <div class="row">
                <div class="col-5">
                    <label class="text-primary" for="typeofshipment">Type of shipment</label>
                </div>
                <div class="custom-file col-7">
                    <input name="type_of_shipment" id="type_of_shipment" @if(isset($order))
                        value="{{$order->type_of_shipment}}" readonly="readonly" @endif>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    <label class="text-danger" for="Number_Container">Number Container</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" id="number_container" name="number_container" @if(isset($type))
                        value="{{$type->number_container}}" @else disabled="disabled" @endif placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="ContainerSize">Container size</label>
                </div>
                <div class="custom-file col-7">
                    <!-- <input type="text" id="container_size" name="container_size" placeholder="" @if(isset($size))
                        value="{{$size->container_size}}" @else disabled="disabled" @endif> -->
                    <select type="text" @if(!isset($type)) disabled="disabled" @endif class="selectpicker select"
                        name="container_size" id="container_size">
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
            </div>

            <div class="row">
                <div class="col-5">
                    <label class="text-danger" for="Payload">Payload (MT/Cont)</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="payload" id="payload" @if(isset($type)) value="{{$type->payload}}" @else
                        disabled="disabled" @endif placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="DEM_DET">DEM/DET</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="dem_det" id="dem_det" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="Freightpercontainer">Freight per container</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="freight_per_container" id="freight_per_container" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="DTHCUSD">DTHC (USD) | (VND)</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" style="width: 49%" name="dthc" id="dthc" placeholder="">
                    <input type="text" style="width: 49%" name="dTHC_VND" id="dTHC_VND" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="CIC_USD">CIC (USD) | (VND)</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" style="width: 49%" name="cic" id="cic" placeholder="">
                    <input type="text" style="width: 49%" name="cIC_VND" id="cIC_VND" placeholder="">
                </div>

            </div>
            <div class="row">
                <div class="col-5">
                    <label for="FreightperMT">Freight per MT</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="freight_per_mt" id="freight_per_mt" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="Numberofbags">Number of bags</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="number_of_bags" id="number_of_bags" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="GrossWeight">Gross Weight (MT)</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="gross_weight" id="gross_weight" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="CurrencyFX">Currency|FX</label>
                </div>
                <div class="custom-file col-7">
                    <input type="text" name="currency" id="currency" placeholder="">
                </div>
            </div>
            <div class="row">

                <input type="checkbox" style="width: 5vh" id="co_provider" name="co_provider" />
                <label for="checked"><span class=" text-nowrap">ICO provided</span></label>
            </div>
        </div>
    </div>
    <!--EndShipment-->

    <!-- Shipmen Detail -->
    <div class="shipment_detail col-12 ">
        <div class="card-header " style="text-align: center;">
            <h5>Shipment Detail</h5>
        </div>
        <div class="row">
            <div class="col-1 title">
                <label for="ProductCode">Product code</label>
            </div>
            <div class="col-2 ">
                <label class="text-primary" for="ProductName">Product name</label>
            </div>
            <div class="col-2 title">
                <label class="text-primary" for="Packing">Qty/Bag>Packing</label>
            </div>
            <div class="col-2 title">
                <label class="text-primary" for="Weightunit ">Weight unit</label>
            </div>
            <div class="col-1 title">
                <label class="text-primary" for="Binding">Binding</label>
            </div>
            <div class="col-2 title">
                <label for="Netweight ">Net weight (MT)</label>
            </div>
            <div class="col-1 title">
                <label for="Price">Price/MT</label>
            </div>
            <div class="col-1 title">
                <label for="TotalAmount">Total amount</label>
            </div>
        </div>
        <div class="col-12" id="form_shipment_detail">
            <hr />
            <div class="form-group row">
                <div class="col-1 title">
                    <select type="text" class="selectpicker" onchange="Shipmentdetail()" id="product_code_id"
                        name="product_code_id[]">
                        <option value="" selected="selected" hidden></option>
                        @if(isset($productList))
                        @foreach($productList as $product)
                        <option value="{{$product->product_code_id}}">{{$product->product_code_id}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-2 title">
                    <input type="text" id="product" name="product[]" disabled="disabled" readonly placeholder="" />
                </div>
                <div class="col-2 title">
                    <input type="text" name="packing_id[]" id="packing_id" disabled="disabled" readonly
                        placeholder="" />
                </div>
                <div class="col-2 title">

                    <input type="text" name="weight_unit_id[]" id="weight_unit_id" disabled="disabled" readonly
                        placeholder="">
                </div>
                <div class="col-1 title">
                    <input type="text" id="binding_id" name="binding_id[]" disabled="disabled" readonly placeholder="">
                </div>
                <div class="col-2 title">
                    <input type="text" id="net_weight_id" name="net_weight_id[]" disabled="disabled" placeholder="">
                </div>
                <div class="col-1 title">
                    <input type="text" id="price" name="price[]" disabled="disabled" placeholder="" />
                </div>
                <div class="col-1 title">
                    <input type="text" id="total_amount" name="total_amount[]" disabled="disabled" placeholder=""
                        onkeydown=" CheckKeyTab()">
                </div>
            </div>


        </div>
    </div>
    <!--end ShipmentDetil-->
    <hr>
    <button type="submit" onclick="KT_check()" class="btn btn-primary btn-user btn-block">
        Update
    </button>
</form>

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
>>>>>>> Stashed changes
