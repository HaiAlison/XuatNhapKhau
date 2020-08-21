@extends('master.masterpage', ['title' => 'Payment-overseas'])
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/css.css') }}">
@endsection
@section('content')
<form  action="{{ route('user.export')}} " method="get" enctype="multipart/form-data">
    @csrf
    <!--  -->
    <div class="form-group">
        <div class="col-lg-12 col-md-12">
            <div class="billing-details">
                <h3 class="title" style="text-align: left;">
                    Export file
                </h3>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group row">
                            <label   class="col-sm-4 col-form-label">Choose date from:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" name="date_start" id="start">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group row">
                            <label   class="col-sm-1 col-form-label">To:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" name="date_end" id="end" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Select PO No.:</label>
                            <div class="col-sm-8 selectBox" onclick="showCheckboxes()">
                                <select>
                                    <option>Select PO No.</option>
                                </select>
                                <div class="overSelect">
                                </div>
                                <div id="checkboxes" class="po_no">
                                    <label class="text-left"><input type="checkbox" id="checkAll" /> Choose all PO No.</label>
                                    @if(isset($paymentOverseas))
                                    @foreach($paymentOverseas as $shipment)
                                    <label class="text-left"><input type="checkbox" value="{{$shipment->po_no_id }}"
                                        name="po_no_id[]" /> {{$shipment->po_no_id }}
                                    </label>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Select PO No.:</label>
                            <div class="selectBox col-sm-8" onclick="showSubCheckboxes()">
                                <select>
                                    <option>Select Sub PO No.</option>
                                </select>

                                <div class="overSelect"></div>
                                <div id="checkboxesSub" class="po_no">
                                    <label class="text-left"><input type="checkbox" style="width=20px" id="checkAll" /> Choose all
                                    PO No.</label>
                                    @if(isset($paymentOverseas))
                                    @foreach($paymentOverseas as $shipment)
                                    <label class="text-left"><input type="checkbox" value="{{$shipment->id }}"
                                        name="sub_po_id[]" /> {{$shipment->sub_po_no_id }}
                                    </label>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class=" col-sm-3 ml-3 form-control btn" id="btn_export" name="btn_export">Export file</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form class='col-12' action="{{ route('user.show-payment-overseas')}} " method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="col-lg-12 col-md-12">
          <div class="billing-details">
            <h3 class="title" style="text-align: left;">Payment Overseas</h3>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">PO No.</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control form-control-sm select" name="po_no_id0" id="po_no_id0">
                                @if(isset($pos))
                                @foreach($pos as $shipment)
                                <option value="{{$shipment->po }}">{{$shipment->po }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <label for="SubpoNo" class="col-sm-4 col-form-label">Sub PO No.</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control form-control-sm select" name="sub_po_id0" id="sub_po_id0">
                                @if(isset($subs))
                                @foreach($subs as $shipment)
                                <option @if(isset($payments) && $shipment->id == $payments->sub_po_no_id) selected="selected"
                                    @endif
                                    value="{{$shipment->sub }}">{{$shipment->sub }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <button class="btn btn-light" onclick="btn_search_click()" name="btn_search" id="btn_search">Search</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@if(isset($payments))
<div class='shipment row col-12'>
    <div class="title_shipment col-12">
        <h5>Payment Overseas</h5>
    </div>
    <div class="col-5 left">
        <div class="row">
            <div class="col-5">
                <label for="PO_No.">PO No.</label>
            </div>
            <div class="custom-file col-7">
                <input id='po_no_id0' name="po_no_id" style="button" @if(isset($payments))
                value="{{$payments->po_no_id}}" @endif />

                <input id='po_no_id0' type="hidden" name="user_id" style="button" @if(isset($payments))
                value="{{auth('web')->user()->id}}" @endif />
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="Sub_PO_No.">Sub PO No.</label>
            </div>
            <div class="custom-file col-7">
                <input name="sub_po_no_id" id="sub_po_id" @if(isset($payments))
                value="{{$payments->sub_po_no_id}}" @endif />
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="SeleContractNo">PO date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="po_date" id="po_date" @if(isset($order)) value="{{$order->po_date}}" @endif
                placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="Itemname">Item name</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" id="item_name" name="item_name" @if(isset($paymentdetail))
                value="{{$paymentdetail->product_code_id}}" @endif placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <label for="BLNO">Item packing</label>
            </div>
            <div class="col-7">
                <input type="text" name="item_packing" id="item_packing" @if(isset($paymentdetail))
                value="{{$paymentdetail->packing_id}}" @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="ItemSource">Item Source</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" name="item_source" id="item_source" @if(isset($order))
                value="{{$order->manufacturer_id}}" @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="ItemOrigin">Item Origin</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" name="item_origin" id="item_origing" @if(isset($order))
                value="{{$order->origin_id}}" @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="QTY">QTY</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" name="qty" id="qty" @if(isset($paymentdetail))
                value="{{$paymentdetail->net_weight_id}}" @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label c for="Unit_Price">Unit Price</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" name="unit_price" onch="TotalAmount()" id="unit_price" @if(isset($paymentdetail))
                value="{{$paymentdetail->price}}" @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="Incoterms">Incoterms</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" name="incoterms" id="incoterms" @if(isset($payments))
                value="{{$payments->incoterms_id}}" @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="" for="Paymentterm">Payment term</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" onkeydown="payment_term_key()" name="payment_term" id="payment_term"
                placeholder="" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="" for="Invoicingparty">Invoicing party</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" name="invoicing_party" id="invoicing_party" placeholder="" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <label class="" for="1stPaymentDate">1st Payment Date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="first_payment_date" id="_1st_payment_date" placeholder="" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="" for="2stPaymentDate">2nd Payment Date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="second_payment_date" id="_2st_payment_date" placeholder="" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="" for="3stPaymentDate">3rd Payment Date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="third_payment_date" id="_3st_payment_date" placeholder="" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="" for="4stPaymentDate">4th Payment Date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="fourth_payment_date" id="_4st_payment_date" placeholder="" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="" for="5stPaymentDate">5th Payment Date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="fifth_payment_date" id="_5st_payment_date" placeholder="" value="">
            </div>
        </div>
    </div>

    <div class="col-5 right">
        <div class="row">
            <div class="col-5">
                <label class="" for="POL">POL</label>
            </div>
            <div class="custom-file col-7">
                <select type="text" class=" select" name="pol" >
                    @foreach($pol as $p)
                    <option value="{{$p->id }}">{{$p->pod_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <label class="" for="Ship">Ship</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" id="ship" name="ship" @if(isset($payments))
                value="{{$payments->type_of_shipment}}" @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="ContainerSize"> #CONT</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" id="cont" name="cont" @if(isset($typeofshipment))
                value="{{$typeofshipment->number_container}}" @endif placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <label class="" for="Freight">Freight</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" onclick="freightFunction()" name="freight" id="freight" value="" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="BLdate">BL date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="bl_date" id="bl_date" @if(isset($payments)) value="{{$payments->bl_date}}"
                @endif placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="ETA">ETA</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="eta" id="ate" @if(isset($payments)) value="{{$payments->eta}}" @endif
                placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="TotalAmount">Total Amount</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" onclick="TotalAmount()" name="total_amount" id="total_amount" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="Due_date">Due date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="due_date" id="due_date" placeholder="">
            </div>

        </div>
        <div class="row">
            <div class="col-5">
                <label for="FreightperMT">Week</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" onclick="getWeekNumber()" name="week" id="week" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="PRno">PR no</label>
            </div>
            <div class="custom-file col-7">
                <input type="text" name="pr_no" id="pr_no" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="PRdate">PR date</label>
            </div>
            <div class="custom-file col-7">
                <input type="date" name="pr_date" id="pr_date" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="TOTALPAYMENT">TOTAL PAYMENT</label>
            </div>
            <div class="custom-file col-7">
                <input name="total_payment" id="total_payment" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="1stPaymentAmount">1st Payment Amount</label>
            </div>
            <div class="custom-file col-7">
                <input name="first_payment_amount" id="_1st_payment_amount" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="2stPaymentAmount">2nd Payment Amount</label>
            </div>
            <div class="custom-file col-7">
                <input name="second_payment_amount" id="_2st_payment_amount" placeholder="">
            </div>

        </div>
        <div class="row">
            <div class="col-5">
                <label for="3stPaymentAmount">3rd Payment Amount</label>
            </div>
            <div class="custom-file col-7">
                <input name="third_payment_amount" id="_3st_payment_amount" placeholder="">
            </div>

        </div>
        <div class="row">
            <div class="col-5">
                <label for="4stPaymentAmount">4th Payment Amount</label>
            </div>
            <div class="custom-file col-7">
                <input name="fourth_payment_amount" id="_4st_payment_amount" placeholder="">
            </div>

        </div>
        <div class="row">
            <div class="col-5">
                <label for="5stPaymentAmount">5th Payment Amount</label>
            </div>
            <div class="custom-file col-7">
                <input name="fifth_payment_amount" id="_5st_payment_amount" placeholder="">
            </div>

        </div>
    </div>
    <div class="col-12 row">
        <hr>
        <button type="submit" onclick="btn_create_click()" name="btn_create" id="btn_create" class="button">create
            paynent overseas
        </button>
    </div>
</div>
@endif
<!--EndPaymentOversea-->


</form>
@endsection

@section('script')

<script>
    function btn_search_click() {
        $('#btn_search').val(btn_search);
    }

    function btn_export_click() {
        $('#btn_export').val(btn_export);
    }

    function btn_create_click() {
        $('#btn_create').val(btn_create);
    }

    <?php
    if (isset($paymentdetail)) ?>
        var payment_detail = <?php
    if (isset($paymentdetail)) echo $paymentdetail;
    else echo null;?> 

    function TotalAmount() {
        var qty = payment_detail.net_weight_id;
        var price = payment_detail.price;
        var amount = qty * price;
        console.log(qty);
        $('#total_amount').val(amount);

    }
    <?php
    if (isset($payments)) ?>
        var payment = <?php
    if (isset($payments)) echo $payments;
    else echo null; ?> 
    function payment_term_key() {
        var payment_term = $('#payment_term').val();
        var bl_date = payment.bl_date;
        var kq = bl_date + payment_term;
        $('#due_date').val(kq);
    }



// function getWeekNumber() {

//  document.getElementById("week").value =
//  if (isset($payments)){
//   // Xem ngày hiện tại thuộc tuần thứ mấy trong năm ?
//   $date = $payments->eta;
//   while (date('w', strtotime($date)) != 1) {
//     $tmp = strtotime('-1 day', strtotime($date));
//     $date = date('Y-m-d', $tmp);
//   }
//   $week = date('W', strtotime($date));
//   echo $week ;
// }else
// echo null; 
// ?>
// }
//document.getElementById("freight").onload = function() {freightFunction()};

function freightFunction() {
    var container = payment.freight_per_container;
    var MT = payment.freight_per_mt;
    var amount = container / MT;
    console.log(MT);
    console.log(amount);
    document.getElementById("freight").value = amount;

}
//export
var expanded = false;
var expand = false;

function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}

function showSubCheckboxes() {
    var checkboxesSub = document.getElementById("checkboxesSub");
    if (!expanded) {
        checkboxesSub.style.display = "block";
        expanded = true;
    } else {
        checkboxesSub.style.display = "none";
        expanded = false;
    }
}
</script>

@endsection