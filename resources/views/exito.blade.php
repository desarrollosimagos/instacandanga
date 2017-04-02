@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="disabled"><a href="#step-1">
                    <h4 class="list-group-item-heading">Paso 1</h4>
                    <p class="list-group-item-text">Datos Personales</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Paso 2</h4>
                    <p class="list-group-item-text">Verificar datos de Contacto</p>
                </a></li>
                <li class="active"><a href="#step-3">
                    <h4 class="list-group-item-heading">Paso 3</h4>
                    <p class="list-group-item-text">Registro Exitoso</p>
                </a></li>
            </ul>
        </div>
	</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-12 well setup-content text-center" id="step-3">
                <h1>Registro Exitoso.</h1>
                    <div class="alert alert-success">
                        Felicitaciones se ha registrado con el siguiente numero de identificacion en el sistema.
                    </div>
                    <h1>mrd-00{{ $id }}</h1>
            </div> 
        </div>
    </div>
</div>



@endsection

@section('js')
	
	
@endsection