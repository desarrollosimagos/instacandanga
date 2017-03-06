@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    @if (Session::has('error'))
                        <div class="alert alert-warning alert-dismissable">
                            <strong>¡Error!</strong> {{ session('error') }}
                        </div>
                        <a href="/registrar" class="btn btn-primary">
                            Volver al registro.
                        </a>
                    @else
                        @if (Session::has('instagram_id'))
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <div class="thumbnail">
                                        <img src="{{ session('avatar') }}" alt="...">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <h1>Cuenta de Instagram:</h1>
                                    <h1 style='font-family: "Homer Simpson", cursive;'>{{ session('handle') }}</h1>
                                </div>
                            </div>

                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <input id="instagram_id" type="hidden" name="instagram_id" value="{{ session('instagram_id') }}">

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label"></label>

                                    <div class="col-md-6">
                                        <ul>
                                            <li style="list-style-type: none;"><input type="radio" name="tipo_user" value="colectivo" id="tipo_user1"> Soy un colectivo.</li>
                                            <li style="list-style-type: none;"><input type="radio" name="tipo_user" value="natural" id="tipo_user2"> Soy una persona.</li>
                                        </ul>
                                        
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" id="nombre_cuenta" class="col-md-4 control-label">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div id="div_rif" class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
                                    <label for="name" id="rif_cuenta" class="col-md-4 control-label">Rif</label>

                                    <div class="col-md-6">
                                        <input id="rif" type="text" class="form-control" name="rif" value="{{ old('rif') }}" required autofocus>

                                        @if ($errors->has('rif'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('rif') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div id="div_direccion" class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                    <label for="direccion" class="col-md-4 control-label">Dirección</label>

                                    <div class="col-md-6">
                                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required autofocus>

                                        @if ($errors->has('direccion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('direccion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div id="div_objetivos" class="form-group{{ $errors->has('objetivos') ? ' has-error' : '' }}">
                                    <label for="objetivos" class="col-md-4 control-label">Objetivos</label>

                                    <div class="col-md-6">
                                        <input id="objetivos" type="text" class="form-control" name="objetivos" value="{{ old('objetivos') }}" required autofocus>

                                        @if ($errors->has('objetivos'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('objetivos') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Telefono</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-warning alert-dismissable">
                                <strong>¡Error!</strong> Se presento error. Vuelva a intentarlo.
                            </div>
                            <a href="/registrar" class="btn btn-primary">
                                Volver al registro.
                            </a>
                        @endif
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript">

$(function () {
    $( "#tipo_user1" ).click(function() {
        $( "#nombre_cuenta" ).html('Nombre o Razón Social');
        $( "#div_rif" ).show();
        $( "#div_direccion" ).show();
        $( "#div_objetivos" ).show();
    });

    $( "#tipo_user2" ).click(function() {
        $( "#nombre_cuenta" ).html('Nombre y Apellido');
        $( "#div_rif" ).hide();
        $( "#div_direccion" ).hide();
        $( "#div_objetivos" ).hide();
    });
});

</script>

@endsection
