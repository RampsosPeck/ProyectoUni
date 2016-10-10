@extends('automotores.admin')

@section('subtitulo','Incertar Destino')
@section('css')
     {!! Html::style('css/datetimepicker/prettify-1.0.css') !!}
     {!! Html::style('css/datetimepicker/base.css') !!}
     {!! Html::style('css/datetimepicker/bootstrap-datetimepicker.css') !!}
@stop
@section('content')
@include('alertas.request')
<br>
<div class="panel panel-default">
    
    <div class="panel-heading text-center"><h4><p class="www">Nuevo Destino</p></h4></div>
    <div class="panel-body">      
       {!! Form::open(['route'=>'destinos.store','method'=>'POST','files' => true ,'data-toggle'=>'validator']) !!}
        
            @include('automotores.destino.forms.destinos')
                <div class="col-md-4"></div>
                <div class="col-md-4">    
                <center>
                <button type="submit" class="btn btn-primary btn-block" onClick="this.disabled='disabled'">
                    <span class="glyphicon glyphicon-floppy-save ">   Registrar</span> 
                </button>
                </center>
                </div>
                <div class="col-md-4"></div>
        {!! Form::close() !!}
    </div>
</div>

@stop
@section('javascript')
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/datetimepicker/transition.js') !!}
{!! Html::script('js/datetimepicker/collapse.js') !!}

{!! Html::script('js/datetimepicker/prettify-1.0.min.js') !!}
{!! Html::script('js/datetimepicker/base.js') !!}
{!! Html::script('js/datetimepicker/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('js/datetimepicker/bootstrap-datetimepicker.es.js') !!}
{!! Html::script('js/validator.js')!!}
 <script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT',
        });
    });
</script>
@endsection