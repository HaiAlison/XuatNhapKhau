@extends('master.masterpage')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    input:last-child     {
       
    }
   
    div .save:first-child{
        background: blue;
    }
</style>
@endsection

@section('content')
<form action="{{route('user.store-order-detail')}}" method="post" >
	@csrf

        <input type="text" id="id" placeholder="Name" name="id">
        <input type="text" id="product_code_id" placeholder="Name" name="product_code_id">
        <input type="text" id="product_name_id" placeholder="" name="product_name_id">
        <input type="text" id="weight_unit_id" placeholder="" name="weight_unit_id">
        <input type="text" id="packing_id" placeholder="" name="packing_id">
        <input type="text" id="binding_id" placeholder="" name="binding_id">
        <input type="text" id="net_weight_id" placeholder="" name="net_weight_id">
        <input type="text" id="price" placeholder="" name="price">
        <input type="text" id="total_amount" placeholder="" name="total_amount">
    	<input type="submit" class="add-row" id="post-data" value="Add Row">
    </form>
    


<div class="card-body ">
        <div class="table-responsive hidden-scrollbar">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table  class="table table-bordered dataTable " id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Product code</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 246px;">Product name</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 116px;">Weight unit</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Binding</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 107px;">Net Weight (MT)</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 97px;">Price/MT</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 97px;">Total amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderDetails as $orderDetail)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$orderDetail->product_code}}</td>
                                    <td>{{$orderDetail->product_name}}</td>
                                    <td>{{$orderDetail->weight_unit}}</td>
                                    <td>{{$orderDetail->binding_id}}</td>
                                    <td>{{$orderDetail->net_weight_id}}</td>
                                    <td>{{$orderDetail->price}}</td>
                                    <td>{{$orderDetail->total_amount}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="custom-file">
              <input type="text" name="ok" class="custom-input" readonly="true" value="12938123">
            </div>
          </div>
        </div>

   

    <!-- <div class="col-sm-4 ">
        <div class="input-group">
            <div class="input-group-prepend"> 
            <label class="input-group-text"  for="type_of_shipment">Type of shipment</label>
            </div>   
            <div class="custom-file">   
                <input list="suggestionList" id="answerInput" class="custom-select">

                <datalist id="suggestionList">
                    @foreach($orderDetails as $order)
                    <option data-value="{{$order->id}}">{{$order->product_code_id}}</option>
                    @endforeach
                </datalist>
                <input type="hidden" name="email" id="answerInput-hidden">
            </div>
        </div>  
    </div> 
    <div class="col-sm-4 ">
        <div class="input-group">
            <div class="input-group-prepend"> 
            <label class="input-group-text"  for="type_of_shipment">Type of shipment</label>
            </div>   
            <div class="custom-file">   
                <input list="suggestionList" id="answerInput" class="custom-select">

                <datalist id="suggestionList">
                    @foreach($orderDetails as $order)
                    <option data-value="{{$order->id}}">{{$order->product_code_id}}</option>
                    @endforeach
                </datalist>
                <input type="hidden" name="email" id="answerInput-hidden">
            </div>
        </div>  
    </div>  -->
</div>

        <button type="submit">post</button>
    </form>
   
<hr>



@endsection


@section('script')


<script>

    //querySelector(cssSelector[]) dùng để trỏ đến tag list trong thẻ input
// document.querySelector('input[list]').addEventListener('input', function(e) {
//     var input = e.target, //lấy nguyên 1 thẻ input
//         list = input.getAttribute('list'), //lấy giá trị trong tag list

//         options = document.querySelectorAll('#' + list + ' option'), //ở đây là truy vấn các option theo id của datalist(input).
//         hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'), //lấy id hidden từ input rồi + chuỗi hidden là ra id của hidden input.
//         inputValue = input.value; //lấy value của input để gán dzô hidden input
        
//     hiddenInput.value = inputValue;

//     for(var i = 0; i < options.length; i++) {
//         var option = options[i];

//         if(option.innerText === inputValue) { //so sánh từng option với value của input rồi lấy data-value từ option gán vô hiddenInput
//             hiddenInput.value = option.getAttribute('data-value');
//             break;
//         }
//     }
// });



$(document).ready(function(){

    $(document).on("focus",'#form input:last',function() {
        //append the new row here.
            var table = $("#form");
             
            table.append('<div class="col-sm-4">\
          <div class="input-group">\
            <div class="input-group-prepend">\
              <label class="input-group-text"   for="po_date">PO Date</label>\
            </div>\
            <div class="custom-file">\
              <select class="custom-select save" id="name" name="name[]" required>\
                <option selected value="" id="test" readonly>CHọn đi baf</option>\
                 @foreach($orderDetails as $order)\
                <option data-value="{{$order->id}}">{{$order->product_code_id}}</option>\
                @endforeach\
              </select>\
            </div>\
          </div>\
        </div><div class="col-sm-4">\
          <div class="input-group">\
            <div class="input-group-prepend">\
              <label class="input-group-text"  for="po_date">PO Date</label>\
            </div>\
            <div class="custom-file">\
              <select class="custom-select save" id="email" name="email[]" >\
                 @foreach($orderDetails as $order)\
                <option data-value="{{$order->id}}">{{$order->product_code_id}}</option>\
                @endforeach\
              </select>\
            </div>\
          </div>\
        </div><div class="col-sm-4">\
          <div class="input-group">\
            <div class="input-group-prepend">\
              <label class="input-group-text" for="po_date">PO Date</label>\
            </div>\
            <div class="custom-file">\
                            <input type="text" name="ok" id="ok" class="custom-input save" readonly="true" value="12938123">\
            </div>\
          </div>\
        </div>')
      var ids = $(this).attr('id') || null;
             $(this).find('#ok').attr('id',ids+1);
             
        
    }); 
    // $( "#form" ).submit(function( event ) {
    //             event.preventDefault();
    //             var url= event.target.action;
    //             postAjax(url);
    //             console.log("ok");
    // })
}); 
    
$(function(){
    $('li').each(function(index){
        $(this).click(function(){
            var id = $('.save').attr('id');
            $(this).attr("id",''+index);//lấy được id của từng element + index
        });
    });
});
    
 
// function postAjax($uri){
//     $.ajax({
//                 url: $uri,
//                 type: 'post',
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 data: $('.save').serialize(),
                
//             });
//  }

   
</script>


@endsection