@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:-22px;width:100%;margin-left:-15px;">
    <div class="row">
        <div class="col-md-6 text-left hidden-xs hidden-sm" style="clip:rect(20px 205px 110px 55px);">
        <a href="{{ url('/registrar') }}">
        <img src="{{ url('img/izq.png') }}" style="margin-left:-110px; ">
        </a>
        </div>
        <div class="col-md-6 text-right">
        <a href="{{ url('/registrar') }}">
        <img src="{{ url('img/der.png') }}" style="margin-right:-90px;">
        </a>
        </div>
    </div>
</div>

@endsection