@extends('layouts.app')

@section('header_lib')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>

  <script>

$(function()
{
	 $( "#q" ).autocomplete({
	  source: "search/autocomplete",
      minLength: 5,
	  select: function(event, ui) {
          //alert('desea agregarlos');
          $('#q').val(ui.item.value);
          $('#q_id').val(ui.item.id);
        
	  }
	});

    $( "#add_colectivo" ).click(function() {
        if($('#q').val() == ''){
            alert('Debe ingresar el nombre del colectivo que desea agregar');
        }else{
            $('#nombre_colectivo').html($('#q').val());
            $('#add_colectivo_id').val($('#q_id').val());
            $('#myModal').modal('show');
        }
	});

    $( "#btn_add_co" ).click(function() {
        $('#myModal').modal('hide');
        if($('#q_id').val()>0){
            $.ajax({
                method: "GET",
                url: "/colectivos/add",
                data: { id: $('#q_id').val() }
                })
                .done(function( msg ) {
                    console.log(msg);
                    if(msg == 'Exitoso'){
                        console.log('<tr><td>'+$('#q').val()+'</td></tr>');
                        $('#lista_colectivos').append('<tr><td>'+$('#q').val()+'</td></tr>');
                        $('#q').val('');
                        $('#q_id').val('');
                    }else{
                        $('#q').val('');
                        $('#q_id').val(''); 
                    }   
                });
        }else{
            //alert('debe agregar el registro');
            $('#nombre_colectivo2').html($('#q').val());
            $('#myModal2').modal('show');
            
            
        }
	});

    $( "#btn_add_new_co" ).click(function() {
        $.ajax({
            method: "GET",
            url: "/colectivos/nuevo",
            data: { name: $('#q').val(), mail: $('#mail_colectivo').val() }
            })
            .done(function( msg ) {
                if(msg == 'Exitoso'){
                    $('#myModal2').modal('hide'); 
                    $('#lista_colectivos').append('<tr><td>'+$('#q').val()+'</td></tr>');
                }else{
                    $('#myModal2').modal('hide'); 
                    
                }
                $('#mail_colectivo').val('');
                $('#q').val('');
                $('#q_id').val('');
        });
    });
});
</script>
@endsection

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
                    <p class="list-group-item-text">Vincular Colectivos</p>
                </a></li>
                <li class="disabled"><a href="#step-4">
                    <h4 class="list-group-item-heading">Paso 4</h4>
                    <p class="list-group-item-text">Vincular Redes Sociales</p>
                </a></li>
            </ul>
        </div>
	</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-12 well setup-content text-center" id="step-3">
                <h1>Vincular Colectivos</h1>
                <div class="panel panel-default">
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
                            <label for="code" class="col-md-4 control-label">Ingrese el nombre del Colectivo</label>

                            <div class="col-md-6">
                                <input id="q" type="text" class="form-control" name="q">
                                <input id="q_id" type="hidden" class="form-control" name="q_id">
                            </div>
                            <div class="col-md-2">
                                <input type="button" class="btn btn-primary" id="add_colectivo" value="Agregar">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <table class="table table-hover" id="lista_colectivos">
                                    
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="/home" class="btn btn-primary">
                                    Guardar y Continuar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
               
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Colectivo</h4>
        </div>
        <div class="modal-body">
            Desea agregarse como miembro del colectivo <p id="nombre_colectivo">Pandilla ros</p>
            <input id="add_colectivo_id" type="hidden" class="form-control" name="add_colectivo_id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btn_add_co">Agregar Colectivo</button>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Colectivo</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form">
                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                    <label for="code" class="col-md-4 control-label">Razón Social</label>

                    <div class="col-md-6">
                        <p id="nombre_colectivo2"></p>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                    <label for="code" class="col-md-4 control-label">Correo Electrónico</label>

                    <div class="col-md-6">
                        <input id="mail_colectivo" type="text" class="form-control" name="mail_colectivo">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btn_add_new_co">Guardar Registro</button>
        </div>
        </div>
    </div>
    </div>

</div>
@endsection

@section('js')
	
	
@endsection