@extends('master.masterpage-admin')
@section('content')
<div id="room" class="mb-3 pt-3 pb-2">
    <div id="room" class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
                Restore	
        </div>
    </div>
</div>

<div class="table-responsive rooms">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
         @foreach($nameToForeach as $binding)
            <tr >
                <td class="text-break" >{{$binding->id}}</td>
                <td class="text-break " ></td>
                @if(isset($another))
                    <?php  foreach ($another as $key => $value): ?>
                    <td class="text-break " >{{$binding->$key}}</td>
                    <?php endforeach ?>
                @endif
                <td><a href="#" class="btn btn-sm btn-outline-secondary w-100">Restore</a></td>
                <td><a href="#"  class="btn btn-sm btn-outline-secondary w-100" >delete</a></td>
            </tr> 
         @endforeach
        </tbody>
    </table>
</div>
@endsection