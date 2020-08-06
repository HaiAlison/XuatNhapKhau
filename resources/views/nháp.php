<div id="room" class="mb-3 pt-3 pb-2">
    
        <div id="room" class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.binding')}}" class="btn btn-sm btn-outline-secondary">
                    Create new Binding
                </a>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive rooms">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th >Binding</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
         @foreach($bindings as $binding)
            <tr >
                <td class="text-break w-25" >{{$binding->id}}</td>
                <td   class="text-break w-50" >{{$binding->binding}}</td>            
                <td><a href="{{ route('admin.edit-binding',['id'=>$binding->id]) }}" class="btn btn-sm btn-outline-secondary w-100">edit</a></td>
                <td><a href="#"  class="btn btn-sm btn-outline-secondary w-100" >delete</a></td>
            </tr> 
         @endforeach
        </tbody>
    </table>
</div>



vấn đề 1: lưu overseas và 2 dòng local sau khi ấn submit
vấn đề 2: lưu file excel, lưu tất cả (đã xong), và lưu cho chọn từng mục.
    cách 1: modal, cho chọn từng cái.
    cách 2: show table-> checkbox chọn từng dòng(choose) -> xong vào controller if(checked)



    //raw để dùng các hàm tính toán (count);
       $paymentLocal = PaymentLocal::selectRaw('count(*) AS id, po_no_id, ANY_VALUE(sub_po_no_id) as sub_po')->groupBy('po_no_id')->orderBy('id', 'DESC')->get();


       whereBetween('po_date',[$start,$end])
        ->or



        @extends('master.masterpage')
@section('css')
<style type="text/css">
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    address div{
        height: 30px;
    }
    input{
        position: absolute;
        right: 900px;
        }
</style>
@endsection
@section('report')
<a href="{{route('user.print')}}" class="btn"> print</a>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h3 class="pull-right">8.4_MVN_06_18_F02 : PURCHASE ORDER</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <div><strong>Author</strong><input type="text" name="author"/></div>
                        <div><strong>Country/Affiliate</strong><input type="text" name="author"/></div>
                        <div><strong>BU/Department</strong><input type="text" name="author"/></div>
                        <div><strong>Responsibility Area</strong><input type="text" name="author"/></div>
                        <div><strong>Original Date of Issue</strong><input type="date" style="width:184px" name="author"/></div>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        jsmith@email.com
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        March 7, 2014<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td>BS-200</td>
                                    <td class="text-center">$10.99</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right">$10.99</td>
                                </tr>
                                <tr>
                                    <td>BS-400</td>
                                    <td class="text-center">$20.00</td>
                                    <td class="text-center">3</td>
                                    <td class="text-right">$60.00</td>
                                </tr>
                                <tr>
                                    <td>BS-1000</td>
                                    <td class="text-center">$600.00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right">$600.00</td>
                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">$670.99</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">$15</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">$685.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
