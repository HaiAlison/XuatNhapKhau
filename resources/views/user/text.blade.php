@extends('master.masterpage')

@section('css')
<style>
    input:disabled {
        background: #ccc;
    }
   /* .dropbtn {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    padding-left: 100px;
    padding-right: 100px;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: .35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }*/

    .dropdown {
      position: relative;
      display: inline-block;
  }

  .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
  }

  .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
  }

  .dropdown-content a:hover {background-color: #f1f1f1}

  .dropdown:hover .dropdown-content {
      display: block;
  }
</style>
@endsection

@section('content')
<form class='col-12-sm'>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="PO_No.">PO No.</label>
                </div>
                <div class="custom-file">
                    <div class="dropdown">
                        <button class=" form-control" value="btn">@if(isset($order)){{$order->id}} @endif</button>
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
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="typeofshipment">Type of shipment</label>
                </div>
                <div class="custom-file">
                    <input list="browsers" class="form-control form-control-user" id="exampleTypeOfShipment"
                    name="exampleTypeOfShipment" @if(isset($order)) value="{{$order->type_of_shipment}}"
                    disabled="disabled" @endif>
                </div>
            </div>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Sub_PO_No.">Sub PO No.</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleSubPONo" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Number_Container">Number Container</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="examplenumber_container"
                    @if(isset($type)) value="{{$type->number_container}}" @else disabled="disabled" @endif
                    placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="SeleContractNo">Sale Contract No.</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleSeleContractNo" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="ContainerSize">Container size</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleContainerSize" placeholder=""
                    @if(isset($size)) value="{{$size->container_size}}" @else disabled="disabled" @endif>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="InvoiceNo">Invoice No.</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleInvoiceNo" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Payload">Payload (MT/Cont)</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="examplePayload" @if(isset($type))
                    value="{{$type->payload}}" @else disabled="disabled" @endif placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="BLDate">BL date</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="date form-control form-control-user" id="exampleBLDate" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Freightpercontainer">Freight per container</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleFreight" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="ETA">ETA</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="date form-control form-control-user" id="exampleBLETA" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="DTHCUSD">DTHC (USD) | (VND)</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleDTHC_USD" placeholder="">
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleDTHC_VND" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="VesselName">Vessel name</label>
                </div>
                <div class="custom-file">
                    <input type="text" class=" form-control form-control-user" id="exampleVesselName" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="CIC_USD">CIC (USD) | (VND)</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleCIC_USD" placeholder="">
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleCIC_VND" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Carrier">Carrier</label>
                </div>
                <div class="custom-file">
                    <input type="text" class=" form-control form-control-user" id="exampleVesselName" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="FreightperMT">Freight per MT</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleFreightper" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="ShipmentStatus">Shipment status</label>
                </div>
                <div class="custom-file">
                    <input type="text" class=" form-control form-control-user" id="exampleVesselName" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Numberofbags">Number of bags</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleNumber" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="Incoterms">Incoterms</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleVesselName" placeholder=""
                    @if(isset($order)) value="{{$order->incoterms_id}}" @endif readonly>
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="GrossWeight">Gross Weight (MT)</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleGross" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="POD">POD</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleVesselpod" placeholder=""
                    @if(isset($order)) value="{{$order->pod}}" @endif>
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="CurrencyFX">Currency|FX</label>
                </div>
                <div class="custom-file">
                    <input type="text" class="form-control form-control-user" id="exampleCurrency" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
        </div>
        <div class="col-sm-6 mb-3 d-flex mb-sm-0">
            <input type="checkbox" class="form-control 
            form-control-user" id="checked" style="width: 30px;height: 40px;" name="" value="" /><label
            class="text-center" for="checked"><span class=" text-nowrap">&nbsp;&nbsp;ICO provided</span></label>
        </div>

    </div>
</form>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Shipment Detail</h6>
    </div>
    <div class="col-12" id="form_shipment_detail">
        <div class="row">
             <div class="col-1">
                <label  for="ProductCode">Product code</label>
            </div>
            <div class="col-1">
                <label for="ProductName">Product name</label>
            </div>
             <div class="col-1">
                    <label for="Packing">Qty/Bag > Packing</label>
            </div>
             <div class="col-1">
                    <label for="Weightunit ">Weight unit</label>
            </div>
            <div class="col-1">
                <label for="Binding">Binding</label>
            </div>
             <div class="col-1">
                    <label for="Netweight ">Net weight (MT)</label>
            </div>
             <div class="col-1">
                <label  for="Price">Price/MT</label>
            </div>
             <div class="col-1">
                <label  for="TotalAmount">Total amount</label>
            </div>
        </div>
   
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('.date').datetimepicker({
        format: 'DD/MM/YYYY',
        ignoreReadonly: true
    });
    var identitiId = 0;
    window.addEventListener("keydown", CheckKeyTab, false);
    function CheckKeyTab(key)
    {
        if(key.keyCode =='9')
        {
           identitiId++;
           var table = $('#form_shipment_detail');
           table.append('<hr/><br/>\
            <div class="form-group row">\
            <div class="col-sm-3">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="ProductCode">Product code</label>\
            </div>\
            <div class="custom-file">\
            <select class="selectpicker form-control changeId" onchange="idProductNull()" id="txt_product_id0">\
            <option value="" selected="selected"></option>\
            @if(isset($productList))\
            @foreach($productList as $product)\
            <option value="{{$product->product_code_id}}">{{$product->product_name}}</option>\
            @endforeach\
            @endif\
            </select>\
            </div>\
            </div>\
            </div>\
            <div class="col-sm-3 ">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="ProductName">Product name</label>\
            </div>\
            <div class="custom-file">\
            @if(isset($productList))\
            <input type="text" class="form-control form-control-user changeId" onclick="selectShipmentDetail()"  id="txt_ProductName0" placeholder="">\
            @endif\
            </div>\
            </div>\
            </div>\
            <div class="col-sm-3">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="Packing">Qty/Bag > Packing</label>\
            </div>\
            <div class="custom-file">\
            <input type="text" class="form-control form-control-user changeId" id="txt_Packing0" placeholder=""\
            />\
            </div>\
            </div>\
            </div>\
            <div class="col-sm-3 ">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="Weightunit">Weight unit</label>\
            </div>\
            <div class="custom-file">\
            <input type="text" class="form-control form-control-user changeId" id="txt_WeightUnit0" placeholder="">\
            </div>\
            </div>\
            </div>\
            </div> \
            <div class="form-group row">\
            <div class="col-sm-3">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="Binding">Binding</label>\
            </div>\
            <div class="custom-file">\
            <input type="text" class="form-control form-control-user changeId" id="txt_Binding0" placeholder=""\
            />\
            </div>\
            </div>\
            </div>\
            <div class="col-sm-3 ">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="Netweight ">Net weight (MT)</label>\
            </div>\
            <div class="custom-file">\
            <input type="text" class="form-control form-control-user changeId" id="txt_Netweight0" placeholder="">\
            </div>\
            </div>\
            </div>\
            <div class="col-sm-3">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="Price">Price/MT</label>\
            </div>\
            <div class="custom-file">\
            <input type="text" class="form-control form-control-user changeId" id="txt_Price0" placeholder=""\
            />\
            </div>\
            </div>\
            </div>\
            <div class="col-sm-3 ">\
            <div class="input-group">\
            <div class="input-group-prepend">\
            <label class="input-group-text" for="TotalAmount">Total amount</label>\
            </div>\
            <div class="custom-file">\
            <input type="text" class="form-control form-control-user changeId" id="txt_TotalAmount0" placeholder="">\
            </div>\
            </div>\
            </div>\
            </div>'
            )
}
$('#form_shipment_detail').find('.changeId').each(function(){
  var id = $(this).attr('id') || null;
  var i = id.substr(id.length-1);
  var prefix = id.substr(0,id.length-1);
  $(this).attr('id', prefix+(+i+1));
  console.log(id);
});
};
function idProductNull()
{

    if(identitiId>0)
    {
     for(var i= 1; i< identitiId+1; i++)
     {
        if($('#txt_product_id'+i).children('option:selected').val()=="")
        {
            document.getElementById('txt_selectedpro'+i).value=$('#txt_product_id'+i).children('option:selected').val();
            $('#txt_ProductName'+i).attr('disabled','disabled');
            $('#txt_Packing'+i).attr('disabled','disabled');
            $('#txt_WeightUnit'+i).attr('disabled','disabled');
            $('#txt_Netweight'+i).attr('disabled','disabled');
            $('#txt_Binding'+i).attr('disabled','disabled');
            $('#txt_Price'+i).attr('disabled','disabled');
            $('#txt_TotalAmount'+i).attr('disabled','disabled');
        }
        else{
            document.getElementById('txt_selectedpro'+i).value=$('#txt_product_id'+i).children('option:selected').val();
            $('#txt_ProductName'+i).removeAttr('disabled');
            $('#txt_Packing'+i).removeAttr('disabled');
            $('#txt_WeightUnit'+i).removeAttr('disabled');
            $('#txt_Netweight'+i).removeAttr('disabled');
            $('#txt_Binding'+i).removeAttr('disabled');
            $('#txt_Price'+i).removeAttr('disabled');
            $('#txt_TotalAmount'+i).removeAttr('disabled');
        }
    }
}
else{
    if($('#txt_product_id').children('option:selected').val()=="")
    {

        $('#txt_ProductName').attr('disabled','disabled');
        $('#txt_Packing').attr('disabled','disabled');
        $('#txt_WeightUnit').attr('disabled','disabled');
        $('#txt_Netweight').attr('disabled','disabled');
        $('#txt_Binding').attr('disabled','disabled');
        $('#txt_Price').attr('disabled','disabled');
        $('#txt_TotalAmount').attr('disabled','disabled');
    }
    else{
       $('#txt_ProductName').removeAttr('disabled');
       $('#txt_Packing').removeAttr('disabled');
       $('#txt_WeightUnit').removeAttr('disabled');
       $('#txt_Netweight').removeAttr('disabled');
       $('#txt_Binding').removeAttr('disabled');
       $('#txt_Price').removeAttr('disabled');
       $('#txt_TotalAmount').removeAttr('disabled');

   }

}

}
function selectShipmentDetail()
{
 var shipment_pro = <?php echo $productList; ?>;
 shipment_pro.forEach(function(product, index){
    if($('#txt_product_id').children('option:selected').val()===product.product_code_id)
    {
        document.getElementById("txt_ProductName").value=product.product_name;
        document.getElementById("txt_Packing").value=product.packing_id;
        document.getElementById("txt_WeightUnit").value=product.weight_unit_id;
        document.getElementById("txt_Binding").value=product.binding_id;
        return;
    }
    for(var i= 1; i< identitiId+1; i++)
    {
       if($('#txt_product_id'+i).children('option:selected').val()===product.product_code_id)
       {
       
        document.getElementById("txt_ProductName"+i).value=product.product_name;
        document.getElementById("txt_Packing"+i).value=product.packing_id;
        document.getElementById("txt_WeightUnit"+i).value=product.weight_unit_id;
        document.getElementById("txt_Binding"+i).value=product.binding_id;
        return;
    }
}

}
)}

</script>
@endsection