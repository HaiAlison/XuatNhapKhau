@extends('master.masterpage')
@section('content')
<section class="checkout-area ptb-80">
  <div class="container">
   <!-- Export excel file-->
   @if(isset($local))
   @include('user.form-view.export-excel')
   @endif
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
                  <button class="btn btn-light">Show</button><br>

                </div>

              </div>
            </div>
            @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
            @endif
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
<script type="text/javascript" src="{{ asset('assets/js/my-script.js') }}"></script>
<script type="text/javascript">
    // ajax lưu Payment local
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
              var href  = 'href="{{ route("user.edit-payment-local",[":po_no",":sub_po",":type_service"]) }}"';
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
    });
// -----------------------
</script>
@endsection