@extends('master.masterpage')
@section('css')
<!-- Style của Export ( phần checkbox) -->
<style type="text/css">
  .multiselect {
    width: 200px;
  }

  .selectBox {
    position: relative;
  }

  .selectBox select {
    width: 100%;
    font-weight: bold;
  }

  .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }

  #checkboxes {
    display: none;
    border: 1px #dadada solid;
  }


  #checkboxes label {
    font-family: inherit;
    font-size: inherit;
    display: block;
    padding-left: 7px;
  }
  

  #checkboxes label:hover {
    background-color: #1e90ff;
  } 

  #checkboxesSub {
    display: none;
    border: 1px #dadada solid;
  }

  #checkboxesSub label {
    padding-left: 7px;
    display: block;
    font-family: inherit;
    font-size: inherit;
  }

  #checkboxesSub label:hover {
    background-color: #1e90ff;
  }
</style>
@endsection
@section('content')
<section class="checkout-area ptb-80">
  <div class="container">
    @if(isset($local))
    <form action="{{ route('user.show-payment-local') }} " method="post">
      @else
      <form action="{{ route('user.show-view-detail') }} " method="post"> 
        @endif
        @csrf
        <div class="form-group">
          <div class="col-lg-12 col-md-12">
            <div class="billing-details">
              <h3 class="title" style="text-align: left;">
                @isset($title)
                {{ $title }}
              @endisset</h3>
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">PO No.</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="id" id="poNo" value="{{ old('id') }}" placeholder="">
                    </div>
                    <label for="SubpoNo" class="col-sm-4 col-form-label">Sub PO No.</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" name="id_shipment" id="SubpoNo" placeholder="">
                    </div>
                    <button class="btn btn-light">Show</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Payment local content -->
      @if(isset($purchaseOrder, $inputDetail))
      @include('user.form-view.payment-local')
      @endif
      <!-- Edit Payment Local -->
      @if(isset($editPaymentLocal))
      @include('user.form-view.payment-local')
      @endif
      <!-- End of Payment local -->

      <!-- Export file excel -->
      @include('user.form-view.export-excel')
      <!-- View detail -->
      @if(isset($order,$shipment))
      @include('user.form-view.view-detail')
      @endif
      <!-- End of view detail -->
    </div>
  </section>

  @endsection
  @section('script')
  <!-- Modal update or not  -->
  <div class="modal fade" id="notify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          This PO No./Sub PO No. was created type of service, do you want to update this changes?
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <script>
    var unitPrice = parseFloat($("#unitPrice").val());
    var qty = parseFloat($("#qty").val());
    var cont = parseFloat($("#cont").val());
    $('select').on('change',function(e){
      valService = e.target.value; //lấy value từ select qua sự kiện onchange
      calAmount(valService);
    })
    function calAmount (val){
      var amount = $("#amount").attr('value'); //lấy giá trị amount để gán
      if(val === 'tax'){               
        $("#taxLevel").prop( "disabled",false);
        $(".local").prop( "disabled",true);
        $("#taxLevel").on('keyup',function(){
          tax = parseFloat($(this).val());
          var result = unitPrice*qty*(tax/100)+unitPrice*qty*(tax/100)*0.1;
          amount = $("#amount").val(result); 
        })
      }
      else if(val === 'localCharge'){
        $("#taxLevel").prop( "disabled",true);
        $(".local").prop( "disabled",false);
        $(".local").on('keyup', function() {
         var total = 0;
         $(".local").each(function(){
          var idHead = $(this).attr('id');
          if(idHead === 'docs')
            docs = parseFloat($(this).val());
          if(idHead === 'dthc')
            dthc = parseFloat($(this).val());
          if(idHead === 'cic')
            cic = parseFloat($(this).val());
          if(idHead === 'cleaning')
            cleaning = parseFloat($(this).val());
          if(idHead === 'other')
            other = parseFloat($(this).val());
          total = docs+(dthc+cic+cleaning+other)*cont;
          amount = $("#amount").val(total);
        })

       })
        
      }
      else amount = $("#amount").prop("value",'0');
    }
    $("#checkAll").click(function () {
      if ($("#checkAll").is(':checked')) {
        $(".po-checkbox").prop("checked", true);
      } else {
        $(".po-checkbox").prop("checked", false);
      }
    });
    
    $(".po-checkbox").click(function() {
      if (!$(this).prop("checked")) { //xài this để lấy  prop từng cái trong non arrow function
        $("#checkAll").prop("checked", false);
      }
    });

    $("#checkSubAll").click(function () {
      if ($("#checkSubAll").is(':checked')) {
        $(".sub-po-checkbox").prop("checked", true);
      } else {
        $(".sub-po-checkbox").prop("checked", false);
      }
    });
    $(".sub-po-checkbox").click(function() {
      if (!$(this).prop("checked")) { //xài this để lấy  prop từng cái trong non arrow function
        $("#checkSubAll").prop("checked", false);
      }
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      var frm = $(".frm");
      $("#create").on('click',function(e){

        $.ajax({
          type: "POST",
          url: frm.attr('action'),
          data: frm.serialize(),
          success: function (data) { 
            if(data.msg == "ok"){
              var po_no = data.data.po_no_id;
              var sub_po = data.data.sub_po_no_id;
              var type_service = data.data.type_of_service;
              var href  = 'href="{{ route("user.edit-payment-local",[":po_no",":sub_po",":type_service"])}}"';
              href = href.replace(':po_no',po_no);
              href = href.replace(':sub_po',sub_po);
              href = href.replace(':type_service',type_service);

              $('.modal-footer').html('<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>\
                <a class="btn btn-primary"'+ href +'>Update</a>');
              $('#notify').modal('show');
            }
            else{
              $("#success").html('<div class="alert alert-success">Payment Local successfully created</div>');
              setTimeout(function(){
                location.href = "{{ route('user.show-payment-local') }}";

              },2000);
            }
          },
        })
        e.preventDefault();
      })
    })
  </script>
  <script type="text/javascript">

    $(document).ready(function(){
      $("#showToExport").on('click',function(){
        var values = {
          'start' : $("#start").val(),
          'end' : $("#end").val(),
        };

        $.ajax({
          type: "get",
          url: "/user/choose-date",
          data: {
            'start': $("#start").val(),
            'end': $("#end").val(),
          },
          success: function(result){
            if(result.data[0] !== undefined){
              $("#null").hide();
              for (var i = 0; i < result.data.length; i++) {
                var po ='<label data-for="'+result.data[i].po_no_id+'" class="text-left"><input type="checkbox" class="po-checkbox"  value="'+result.data[i].po_no_id+'" name="po_no'+i+'" /> '+result.data[i].po_no_id+'</label>';
                
                var sub_po = '<label data-for="'+result.data[i].po_no_id+'" class="text-left"><input type="checkbox" class="sub-po-checkbox"  value="'+result.data[i].sub_po+'" name="sub_po"/> '+result.data[i].sub_po+'</label>';
                $(".drop").show();
                $(".po_no").append(po);
                $(".sub_po").append(sub_po);
              }
             $(".export-btn").css("display","block");
            }
            else{
              $("#null").show();
              $("#null").html('<div class="alert alert-danger">Null</div>');
              $(".export-btn").css("display","none");

              $('.alert').delay(3000).fadeOut('slow');
              $(".drop").hide();

            }
          },
          error: function()
          {alert("Fail");}
        })
      })
    })

  </script>
  <script type="text/javascript">
    var type = $("#inputTypeService").val();
    calAmount(type);
    if(type === 'tax'){
      $("#taxLevel").prop( "disabled",false);
    }
    else if(type === 'localCharge'){
        $(".local").prop( "disabled",false);
    }
    else{
      $("#taxLevel").prop( "disabled",true);
      $(".local").prop( "disabled",true);

    }
  </script>
  @endsection