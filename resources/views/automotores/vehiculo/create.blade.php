@extends('automotores.admin')

@section('subtitulo','Incertar Vehiculo')
@section('css')
     {!! Html::style('css/easy-autocomplete.themes.min.css') !!}
     {!! Html::style('css/easy-autocomplete.min.css') !!}
     {!! Html::style('css/select2.css') !!}
@stop
@section('content')
@include('alertas.request')
<br>
<div class="panel panel-default">
    
    <div class="panel-heading text-center"><h4><p class="www">Nuevo Vehiculo</p></h4></div>
    <div class="panel-body">      
       {!! Form::open(['route'=>'vehiculos.store','method'=>'POST','data-toggle'=>'validator','class'=>'form-inline has-success has-feedback']) !!}
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            @include('automotores.vehiculo.forms.vehiculos')
            <div class="col-md-4"></div>
                <div class="col-md-4">
                <center>
                    <button type="submit" class="btn btn-primary btn-block" >
                        <span class="glyphicon glyphicon-floppy-save "> Registrar</span> 
                    </button>
                </center>    
                </div>
            <div class="col-md-4"></div>

        {!! Form::close() !!}
    </div>
</div>
@stop
@section('javascript')
{!! Html::script('js/validator.js')!!}
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/jquery.easy-autocomplete.min.js') !!}
{!! Html::script('js/select2.js') !!}

{!! Html::script('js/vehiculo/tipogeneral.js')!!}
{!! Html::script('js/vehiculo/marca.js')!!}
{!! Html::script('js/vehiculo/tipoespecifico.js')!!}
{!! Html::script('js/vehiculo/modelo.js')!!}

<script type="text/javascript">
 $(document).ready(function () {
    $('select').select2({
        placeholder: "Estado del Vehículo",
        allowClear: true
    }); 
 });
</script>@endsection