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