@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Panel de Usuario</h4></div>
                
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
                            <a class="navbar-brand" href="facebook">
                                <span class="text-primary">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                Añadir tus cuentas de facebook</span>
                            </a>
                            </div>
                        </div>
                    </nav>
                    
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="twitter">
                                <span class="text-success">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                Añadir tus cuentas de twitter
                                </span>
                            </a>
                            </div>
                        </div>
                    </nav>

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="google">
                                <span class="text-danger">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                Añadir tus cuentas de google plus
                                </span>
                            </a>
                            </div>
                        </div>
                    </nav>
                    <!--
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="instagram">
                                <span class="text-info">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                Añadir tus cuentas de instagram
                                </span>
                            </a>
                            </div>
                        </div>
                    </nav>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
