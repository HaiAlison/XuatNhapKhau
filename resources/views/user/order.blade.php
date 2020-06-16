@extends('master.masterpage', ['title' => 'Order'])

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Order</h1>
</div>

<form class="user"  action="{{ route('user.store-order') }} " method="post" enctype="multipart/form-data"> 
  @csrf
  <!-- Order -->
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
          <input type="number" class="form-control custom-input" step=".01" id="payload" name="payload" disabled="true" >
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
         <input type="number" class="form-control custom-input" step=".01" id="freight_target"  name="freight_target" placeholder="Freight target" disabled="true">
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
         <input type="number" class="form-control custom-input" step=".01" id="dthc_target" name="dthc_target" placeholder="DTHC target" disabled="true">
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
        <input type="number" class="form-control custom-input" step=".01" id="cic_target" name="cic_target" placeholder="CIC target" disabled="true">
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
          <input type="file" class="custom-file-input" name="link_to_specs" id="inputGroupFile01" accept="image/*,.pdf,.txt,.xlsx,.docs,.doc,.xls" 
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
          <label class="input-group-text"  for="hs_code">HS code</label>
        </div>
        <div class="custom-file">
        <input type="text" class="form-control custom-input"  id="hs_code" name="hs_code" placeholder="HS code">
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
          <select class="custom-select" id="paymentterm" name="payment_term_id" onchange="optionTT()">
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
  <hr>
 <!-- End of Order -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
</div>
  <div id="form">
    <div class="form-group row" >

      <div class='col-sm-6'>
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text"  for="product_id">Product name</label>
          </div>
          <div class="custom-file">
            <select class="custom-select" id="product_id" name="product_code_id[]"> 
              @foreach($products as  $product)
                <option value="{{$product->id}}">{{$product->product}}</option>
              @endforeach
            </select> 
          </div>
        </div>
      </div>

      <div class='col-sm-6'>
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text"  for="packing_id">Packing</label>
          </div>
          <div class="custom-file">
            <select class="custom-select" id="packing_id" name="packing_id[]"> 
              @foreach($packings as  $packing)
                <option value="{{$packing->id}}">{{$packing->packing}}</option>
              @endforeach
            </select> 
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row" >
      <div class='col-sm-6'>
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text"  for="weigh_unit_id">Weight Unit</label>
          </div>
          <div class="custom-file">
            <select class="custom-select" id="weigh_unit_id" name="weight_unit_id[]"> 
             @foreach($weightUnits as  $weightUnit)
                <option value="{{$weightUnit->id}}">{{$weightUnit->weight_unit}}</option>
              @endforeach
            </select> 
          </div>
        </div>
      </div>

      <div class='col-sm-6'>
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text"  for="binding_id">Binding</label>
          </div>
          <div class="custom-file">
            <select class="custom-select" id="binding_id" name="binding_id[]"> 
             @foreach($bindings as  $binding)
                <option value="{{$binding->id}}">{{$binding->binding}}</option>
              @endforeach
            </select> 
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row" >
      <div class="col-sm-4" >
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text"  for="net_weight_id">Net weight</label>
          </div>
          <div class="custom-file">
            <input type="text" id="net_weight_id" name="net_weight_id[]" step=".01" class="form-control custom-input" placeholder="" >
          </div>
        </div>
      </div>

      <div class="col-sm-4 " >
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text"  for="price_id">Price</label>
          </div>
          <div class="custom-file">
            <input type="text" id="price_id" placeholder="" step=".01" name="price[]" class="form-control custom-input">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text"  for="total_amount_id">Total amount</label>
          </div>
          <div class="custom-file">
            <input type="text" id="total_amount_id" placeholder="" step=".01" name="total_amount[]" class="form-control custom-input" onkeydown="addRow()" readonly="">        

          </div>
        </div>
      </div>
    
    </div>
  </div>
    
<hr>

  <button type="submit" class="btn btn-primary btn-user btn-block">
    Register Account
  </button>
</form>
@endsection
@section('script')

<script type="text/javascript">
  $('.date').datetimepicker({

    format: 'YYYY-MM-DD'
    
  }); 


    $('#inputGroupFile01').on('change',function(){
    //get the file name
      
        var fileName = $(this).val().replace('C:\\fakepath\\',"");
    //replace the "Choose a file" label

    $(this).next('.custom-file-label').html(fileName);
  });
        //select vessle or container to hidden value input.
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
        }
        function optionTT(){
          var selectedVal = $("#paymentterm option:selected").val();
            if(selectedVal ==='PaymentTerms_TT'){
              document.getElementById('within_x_day').readOnly  = true;
              $('#within_x_day').val("0");
            }
            else {
              document.getElementById('within_x_day').readOnly = false;
               $('#within_x_day').val("");
            }
        }
        var incrementId = 0;
  function addRow(){
        //append the new row here.
        let eventwhich = event.which;
        
        if(eventwhich == 9){
          incrementId++;
          console.log(incrementId);
            var table = $("#form");

            table.append('<hr/><br/>\
                          <div class="form-group row ">\
                            <div class="col-sm-6">\
                              <div class="input-group">\
                                <div class="input-group-prepend">\
                                  <label class="input-group-text"  >Product name</label>\
                                </div>\
                                <div class="custom-file">\
                                  <select class="custom-select changeId product" id="product0" name="product_code_id[]" onchange="NullProduct()">\
                                  <option selected></option>\
                                    @foreach($products as  $product)\
                                      <option value="{{$product->id}}">{{$product->product}}</option>\
                                    @endforeach\
                                  </select>\
                                </div>\
                              </div>\
                            </div>\
                            <div class="col-sm-6">\
                              <div class="input-group">\
                                <div class="input-group-prepend">\
                                  <label class="input-group-text"  for="packing0">Packing</label>\
                                </div>\
                                <div class="custom-file">\
                                  <select class="custom-select changeId" id="packing0" name="packing_id[]" disabled>\
                                    @foreach($packings as  $packing)\
                                      <option value="{{$packing->id}}">{{$packing->packing}}</option>\
                                    @endforeach\
                                  </select>\
                                </div>\
                              </div>\
                            </div>\
                            </div>\
                            <div class="form-group row ">\
                            <div class="col-sm-6">\
                              <div class="input-group">\
                                <div class="input-group-prepend">\
                                  <label class="input-group-text"  for="weight_unit0">Weight Unit</label>\
                                </div>\
                                <div class="custom-file">\
                                  <select class="custom-select changeId" id="weight_unit0" name="weight_unit_id[]" disabled>\
                                   @foreach($weightUnits as  $weightUnit)\
                                      <option value="{{$weightUnit->id}}">{{$weightUnit->weight_unit}}</option>\
                                    @endforeach\
                                  </select>\
                                </div>\
                              </div>\
                            </div>\
                            <div class="col-sm-6">\
                              <div class="input-group">\
                                <div class="input-group-prepend">\
                                  <label class="input-group-text"  for="binding0">Binding</label>\
                                </div>\
                                <div class="custom-file">\
                                  <select class="custom-select changeId" id="binding0" name="binding_id[]" disabled>\
                                   @foreach($bindings as  $binding)\
                                      <option value="{{$binding->id}}">{{$binding->binding}}</option>\
                                    @endforeach\
                                  </select>\
                                </div>\
                              </div>\
                            </div>\
                          </div>\
                          <div class="form-group row " >\
                            <div class="col-sm-4" >\
                              <div class="input-group">\
                                <div class="input-group-prepend">\
                                  <label class="input-group-text"  for="net_weight0">Net weight</label>\
                                </div>\
                                <div class="custom-file">\
                                  <input type="text" id="net_weight0" name="net_weight_id[]" class="form-control custom-input changeId" placeholder="" disabled>\
                                </div>\
                              </div>\
                            </div>\
                            <div class="col-sm-4 " >\
                              <div class="input-group">\
                                <div class="input-group-prepend">\
                                  <label class="input-group-text"  for="price0">Price</label>\
                                </div>\
                                <div class="custom-file">\
                                  <input type="text" id="price0" placeholder="" name="price[]" class="form-control custom-input changeId" disabled>\
                                </div>\
                              </div>\
                            </div>\
                            <div class="col-sm-4">\
                              <div class="input-group">\
                                <div class="input-group-prepend">\
                                  <label class="input-group-text"  for="total_amount0">Total amount</label>\
                                </div>\
                                <div class="custom-file">\
                                  <input type="text" id="total_amount0" onkeydown="addRow()" placeholder="" name="total_amount[]" class="form-control custom-input changeId" disabled>\
                                </div>\
                              </div>\
                            </div>\
                          </div>'
                          )
            
            
        }//change id.
            $('#form').find('.changeId').each(function(){
              var id = $(this).attr('id') || null ; //lấy id ra
              var i = id.substr(id.length-1); //lấy chỉ số ra
              var prefix = id.substr(0,id.length-1); //lấy tiền tố của id (id-chỉ số)
              console.log(prefix);
              $(this).attr('id', prefix+(+i+1)); //tăng id (tiền tố + chỉ số + 1)
              console.log(id);
            })
            
    }
    function NullProduct(){
            
            for (var i = 1; i < incrementId+1; i++) {
                        
               y= $("#product"+i).children('option:selected').val(); 
                console.log("y",y);
             
              //x= $("#product1").children('option:selected').val(); 
             
              //console.log("x",x);
              if(y==""){
                document.getElementById("packing"+i).disabled = true;
                document.getElementById("weight_unit"+i).disabled = true;
                document.getElementById("binding"+i).disabled = true;
                document.getElementById("net_weight"+i).disabled = true;
                document.getElementById("price"+i).disabled = true;
                document.getElementById("total_amount"+i).disabled = true;
              }
              else {
                document.getElementById("packing"+i).disabled = false;
                document.getElementById("weight_unit"+i).disabled = false;
                document.getElementById("binding"+i).disabled = false;
                document.getElementById("net_weight"+i).disabled = false;
                document.getElementById("price"+i).disabled = false;
                document.getElementById("total_amount"+i).disabled = false;
              }
            }
          }
        


    
      </script>
@endsection