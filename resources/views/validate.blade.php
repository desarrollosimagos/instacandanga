@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de Validación de cuenta</div>
                <div class="panel-body">
                    @if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif
					@if (session('warning'))
						<div class="alert alert-warning">
							{{ session('warning') }}
						</div>
					@endif

                    <form class="form-horizontal" role="form">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Codigo de Verificacion</label>

                            <div class="col-md-6">
                                <input id="code" type="code" class="form-control" name="code" value="{{ old('code') }}" required>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="enviar" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
	$( "#enviar" ).click(function() {
		window.location = "/user/activation/"+ document.getElementById('code').value;
	});
	/*function enviar(){
		window.location = "/user/activation/"+ document.getElementById('code').value;
	}*/
@endsection