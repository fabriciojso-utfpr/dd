@extends('layout')
@section('content')
    <h1>{{ $titulo }}</h1>
    <hr />
    <div style="margin-bottom: 20px;">
        {!! form($form) !!}
    </div>
@endsection