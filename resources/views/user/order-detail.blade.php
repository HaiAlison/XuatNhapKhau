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
<form action="{{route('user.store-order-detail')}}" method="post" id="form" >
    @csrf

       <!--  <div class="form-group row save">
            <input type="text" class="save" id="id" placeholder="Name" name="id[]">
            <input type="text" class="save" id="product_code_id" placeholder="product id" name="product_code_id[]" >
            
            <input type="text" class="save" id="weight_unit_id" placeholder="" name="weight_unit_id" >
            <input type="text" class="save"  id="packing_id" placeholder="" name="packing_id[]" >
            <input type="text" class="save" id="binding_id" placeholder="" name="binding_id[]">
            <input type="text" class="save" id="net_weight_id" placeholder="" name="net_weight_id[]" >
            <input type="text" class="save" id="price" placeholder="" name="price[]" >
            <input type="text" class="save" id="total_amount" placeholder="" name="total_amount[]" >
        </div>
        <div class="form-group row save">
            <input type="text" class="save" id="id" placeholder="Name" name="id[]">
            <input type="text" class="save" id="product_code_id" placeholder="product id" name="product_code_id[]" >
            
            <input type="text" class="save" id="weight_unit_id" placeholder="" name="weight_unit_id" >
            <input type="text" class="save"  id="packing_id" placeholder="" name="packing_id[]" >
            <input type="text" class="save" id="binding_id" placeholder="" name="binding_id[]">
            <input type="text" class="save" id="net_weight_id" placeholder="" name="net_weight_id[]" >
            <input type="text" class="save" id="price" placeholder="" name="price[]" >
            <input type="text" class="save" id="total_amount" placeholder="" name="total_amount[]" >
        </div> -->
    <div class="form-group row save">
        <div class='col-sm-4'>
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text"  for="po_date">PO Date</label>
            </div>
            <div class="custom-file">
              <select class="custom-select" name="name[]">
                 @foreach($orderDetails as $order)
                <option data-value="{{$order->id}}">{{$order->product_code_id}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class='col-sm-4'>
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text"  for="po_date">PO Date</label>
            </div>
            <div class="custom-file">
              <select class="custom-select" name="email[]">
                 @foreach($orderDetails as $order)
                <option data-value="{{$order->id}}">{{$order->product_code_id}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class='col-sm-4'>
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text"  for="po_date">PO Date</label>
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