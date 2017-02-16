@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5><a href="/home">inicio</a> / google</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <a href="/auth/google" class="btn btn-primary" role="button">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar cuenta
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <br>
                        </div>
                    </div>
                    <div class="row">

                        @foreach ($google as $key => $lnk)
                            <div class="col-sm-3 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{ $lnk->avatar }}" alt="...">
                                    <div class="caption">
                                        <h3>{{ $lnk->handle }}</h3>
                                        <p><a href="#" class="btn btn-primary" role="button">Eliminar</a> 
                                        <a href="#" class="btn btn-default" role="button">Publicar</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
