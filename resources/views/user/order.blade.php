@extends('master.masterpage')

@section('content')



<form class="user" action="{{ route('user.store-order') }} " method="post">
  @csrf
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="poNo">PO No.</label>
        </div>
        <div class="custom-file">
          <input type="text" class="form-control custom-input" name="id" id="poNo" placeholder="PO No.">
        </div>
      </div>
    </div>
    <div class="col-sm-6 ">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="type_of_shipment">Type of shipment</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" id="type_of_shipment" name="type_of_shipment" onchange="select()">
              <option value="vessle">Vessle</option>
              <option  value="container" >Container</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class='col-sm-6'>
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="po_date">PO Date</label>
        </div>
        <div class="custom-file">
          <input type='text' class=" date form-control custom-input" id="po_date" placeholder="PO Date" name="po_date"  />
        </div>
      </div>
      
    </div>
    <div class="col-sm-6">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="number_container">Number of container</label>
        </div>
        <div class="custom-file">
         <input type="text" class="form-control custom-input" id="number_container" name="number_container" placeholder="Number of container" disabled="true">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="postatus">PO Status</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" id="postatus" name="po_status_id">
            @foreach($poStatuses as  $poStatus)

              <option value="{{$poStatus->id}}">{{$poStatus->po_status}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
     
       <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="container_size">Container size</label>
        </div>
        <div class="custom-file">
           <input type="text" class="form-control custom-input" id="container_size" name="container_size_id" placeholder="Container size" disabled="true">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="origin">Origin</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" name="origin_id" id="origin">
            @foreach($origins as  $origin)
              <option value="{{$origin->id}}">{{$origin->origin_name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="payload">Payload (MT/Conts.)</label>
        </div>
        <div class="custom-file">
          <input type="text" class="form-control custom-input" id="payload" name="payload" disabled="true" >
        </div>
      </div>

    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea">Marking</label>
    <textarea class="form-control " id="exampleFormControlTextarea" name="marking"></textarea>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
     <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="manufacturer">Manufacturer</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" id="manufacturer" name="manufacturer_id">
            @foreach($manufacturers as  $manufacturer)

              <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">

      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="freight_target">Freight target</label>
        </div>
        <div class="custom-file">
         <input type="text" class="form-control custom-input" id="freight_target"  name="freight_target" placeholder="Freight target" disabled="true">
        </div>
      </div>
      
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="supplier">Supplier</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" name="supplier_id" id="supplier" >
            @foreach($suppliers as  $supplier)

              <option value="{{$supplier->id}}">{{$supplier->supplier}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="dthc_target">DTHC target</label>
        </div>
        <div class="custom-file">
         <input type="text" class="form-control custom-input" id="dthc_target" name="dthc_target" placeholder="DTHC target" disabled="true">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
       <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="pol">POL</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" id="pol" name="pol">
            @foreach($pods as  $pol)

              <option value="{{$pol->id}}">{{$pol->pod_name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="cic_target">CIC target</label>
        </div>
        <div class="custom-file">
        <input type="text" class="form-control custom-input" id="cic_target" name="cic_target" placeholder="CIC target" disabled="true">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="pod">POD</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" name="pod" id="pod">
            @foreach($pods as  $pod)

              <option value="{{$pod->id}}">{{$pod->pod_name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Link to specs file</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="link_to_specs" id="inputGroupFile01"
          aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose a file</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="incoterm">Incoterms</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" id="incoterm" name="incoterm_id">
            @foreach($incoterms as  $incoterm)

              <option value="{{$incoterm->id}}">{{$incoterm->incoterms}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="hs_code">HS target</label>
        </div>
        <div class="custom-file">
        <input type="text" class="form-control custom-input" id="hs_code" name="hs_code" placeholder="HS code">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="eta_request">ETA requested</label>
        </div>
        <div class="custom-file">
          <input type="text" class="form-control date custom-input" id="eta_request" name="eta_request" placeholder="ETA requested">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="co">CO</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" id="co" name="co_id">
            @foreach($cos as  $co)

              <option value="{{$co->id}}">{{$co->certificate_of_origin}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
     
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="end_customer">End Customer</label>
        </div>
        <div class="custom-file">
          <input type="text" class="form-control custom-input" id="end_customer" name="end_customer" placeholder="End Customer">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="paymentterm">Payment Term</label>
        </div>
        <div class="custom-file">
          <select class="custom-select" id="paymentterm" name="payment_term_id">
            @foreach($paymentTerms as  $paymentTerm)

              <option value="{{$paymentTerm->id}}">{{$paymentTerm->payment_terms}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 d-flex mb-sm-0" >
      <input type="hidden" class="form-control 
      form-control-user"  value="0" style="width: 30px;height: 40px;" name="inspection_required" />
      <input type="checkbox" class="form-control 
      form-control-user" id="checked" value="1" style="width: 30px;height: 40px;" name="inspection_required" /><label class="text-center" for="checked"><span class=" text-nowrap" >&nbsp;&nbsp;Inspection required</span></label>
    </div>
    <div class="col-sm-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="within_x_day">Within # days</label>
        </div>
        <div class="custom-file">
          <input type="text" class="form-control custom-input" name="within_x_day" id="within_x_day" placeholder="Within # days">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 d-flex mb-sm-0" >
    </div>
    <div class="col-sm-6">
      
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text"  for="currency">Currency|Fx</label>
        </div>
        <div class="custom-file">
         <input type="text" class="form-control custom-input" id="currency" name="currency" placeholder="Currency|Fx">
        </div>
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-user btn-block">
    Register Account
  </button>
</form>
@endsection
@section('script')

<script type="text/javascript">
  $('.date').datetimepicker({

    format: 'YYYY-MM-DD',
    ignoreReadonly: true
  }); 

</script>
<script>
    $('#inputGroupFile01').on('change',function(){
    //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
    //replace the "Choose a file" label

    $(this).next('.custom-file-label').html(fileName);
  });
  </script>

  <script type="text/javascript"> 
        function select(){
        var option = document.getElementById('type_of_shipment');
            if(option.value == "container")
            {
                document.getElementById('number_container').disabled = false;
                document.getElementById('container_size').disabled = false;
                document.getElementById('payload').disabled = false;
                document.getElementById('freight_target').disabled = false;
                document.getElementById('dthc_target').disabled = false;
                document.getElementById('cic_target').disabled = false;
            }
            else{
              document.getElementById('number_container').disabled = true;
                document.getElementById('container_size').disabled = true;
                document.getElementById('payload').disabled = true;
                document.getElementById('freight_target').disabled = true;
                document.getElementById('dthc_target').disabled = true;
                document.getElementById('cic_target').disabled = true;
            }
        }</script>
@endsection