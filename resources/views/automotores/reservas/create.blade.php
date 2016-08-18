@extends('automotores.admin')

@section('subtitulo','Incertar Reserva')
@section('css')
     {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
     {!! Html::style('css/jquery.easy-autocomplete.css') !!}
     {!! Html::style('css/select2.css') !!}
@stop
@section('content')
@include('alertas.request')
@include('alertas.errors')
<br>
<div class="panel panel-default">
    
    <div class="panel-heading text-center"><h4><p class="www">Nueva Reserva</p></h4></div>
    <div class="panel-body">      
       {!! Form::open(['route'=>'reservas.store','method'=>'POST']) !!}
        
            @include('automotores.reservas.forms.reser')
                <div class="col-md-4"></div>
                <div class="col-md-4">    
                <center>{!! Form::submit('Registrar',['class'=>'btn btn-primary btn-sm btn-block']) !!}</center>
                </div>
                <div class="col-md-4"></div>
        {!! Form::close() !!}
    </div>
</div>

@stop
@section('javascript')
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('js/jquery.easy-autocomplete.js') !!}
{!! Html::script('js/bootstrap-datetimepicker.es.js') !!}
{!! Html::script('js/select2.js') !!}
 <script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false 
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
@endsection



