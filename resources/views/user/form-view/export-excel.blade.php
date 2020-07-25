<form action="{{ route('user.excel')}}" method="get">
	@csrf
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
								<input type="date" class="form-control form-control-sm" name="start_date" id="start">
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="form-group row">
							<label   class="col-sm-1 col-form-label">To:</label>
							<div class="col-sm-8">
								<input type="date" class="form-control form-control-sm" name="end_date" id="end" >
							</div>
							<a class="btn" style="bottom: 10px" id="showToExport">Show</a>
						</div>
					</div>
					<div class="show-null" id="null"></div>

					<div class="col-lg-6 col-md-12">
						<div class="drop row" style="display: none; margin-bottom: 30px;">
							<label class="col-sm-4 col-form-label text-left">PO No.</label>
							<div class="multiselect" >
							    <div class="selectBox" onclick="showCheckboxes()">
							      	<select>
							        	<option>Select PO No.</option>
							      	</select>
							      	<div class="overSelect"></div>
							    </div>
							    <div id="checkboxes" class="po_no">
							    	<label class="text-left"><input type="checkbox" id="checkAll"/> Choose all PO No.</label>
							    </div>
						  	</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="drop row" style="display: none; margin-bottom: 30px;">
							<label class="col-sm-4 col-form-label">Sub PO No.</label>
						  	<div class="multiselect ">
							    <div class="selectBox" onclick="showSubCheckboxes()">
							      	<select>
							        	<option>Select Sub PO No.</option>
							      	</select>
							      	<div class="overSelect"></div>
							    </div>
							    <div id="checkboxesSub" class="sub_po">
							    	<label class="text-left"><input type="checkbox" id="checkSubAll"/> Choose all Sub PO No.</label>
							    </div>
						  	</div>
						</div>
					</div>
					<button class=" col-md-12 btn btn-primary export-btn" type="submit" style="display: none;">export excel</button>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	
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