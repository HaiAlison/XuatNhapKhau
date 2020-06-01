@extends('master.masterpage')
@section('content')

@if(isset($binding))  
    <form class="needs-validation" novalidate action="{{route('admin.update-binding',['id'=>$binding->id])}}" method="post">
    @else
    <form class="needs-validation" novalidate action="{{route('admin.store-binding')}}" method="post">
@endif
    @csrf
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputName">Id</label>
            <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
            <input type="text" class="form-control" id="inputId" name="id" placeholder="" @if(isset($binding)) value="{{$binding->id}}" @endif>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputCapacity">Binding</label>
            <input type="text" class="form-control" id="inputBinding" name="binding" placeholder="" @if(isset($binding)) value="{{$binding->binding}}" @endif>
        </div>
    </div>

    <hr class="mb-4">
    <button class="btn btn-primary" type="submit">Save binding</button>
    <a href="#" class="btn btn-link">Cancel</a>
</form>
@endsection