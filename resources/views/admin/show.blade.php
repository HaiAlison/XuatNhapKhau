@extends('master.masterpage-admin')
@section('content')
<div class="row">
    @if(!isset($del))
    <div id="room" class="col-lg-6 mb-3 pt-3 pb-2">
        <div id="room" class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.create-'.$name)}}" class="btn btn-sm btn-outline-secondary">
                    Create new @isset($title) {{ $title }} @endisset
                </a>
            </div>
        </div>
    </div>
    <div id="room" class="col-lg-6 mb-3 pt-3 pb-2">
        <div id="room" class="btn-toolbar mb-2 mb-md-0 float-right">
            <div class="btn-group mr-2">
                <a href="{{ isset($role) ? route('admin.trash-'.$name,['role' => $role] ): route('admin.trash-'.$name)}}" class="btn btn-sm btn-outline-secondary">

                 Restore
             </a>

         </div>
     </div>
 </div>
 @else
 <div id="room" class="col-lg-6 mb-3 pt-3 pb-2">
    <div id="room" class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
         <h3> Restore</h3>
     </div>
 </div>
</div>
<div id="room" class="col-lg-6 mb-3 pt-3 pb-2">
    <div id="room" class="btn-toolbar mb-2 mb-md-0 float-right">
        <div class="btn-group mr-2">
            <a href="{{$back}}" class="btn btn-sm btn-outline-secondary">
             Back
         </a>
     </div>
 </div>
</div>
@endif
</div>
<div class="table-responsive rooms">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th >@isset($title)
                   {{ $title }}
                   @endisset
               </th>
               @if(isset($another))
               <?php foreach ($another as $key => $value): ?>
                <th>
                    {{ $value }}
                </th> 
            <?php endforeach ?>
            @endif
            <th></th>
            <th></th>

        </tr>
    </thead>
    <tbody>
     @foreach($nameToForeach as $binding)
     <tr >

        <td class="text-break" >{{$binding->id}}</td>
        <td class="text-break " >{{$binding->$name}}</td>
        @if(isset($another))
        <?php  foreach ($another as $key => $value): ?>
            <td class="text-break " >{{$binding->$key}}</td>
        <?php endforeach ?>
        @endif
        @if(isset($role))
        <td><a href="{{ route('admin.edit-admin',['role' => $role,'id'=>$binding->id]) }}" class="btn btn-sm btn-outline-secondary w-100">edit</a></td>
        <td><a href="{{ route('admin.delete-'.$name,['id'=>$binding->id]) }}"  class="btn btn-sm btn-outline-secondary w-100" >delete</a></td>
        @elseif(isset($del))
        <td><a href="{{ route('admin.restore-'.$name,['role' => $rol,'id'=>$binding->id]) }}" class="btn btn-sm btn-outline-secondary w-100">Restore</a></td>
        <td><a href="#" data-toggle="modal" data-target="#forceDeleteModal"  data-id="{{ $binding->id }}" class="btn btn-sm btn-outline-secondary w-100 getForceId" >Force delete</a></td>
        @else
        <td><a href="{{ route('admin.edit-'.$name,['id'=>$binding->id]) }}" class="btn btn-sm btn-outline-secondary w-100">Edit</a></td>
        <td><a  class="btn btn-sm btn-outline-secondary w-100 getID"  data-id="{{ $binding->id }}" data-toggle="modal" data-target="#deleteModal" >Delete </a></td>
        @endif
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body body"></div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" id="deleteRow">Delete</a>
                    </div>
                </div>
            </div>
        </div>   
        <div class="modal fade" id="forceDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body body"></div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" id="forceDeleteRow">Force Delete</a>
                    </div>
                </div>
            </div>
        </div>   
    </tr> 
    @endforeach
</tbody>
</table>
</div>

@endsection
@section('script')
<script>
$(".getID").click(function(){
    var id = $(this).attr('data-id');
    $(".body").html('Do you want to delete this '+id+'?');
    var url = '{{ route("admin.delete-".$name,":id" )}}';
    url = url.replace(':id',id);
    $("#deleteRow").attr('href',url);
    console.log(url);
})
$(".getForceId").click(function(){
    var id = $(this).attr('data-id');
    $(".body").html('Do you want to delete this '+id+'?');
    var url = '{{ route("admin.force-".$name,":id" )}}';
    url = url.replace(':id',id);
    $("#forceDeleteRow").attr('href',url);
})
</script>
@endsection