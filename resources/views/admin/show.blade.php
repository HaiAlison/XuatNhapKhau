@extends('master.masterpage-admin')
@section('content')

<div id="room" class="mb-3 pt-3 pb-2">
    <div id="room" class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.create-'.$name)}}" class="btn btn-sm btn-outline-secondary">
                Create new @isset($title) {{ $title }} @endisset
            </a>
        </div>
    </div>
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
                <td><a href="{{ route('admin.edit-admin',['role'=>$role,'id'=>$binding->id]) }}" class="btn btn-sm btn-outline-secondary w-100">edit</a></td>
                <td><a href="#"  class="btn btn-sm btn-outline-secondary w-100" >delete</a></td>
                @else
                <td><a href="{{ route('admin.edit-'.$name,['id'=>$binding->id]) }}" class="btn btn-sm btn-outline-secondary w-100">edit</a></td>
                <td><a href="#"  class="btn btn-sm btn-outline-secondary w-100" >delete</a></td>
                @endif
            </tr> 
         @endforeach
        </tbody>
    </table>
</div>
@endsection