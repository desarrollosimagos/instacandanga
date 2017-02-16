@extends('layouts.app')

@section('header_lib')
<style type="text/css">

#mainbody{
    background: white;
    width:100%;
	display:none;
}
#footer{
    background:white;
}
#v{
    width:320px;
    height:240px;
}
#qr-canvas{
    display:none;
}
#qrfile{
    width:320px;
    height:240px;
}
#mp1{
    text-align:center;
    font-size:35px;
}
#imghelp{
    position:relative;
    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#f0f0f0;
	margin-left:35px;
	margin-right:35px;
	padding-top:10px;
	padding-bottom:10px;
	border-radius:20px;
}
.selector{
    margin:0;
    padding:0;
    cursor:pointer;
    margin-bottom:-5px;
}
#outdiv
{
    width:320px;
    height:240px;
	border: solid;
	border-width: 3px 3px 3px 3px;
}
#result{
    border: solid;
	border-width: 1px 1px 1px 1px;
	padding:20px;
	width:70%;
}


#footer a{
	color: black;
}
.tsel{
    padding:0;
}

</style>
    <script type="text/javascript" src="/js/video/llqrcode.js"></script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	<script type="text/javascript" src="/js/video/webqr.js"></script>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5><a href="/home">inicio</a> / Carnet de la Patria</h5>
                </div>

                <div class="panel-body">
                    @if (!$carnet)
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group col-xs-4" >
                                <div id="mainbody">
                                    <table class="tsel" border="0" width="100%">
                                    <tr>
                                    <td valign="top" align="center" width="50%">
                                    <table class="tsel" border="0">
                                    <tr><td colspan="2" align="center">
                                    <div id="outdiv">
                                    </div></td></tr>
                                    </table>
                                    </td>
                                    </tr>
                                    <tr><td colspan="3" align="center">
                                    <div id="result"></div>
                                    </td></tr>
                                    </table>
                                    </div>&nbsp;
                                    <div id="footer">
                                    <br>
                                    </div>
                                    </div>
                                    <canvas id="qr-canvas" width="800" height="600"></canvas>
                                </div>
                            <div class="form-group col-xs-4" >
                                
                            </div>
                            <div class="form-group col-xs-4" >
                                
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <a id="generar" name="generar" class="btn btn-primary" role="button">
                                <i class="fa fa-plus" aria-hidden="true"></i> Vincular Carnet
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        
                            <div class="col-sm-3 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{ $carnet->avatar }}" alt="...">
                                    <div class="caption">
                                        <h3>{{ $carnet->cedula }} - {{ $carnet->handle }}</h3>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    $("#generar").click(function() {
    	load();
    });
    
    $("#offscaner").click(function() {
    	apagarCam();
    });
    
    $( "#qrprint" ).click(function() {
    	$('#code_qr').printArea();
		return false;
    });
@endsection