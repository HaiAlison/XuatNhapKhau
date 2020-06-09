@extends('master.masterpage')

@section('content')
Hello {{auth()->user()->firstname}}
@endsection