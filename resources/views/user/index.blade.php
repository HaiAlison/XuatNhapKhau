@extends('master.masterpage')

@section('content')



<form class="user">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="PO No.">
					</div>
                  	<div class="col-sm-6 ">
                  	 	<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text"  for="typeofshipment">Type of shipment</label>
							</div>
							<div class="custom-file">
							<input list="browsers" class="custom-select" id="typeofshipment" name="typeofshipment">
							  	<datalist id="browsers">
								  <option value="Vessle"/>
								  <option value="Container"/>
								</datalist>
							</div>
	                  	</div>
                  </div>
                </div>
                <div class="form-group row">
			    	<div class='col-sm-6'>
                		<input type='text' class=" date form-control form-control-user" placeholder="PO Date" readonly="true" />
		            </div>
					<div class="col-sm-6">
						<input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Number of container">
					</div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="PO Status">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Container size">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Origin">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Payload (MT/Conts.)">
                  </div>
                </div>
                <div class="form-group">
                	<label for="exampleFormControlTextarea">Market</label>
                  	<textarea class="form-control " id="market" ></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="" placeholder="Manufacturer">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="Freight target">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="" placeholder="Supplier">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="DTHC target">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="" placeholder="POL">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="CIC target">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="" placeholder="POD">
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupFileAddon01">Link to specs file</span>
							</div>
							<div class="custom-file">
							<input type="file" class="custom-file-input" id="inputGroupFile01"
							  aria-describedby="inputGroupFileAddon01">
							<label class="custom-file-label" for="inputGroupFile01">Choose a file</label>
						</div>
					</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="" placeholder="Incoterms">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="HS code">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control date form-control-user" name="" placeholder="ETA requested">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="CO">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="" placeholder="End Customer">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="Payment terms">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 d-flex mb-sm-0" >
                    <input type="checkbox" class="form-control 
                     form-control-user" id="checked" style="width: 30px;height: 40px;" name="" value=""/><label class="text-center" for="checked"><span class=" text-nowrap" >&nbsp;&nbsp;Inspection required</span></label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="Within # days">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 d-flex mb-sm-0" >
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"  name="" placeholder="Currency|Fx">
                  </div>
                </div>
                
                <a href="login.html" class="btn btn-primary btn-user btn-block">
                  Register Account
                </a>
                
               
              </form>
@endsection
@section('script')

<script type="text/javascript">
	   $('.date').datetimepicker({

        format: 'DD/MM/YYYY',
        ignoreReadonly: true
    }); 

    </script>
    <script>
            $('#inputGroupFile01').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', " ");
                //replace the "Choose a file" label

                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
@endsection