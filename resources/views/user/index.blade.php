@extends('master.masterpage')
@section('content')
<div> Hello {{auth('web')->user()->firstname}}</div>
@endsection