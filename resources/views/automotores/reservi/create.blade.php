@extends('automotores.admin')

@section('subtitulo','Incertar Viaje')
@section('css')

     {!! Html::style('css/bootstrap.min.css') !!}
     {!! Html::style('css/datetimepicker/prettify-1.0.css') !!}
     {!! Html::style('css/datetimepicker/base.css') !!}
     {!! Html::style('css/datetimepicker/bootstrap-datetimepicker.css') !!}

     {!! Html::style('css/easy-autocomplete.themes.min.css') !!}
     {!! Html::style('css/easy-autocomplete.min.css') !!}
     {!! Html::style('css/select2.css') !!}
@stop
@section('content')
@include('alertas.request')
@include('alertas.errors')
<br>
<div class="panel panel-default">
    
    <div class="panel-heading text-center"><h4><p class="www">Nuevo Viaje</p></h4></div>
    <div class="panel-body">      
       {!! Form::open(['route'=>'viajes.store','method'=>'POST','data-toggle'=>'validator']) !!}
        
            @include('automotores.reservi.forms.via')
                <div class="col-md-4"></div>
                <div class="col-md-4">    
                <center><button type="submit" class="btn btn-primary btn-block">
                    <span class="glyphicon glyphicon-floppy-save ">   Registrar</span> 
                </button></center>
                </div>
                <div class="col-md-4"></div>

        {!! Form::close() !!}
    </div>
</div>

@stop
@section('javascript')
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/datetimepicker/transition.js') !!}
{!! Html::script('js/datetimepicker/collapse.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}

{!! Html::script('js/datetimepicker/prettify-1.0.min.js') !!}
{!! Html::script('js/datetimepicker/base.js') !!}
{!! Html::script('js/datetimepicker/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('js/datetimepicker/bootstrap-datetimepicker.es.js') !!}

{!! Html::script('js/jquery.easy-autocomplete.min.js') !!}
{!! Html::script('js/select2.js') !!}
{!! Html::script('js/entidades.js') !!}
{!! Html::script('js/kilometrajeViajes.js') !!}
{!! Html::script('js/validator.js')!!}
 <script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'es'
        });
        $('#datetimepicker7').datetimepicker({
            locale: 'es',
            format: 'YYYY-MM-DD HH:mm',
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });    
</script>
<script type="text/javascript">
    $('select').select2();    
</script>

<script type="text/javascript">
    $(document).ready(function () {
        // inicializamos el plugin
        $('#chofer').select2({
            // Activamos la opcion "Chofer" del plugin
            tags: false,
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '{{ url("chofer") }}',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                  return {
                    results: data
                  };
                },
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        // inicializamos el plugin
        $('#vehiculo').select2({
            // Activamos la opcion "Vehiculo" del plugin
            tags: false,
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '{{ url("vehiculo") }}',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                  return {
                    results: data
                  };
                },
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        // inicializamos el plugin
        $('#encargado').select2({
            // Activamos la opcion "Encargado" del plugin
            tags: false,
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '{{ url("encargado") }}',
                delay: 250,
                data: function(params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                  return {
                    results: data
                  };
                },
            }
        });
    });
</script>
@endsection



