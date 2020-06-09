@extends('master.masterpage')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
        </div>
    </div>


@endsection


@section('script')


<script>
    // $(document).ready(function(){
    //     $(".add-row").click(function(){
    //         var a = $("#a").val();
    //         var b = $("#b").val();
    //         var c = $("#c").val();
    //         var markup = "<tr><td><input type='checkbox' name='record'></td><td name='a'>" + a + "</td><td name='b'>" + b + "</td><td name='c'>" + c + "</td></tr>";
    //         $("table tbody").append(markup);
    //     });
        
    //     $(document).ready(function () {
    //         $('#post-data').submit(function (e) {
    //             e.preventDefault()  // prevent the form from 'submitting'

    //             var url = e.target.action  // get the target
    //             var formData = $(this).serialize() // get form data
    //             $.post(url, formData, function (response) { // send; response.data will be what is returned
    //                 alert('report sent');
    //             });
    //         });
    //     });

    //     // Find and remove selected table rows
    //     $(".delete-row").click(function(){
    //         $("table tbody").find('input[name="record"]').each(function(){
    //         	if($(this).is(":checked")){
    //                 $(this).parents("tr").remove();
    //             }
    //         });
    //     });
    // });


    // jQuery, bind an event handler or use some other way to trigger ajax call.
$('.add-row').submit(function( event ) {
    event.preventDefault();
    $.ajax({
        url: event.target.action,
        type: 'post',
        data: $('.add-row').serialize(), // Remember that you need to have your csrf token included
      
    });
});    
</script>


@endsection