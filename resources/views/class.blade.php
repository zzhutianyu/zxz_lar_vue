@extends('test')

@section('name')
    <h3>test</h3>
    @foreach($class as $k => $v)
    <h3>{{ $k . $v}}</h3>
    @endforeach

@endsection