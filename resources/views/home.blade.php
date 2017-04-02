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
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Paso 3</h4>
                    <p class="list-group-item-text">Vincular Colectivos</p>
                </a></li>
                <li class="active"><a href="#step-4">
                    <h4 class="list-group-item-heading">Paso 4</h4>
                    <p class="list-group-item-text">Vincular Redes Sociales</p>
                </a></li>
            </ul>
        </div>
	</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-12 well setup-content text-center" id="step-4">
                <h1>Vincular Redes Sociales</h1>
                <div class="panel panel-default">
                <div class="panel-body">

                    <!--
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="carnet">
                                <span class="text-primary">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                Vincula tu carnet de la patria</span>
                            </a>
                            </div>
                        </div>
                    </nav>-->

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <span class="text-primary">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                Añadir tus cuentas de facebook</span>
                                
                            </a>
                            <a class="navbar-brand" href="/auth/facebook">
                                <i class="fa fa-plus" style="color:blue;" aria-hidden="true"></i> Agregar
                            </a>
                            </div>
                        </div>
                    </nav>

                    <nav class="navbar navbar-default">
                        @foreach ($facebook as $key => $lnk)
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
                    </nav>
                    
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand">
                                <span class="text-success">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                Añadir tus cuentas de twitter
                                </span>
                            </a>
                            <a class="navbar-brand" href="/auth/twitter">
                                <i class="fa fa-plus" style="color:blue;" aria-hidden="true"></i> Agregar
                            </a>
                            </div>
                        </div>
                    </nav>

                    <nav class="navbar navbar-default">
                        @foreach ($twitter as $key => $lnk)
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
                    </nav>

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand">
                                <span class="text-danger">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                Añadir tus cuentas de google plus
                                </span>
                            </a>
                            <a class="navbar-brand" href="/auth/google">
                                <i class="fa fa-plus" style="color:blue;" aria-hidden="true"></i> Agregar
                            </a>
                            </div>
                        </div>
                    </nav>

                    <nav class="navbar navbar-default">
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
                    </nav>
                    
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand">
                                <span class="text-info">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                Añadir tus cuentas de instagram
                                </span>
                            </a>
                            <a class="navbar-brand" href="/auth/instagram">
                                <i class="fa fa-plus" style="color:blue;" aria-hidden="true"></i> Agregar
                            </a>
                            </div>
                        </div>
                    </nav>

                    <nav class="navbar navbar-default">
                        @foreach ($instagram as $key => $lnk)
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
                    </nav>

                    <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="btn btn-primary">
                                Finalizar registro.
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                </div>
            </div>   
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $(this).remove();
    })    
});


$(function () {
    
    
});
    

</script>

@endsection

@section('js')
	
	
@endsection

