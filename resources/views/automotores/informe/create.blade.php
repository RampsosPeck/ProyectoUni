@extends('automotores.admin')

@section('subtitulo','Informe de Viajes')
@section('css')
     {!! Html::style('css/datetimepicker/prettify-1.0.css') !!}
     {!! Html::style('css/datetimepicker/base.css') !!}
     {!! Html::style('css/datetimepicker/bootstrap-datetimepicker.css') !!}
     {!! Html::style('css/easy-autocomplete.themes.min.css') !!}
     {!! Html::style('css/easy-autocomplete.min.css') !!}
     {!! Html::style('css/select2.css') !!}
@stop
@section('content')
@include('alertas.request')
<div class="panel panel-default">
    
    <div class="panel-heading text-center"><h4><p class="www">Informe del Viaje</p></h4></div>
    <div class="panel-body">      
       {!! Form::open(['route'=>'informes.store','method'=>'POST','data-toggle'=>'validator']) !!}
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            @include('automotores.informe.forms.info')

              
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block">
                 <span class="glyphicon glyphicon-floppy-save ">  Registrar</span> 
            </button>
          </div>
        </div>      
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

{!! Html::script('js/jquery.easy-autocomplete.min.js') !!}
{!! Html::script('js/select2.js') !!}
{!! Html::script('js/entidades.js') !!}
{!! Html::script('js/validator.js')!!}
<script type="text/javascript">
 $(document).ready(function () {
    $('#chof').select2({
        placeholder: "Seleccione un Chofer",
        allowClear: true
    });
    $('#vehi').select2({
        placeholder: "Seleccione un vehiculo",
        allowClear: true
    });
    $('#encar').select2({
        placeholder: "Seleccione un encargado",
        allowClear: true
    });
    $('#mante').select2({
        tags:true,
        placeholder:"Inserte un Objeto",
        allowClear: true,
        maximumSelectionLength: 20,
        tokenSeparators: [',']
    });
    $('#mantes').select2({
        placeholder:"Seleccione un Objeto",
        allowClear: true,
    });
 });

function sumar()
{
    //Asignación del combustible total
    var recargue1a = verificar("recargue1a");
    var recargue2a = verificar("recargue2a");
    var recargue3a = verificar("recargue3a");
    var totalU = verificar("totalU");
    document.getElementById("totalU").value=(parseFloat(recargue1a)+parseFloat(recargue2a)+parseFloat(recargue3a)).toFixed(2);

    //Asignación del efectivo
    var compra1a = verificar("compra1a");
    var compra2a = verificar("compra2a");
    var compra3a = verificar("compra3a");
    var totalCO = verificar("totalCO");
    document.getElementById("totalCO").value=(parseFloat(compra1a)+parseFloat(compra2a)+parseFloat(compra3a)).toFixed(2);

    //Asignación del peaje combustible
    var montope1 = verificar("montope1");
    var montoim1 = verificar("montoim1");
    var totalPI = verificar("totalPI");
    document.getElementById("totalPI").value=(parseFloat(montope1)+parseFloat(montoim1)).toFixed(2);

    //Asignación de la devolución
    var combus1 = verificar("combus1");
    var peaje1 = verificar("peaje1");
    var impre1 = verificar("impre1");
    var totalcopeim1 = verificar("totalcopeim1");
    document.getElementById("totalcopeim1").value=(parseFloat(combus1)+parseFloat(peaje1)+parseFloat(impre1)).toFixed(2);

}
function verificar(id)
{
    var obj=document.getElementById(id);
    if(obj.value=="")
        value="0";
    else
        value=obj.value;
    if(validate_importe(value,1))
    {
        obj.style.borderColor="#808080";
        return value;
    }else{
        obj.style.borderColor="#f00";
        return 0;
    }
}
function validate_importe(value,decimal)
{
        if(decimal==undefined)
            decimal=0;
        if(decimal==1)
        {
           var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
        }else{
            var patron=new RegExp("^([0-9])*$")
        }
        if(value && value.search(patron)==0)
        {
            return true;
        }
        return false;
}
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({
            format: 'YYYY-MM-DD ',
            locale: 'es'
        });
        $('#datetimepicker7').datetimepicker({
            locale: 'es',
            format: 'YYYY-MM-DD ',
            useCurrent: false 
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
    //Para sacar las horas de tiempoa
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT',
        });
    });
    //Para sacar las horas de tiempob
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'LT',
        });
    });    
</script>
<script type="text/javascript">

    var templatet = '<div class="form-group mantenimiento-select-container">'+
                '<li class="list-group-item ">'+
                    '<div class="row">'+
                          '<div class="col-md-4">'+
                            '<div class="input-group">'+
                              '<span class="input-group-addon" id="">'+'Objeto:'+'</span>'+
                              '{!! Form::select('mantenimiento', config('mantenimiento.mante'), null, ['id'=>'mante','class' => 'form-control','placeholder'=>'Seleccione un Objeto']) !!}'+    
                            '</div>'+
                          '</div>'+
                          '<div class="col-md-8">'+
                            '<div class="input-group">'+
                              '<span class="input-group-addon" id="">'+'Descripción:'+'</span>'+
                              '{!! Form::input('descripmante', null, null,['class'=>'form-control','placeholder'=>'Inserte el estado del objeto seleccionado','id'=>'descripman']) !!}'+  
                              '<span class="input-group-addon" id="basic-addon3">'+
                              '<a href="#" class=" btn btn-xs btn-danger fa fa-trash btn-remove-mantenimiento">'+'Eliminar'+'</a>'+
                              '</span>'+
                            '</div>'+
                          '</div>'+
                      '</div>'+
                '</li>'+
              '</div>'
    
    $('.btn-add-more-mantenimiento').on('click',function(e){
        e.preventDefault();
        $(this).before(templatet);
    });

    $(document).on('click','.btn-remove-mantenimiento',function(e){
        e.preventDefault();
        $(this).parents('.mantenimiento-select-container').remove();
    });
</script>


@stop









