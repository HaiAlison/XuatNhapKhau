@extends('master.masterpage-admin')
@section('content')
<input type="hidden" {{$key = array_keys($name)[0]}}>
@if(isset($data)) 
    <form class="needs-validation" novalidate action="{{route('admin.update-'.$key,['id'=>$data->id])}}" method="post">
    @else
    <form class="needs-validation" novalidate action="{{route('admin.store-'.$key)}}" method="post">
@endif
    @csrf
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputName">Id</label>
            <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
            <input type="text" class="form-control" id="inputId" name="id" placeholder="" @if(isset($data)) value="{{$data->id}}" @endif>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputCapacity">{{ array_values($name)[0] }}</label>
            <input type="text" class="form-control" id="inputBinding" name="{{ $key }}" placeholder="" @if(isset($data))   value="{{$data->$key}}" @endif>
        </div>
    </div>
    @if(isset($another))
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <?php foreach ($another as $key => $value): ?>
            <label for="inputCapacity">{{$value}}</label>
            <textarea type="text" class="form-control text-break" id="inputBinding" name="{{$value}}" placeholder="" >@if(isset($data)) {{$data->$key}} @endif</textarea>
            <?php endforeach ?>

        </div>
    </div>
    @endif
    <hr class="mb-4">
    <button class="btn btn-primary" type="submit">Save change</button>
    <a href="{{ route('admin.tables') }}" class="btn btn-link">Cancel</a>
</form>
@endsection