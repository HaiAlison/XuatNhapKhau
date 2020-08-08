@extends('master.masterpage')

@section('content')
<!-- Start Checkout Area -->
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

    <form action="{{ route('user.store-order') }} " method="post" enctype="multipart/form-data"> 
      @csrf
      <div class="form-group">
        <div class="col-lg-12 col-md-12">
          <div class="billing-details">
            <h3 class="title">Order</h3>

            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="form-group row">
                  <label for="poNo" class="col-sm-4 col-form-label">PO No.</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="id" id="poNo" placeholder="">
                    <input type="hidden" class="form-control form-control-sm" value="{{auth()->user()->id}}" name="user_id" >
                  </div>

                  <label for="po_date" class="col-sm-4 col-form-label">PO Date</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control form-control-sm" id="po_date" placeholder="" name="po_date" >
                  </div>

                  <label for="postatus" class="col-sm-4 col-form-label">PO status</label>
                  <div class="col-sm-8 select-box">
                    <select class="form-control form-control-sm" id="postatus" name="po_status_id">
                      @foreach($poStatuses as  $poStatus)
                      <option value="{{$poStatus->id}}">{{$poStatus->po_status}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="origin" class="col-sm-4 col-form-label">Origin</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" name="origin_id" id="origin">
                      @foreach($origins as $origin)
                      <option value="{{$origin->id}}">{{$origin->origin_name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="manufacturer" class="col-sm-4 col-form-label">Manufacturer</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="manufacturer" name="manufacturer_id">
                      @foreach($manufacturers as  $manufacturer)
                      <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="inputEmail3" class="col-sm-4 col-form-label">Supplier</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" name="supplier_id" id="supplier" >
                      @foreach($suppliers as  $supplier)
                      <option value="{{$supplier->id}}">{{$supplier->supplier}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="inputEmail3" class="col-sm-4 col-form-label">POL</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="pol" name="pol">
                      @foreach($pods as  $pol)
                      <option value="{{$pol->id}}">{{$pol->pod_name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="inputEmail3" class="col-sm-4 col-form-label">POD</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" name="pod" id="pod">
                      @foreach($pods as  $pod)

                      <option value="{{$pod->id}}">{{$pod->pod_name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="inputEmail3" class="col-sm-4 col-form-label">Incoterm</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="incoterm" name="incoterm_id">
                      @foreach($incoterms as  $incoterm)
                      <option value="{{$incoterm->id}}">{{$incoterm->incoterms}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="inputEmail3" class="col-sm-4 col-form-label">ETA requested</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control form-control-sm" id="eta_request" name="eta_request" placeholder="">
                  </div>

                  <label for="inputEmail3" class="col-sm-4 col-form-label">End Customer</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm"  id="end_customer" name="end_customer" placeholder="">
                  </div>

                  <div class="form-check col-sm-12">
                    <input type="checkbox" name="inspection_required" id="inspection_required" class="form-check-input" id="ship-different-address" value="1">
                    <input type="hidden" value="0" class="form-check-input" name="inspection_required" >
                    <label class="form-check-label" for="inspection_required">Inspection required</label>
                  </div>



                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Type of shipment</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="type_of_shipment" name="type_of_shipment" onchange="select()">
                      <option value="vessle">Vessle</option>
                      <option  value="container" >Container</option>
                    </select>
                  </div>

                  <label for="number_container" class="col-sm-4 col-form-label">Number of container</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="number_container" name="number_container" placeholder="" disabled="true">
                  </div>

                  <label for="container_size" class="col-sm-4 col-form-label">Container size</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="container_size" name="container_size_id" disabled="true">
                      @foreach($containerSizes as  $containerSize)
                      <option value="{{$containerSize->id}}">{{$containerSize->container_size}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="payload" class="col-sm-4 col-form-label">Payload (MT/Cont.)</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" step=".01" id="payload" name="payload" disabled="true" >
                  </div>

                  <label for="freight_target" class="col-sm-4 col-form-label">Freight target</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" step=".01" id="freight_target"  name="freight_target" placeholder="" disabled="true">
                  </div>

                  <label for="dthc_target" class="col-sm-4 col-form-label">DTHC target</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" step=".01" id="dthc_target" name="dthc_target" placeholder="" disabled="true">
                  </div>

                  <label for="cic_target" class="col-sm-4 col-form-label">CIC target</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" step=".01" id="cic_target" name="cic_target" placeholder="" disabled="true">
                  </div>

                  <label for="inputGroupFile01" class="col-sm-4 col-form-label">Link to specs file</label>
                  <div class="col-sm-8" style="bottom: 2.5px;">
                    <input type="file" class="form-control form-control-sm custom-file-input" name="link_to_specs" id="inputGroupFile01" accept=".jpg,.png,.bmp,.pdf,.txt,.xlsx,.docs,.doc,.xls" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01" style="right: 15px;left: 15px">Choose a file</label>

                  </div>

                  <label for="hs_code" class="col-sm-4 col-form-label">HS code</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="hs_code" name="hs_code" placeholder="">
                  </div>

                  <label for="co" class="col-sm-4 col-form-label">CO</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="co" name="co_id">
                      @foreach($cos as  $co)
                      <option value="{{$co->id}}">{{$co->certificate_of_origin}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="paymentterm" class="col-sm-4 col-form-label">Payment terms</label>
                  <div class="col-sm-8">
                    <select class="form-control form-control-sm" id="paymentterm" name="payment_term_id" onchange="optionTT()">
                      @foreach($paymentTerms as  $paymentTerm)
                      <option value="{{$paymentTerm->id}}">{{$paymentTerm->payment_terms}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label for="within_x_day" class="col-sm-4 col-form-label">Within # days</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" name="within_x_day" id="within_x_day" placeholder="">
                  </div>

                  <label for="inputEmail3" class="col-sm-4 col-form-label">Currency|Fx</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="currency" name="currency" placeholder="">
                  </div>

                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Marking</label>
                <div class="col-sm-12">
                  <textarea name="marking" id="notes" cols="30" rows="4" placeholder="" class="form-control"></textarea>
                </div>

              </div>

            </div>
            <!-- End row -->
          </div><br>
          <div class="billing-details">
            <h3 class="title">Order details</h3>

            <div class="row">
              <div class="col-lg-12 col-md-12">
                <form>
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

                      <tbody id="add-row">
                        <tr class="cal-amount">
                          <td class="product-thumbnail">
                            <select class="custom-select width-select"  id="product_id0" name="product_code_id[]"> 
                              @foreach($products as  $product)
                              <option value="{{$product->id}}">{{$product->product}}</option>
                              @endforeach
                            </select> 
                          </td>

                          <td class="product-name">
                            <div class="col-sm-12">
                              <select class="custom-select" id="packing_id0" name="packing_id[]"> 
                                @foreach($packings as  $packing)
                                <option value="{{$packing->id}}">{{$packing->packing}}</option>
                                @endforeach
                              </select>
                            </div>
                          </td>

                          <td class="product-price">
                            <div class="col-sm-12">
                              <select class="custom-select" id="weigh_unit_id0" name="weight_unit_id[]"> 
                               @foreach($weightUnits as  $weightUnit)
                               <option value="{{$weightUnit->id}}">{{$weightUnit->weight_unit}}</option>
                               @endforeach
                             </select>
                           </div>
                         </td>

                         <td class="product-quantity">
                          <div class="col-sm-12">
                            <select class="custom-select" id="binding_id0" name="binding_id[]"> 
                             @foreach($bindings as  $binding)
                             <option value="{{$binding->id}}">{{$binding->binding}}</option>
                             @endforeach
                           </select>
                         </div>
                       </td>

                       <td class="product-subtotal">
                        <div class="col-sm-12">
                          <input type="text" id="net_weight0" name="net_weight[]" step=".01" class="form-control form-control-md " placeholder="" >
                        </div>
                      </td>
                      <td class="product-subtotal">
                        <div class="col-sm-12">
                          <input type="text" id="price0" step=".01" name="price[]" class="form-control custom-input ">
                        </div>
                      </td>
                      <td class="product-subtotal" onkeydown="addRow()">
                        <div class="col-sm-12">
                          <input type="text" id="total_amount0" placeholder="" step=".01" name="total_amount[]" class="form-control form-control-md" readonly="">
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <br>
              <button type="submit" class=" col-md-12 btn btn-primary order-btn">Place Order</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
</section>
<!-- End Checkout Area -->
@endsection

@section('script')
<script>



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
           $('#number_container').prop('disabled',false);
           $('#container_size').prop('disabled',false);
           $('#payload').prop('disabled',false);
           $('#freight_target').prop('disabled',false);
           $('#dthc_target').prop('disabled',false);
           $('#cic_target').prop('disabled',false);
         }
         else{
           $('#number_container').prop('disabled', true);
           $('#container_size').prop('disabled', true);
           $('#payload').prop('disabled', true);
           $('#freight_target').prop('disabled', true);
           $('#dthc_target').prop('disabled', true);
           $('#cic_target').prop('disabled', true);
         }
       }
       function optionTT(){
        var selectedVal = $("#paymentterm option:selected").val();
        if(selectedVal ==='PaymentTerms_TT'){
         $('#within_x_day').prop('readonly', true);
         $('#within_x_day').attr('min',0);
         $('#within_x_day').val("0");
       }
       else {
         $('#within_x_day').prop('readonly', false);
         $('#within_x_day').attr('min',1);
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
          var table = $("#add-row");

          table.append('  <tr class="cal-amount">\
            <td class="product-name">\
            <select class="custom-select width-select changeId"  id="product0" name="product_code_id[]" onchange="NullProduct(this)">\
            <option selected></option>\
            @foreach($products as  $product)\
            <option value="{{$product->id}}">{{$product->product}}</option>\
            @endforeach\
            </select>\
            </td>\
            \
            <td class="packing">\
            <div class="col-sm-12">\
            <select class="custom-select changeId" id="packing0" name="packing_id[]" disabled>\
            @foreach($packings as  $packing)\
            <option value="{{$packing->id}}">{{$packing->packing}}</option>\
            @endforeach\
            </select>\
            </div>\
            </td>\
            \
            <td class="product-price">\
            <div class="col-sm-12">\
            <select class="custom-select changeId" id="weight_unit0" name="weight_unit_id[]" disabled>\
            @foreach($weightUnits as  $weightUnit)\
            <option value="{{$weightUnit->id}}">{{$weightUnit->weight_unit}}</option>\
            @endforeach\
            </select>\
            </div>\
            </td>\
            \
            <td class="binding">\
            <div class="col-sm-12">\
            <select class="custom-select changeId" id="binding0" name="binding_id[]" disabled>\
            @foreach($bindings as  $binding)\
            <option value="{{$binding->id}}">{{$binding->binding}}</option>\
            @endforeach\
            </select>\
            </div>\
            </td>\
            \
            <td class="product-subtotal">\
            <div class="col-sm-12">\
            <input type="text" id="net_weight0" name="net_weight[]" step=".01" class="form-control form-control-md changeId" placeholder="" disabled>\
            </div>\
            </td>\
            <td class="product-subtotal">\
            <div class="col-sm-12">\
            <input type="text" id="price0" placeholder="" name="price[]" class="form-control custom-input changeId" disabled>\
            </div>\
            </td>\
            <td class="product-subtotal" onkeydown="addRow()">\
            <div class="col-sm-12">\
            <input type="text" id="total_amount0" placeholder="" step=".01" name="total_amount[]" class="form-control form-control-md changeId" disabled>\
            </div>\
            </td>\
            </tr>')
          
        }//change id.
        $('#add-row').find('.changeId').each(function(){
              var id = $(this).attr('id') || null ; //lấy id ra
              if(id){
              var i = id.substr(id.length-1); //lấy chỉ số ra
              var prefix = id.substr(0,id.length-1); //lấy tiền tố của id (id-chỉ số)
              $(this).attr('id', prefix+(+i+1)); //tăng id (tiền tố + chỉ số + 1)
            }
          })
        $(".cal-amount").on('keyup',function(){
          var net = 0, price = 0;
          var amount = $(this).find($("input[id*='total_amount']"));
          $(this).find($("input[id*='net_weight']")).each(function(k,v){
           id = $(this).attr('id');

           net = parseFloat(v.value);
           console.log(net);
           return false;
         })
          $(this).find($("input[id*='price']")).each(function(k,v){
           id = $(this).attr('id');

           price = parseFloat(v.value);
           console.log(price);
           amount.attr('value',net+price);
           return false;
         })
          
        });
      }

      function NullProduct(t){
       var id = t.id;
       console.log("id",id);
       var i = id.substr(id.length-1);
       y= $("#"+id).children('option:selected').val() || null; 
       if(y==null){
        $("#packing"+i).prop('disabled',true);
        $("#weight_unit"+i).prop('disabled',true);
        $("#binding"+i).prop('disabled',true);
        $("#net_weight"+i).prop('disabled',true);
        $("#price"+i).prop('disabled',true);
        $("#total_amount"+i).prop('disabled',true);
      }
      else {
        $("#packing"+i).prop('disabled',false);
        $("#weight_unit"+i).prop('disabled',false);
        $("#binding"+i).prop('disabled',false);
        $("#net_weight"+i).prop('disabled',false);
        $("#price"+i).prop('disabled',false);
        $("#total_amount"+i).prop('disabled',false);
        $("#total_amount"+i).prop('readonly',true);
      }

    }
    $( document ).ready(function() {
      $(".cal-amount").on('keyup',function(){
        var net = 0, price = 0;
        var amount = $(this).find($("input[id*='total_amount']"));
        $(this).find($("input[id*='net_weight']")).each(function(k,v){
         id = $(this).attr('id');

         net = parseFloat(v.value);
         console.log(net);
         return false;
       })
        $(this).find($("input[id*='price']")).each(function(k,v){
         id = $(this).attr('id');

         price = parseFloat(v.value);
         console.log(price);
         amount.attr('value',net+price);
         return false;
       })
        
      });
    })
  </script>
  @endsection