@extends('master.masterpage-admin')
@section('content')

<div id="room" class="mb-3 pt-3 pb-2">
    <div id="room" class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.binding')}}" class="btn btn-sm btn-outline-secondary">
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
                <th>@isset($another)
                        {{ $another }}
                    @endisset
                	</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
         @foreach($nameToForeach as $binding)
            <tr >
                <td class="text-break w-25" >{{$binding->id}}</td>
                <td   class="text-break w-25" >{{$binding->$name}}</td>            
                <td   class="text-break w-50" >{{$binding->$another}}</td>            
                <td><a href="{{ route('admin.edit-binding',['id'=>$binding->id]) }}" class="btn btn-sm btn-outline-secondary w-100">edit</a></td>
                <td><a href="#"  class="btn btn-sm btn-outline-secondary w-100" >delete</a></td>
            </tr> 
         @endforeach
        </tbody>
    </table>
</div>
@endsection