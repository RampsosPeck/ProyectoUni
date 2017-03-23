@extends('automotores.admin')

@section('subtitulo','Editar Presupuesto')
@section('css')

     {!! Html::style('css/datetimepicker/prettify-1.0.css') !!}
     {!! Html::style('css/datetimepicker/base.css') !!}
     {!! Html::style('css/datetimepicker/bootstrap-datetimepicker.css') !!}

     {!! Html::style('css/easy-autocomplete.themes.min.css') !!}
     {!! Html::style('css/easy-autocomplete.min.css') !!}
     {!! Html::style('css/select2.css') !!}
    {!! Html::style('css/app.css') !!}
@stop
@section('content')
@include('alertas.request')
@include('alertas.errors')
<br>
<div class="panel panel-info">
    
    <div class="panel-heading text-center"><h4><p class="www">Editar el Presupuesto</p></h4></div>
    <center><font color="red">■</font>Los campos de la letra color <font color = "green"><strong> verde </strong></font> son Obligatorios.<font color="red">■</font> Los campos de la letra color <font color = "#8a6d3b"><strong> dorado </strong></font> son autogenerados (no modifique).</center>
    <div class="panel-body"> 

            {!!Form::model($presupuesto,['route'=> ['presupuestos.update',$presupuesto->id],'method'=>'PUT'])!!}

                @include('automotores.presupuesto.forms.presu')
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <center>
                    {!! Form::submit('Actualizar',['class'=>'btn btn-primary btn-sm btn-block']) !!}
                    </center>
                </div>
                <div class="col-md-2"></div><br>
            {!! Form::close() !!}
            <br>
            {!! Form::open(['route'=>['presupuestos.destroy',$presupuesto->id],'method'=>'DELETE']) !!}
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <center>
                        {!! Form::submit('Eliminar',['class'=>'btn btn-danger btn-sm btn-block']) !!}
                    </center>
                </div>
                <div class="col-md-2"></div><br>
            {!! Form::close() !!}
         </div>
</div>
@endsection
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
<script type="text/javascript">
    $('select').select2();    
</script>
<script type="text/javascript">
$(function () {
        $('#datetimepicker6').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'es'
        });
        $('#datetimepicker7').datetimepicker({
            locale: 'es',
            format: 'YYYY-MM-DD',
            useCurrent: false 
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
        $('#datetimepicker8').datetimepicker({
            locale: 'es',
            format: 'YYYY-MM-DD ',
            useCurrent: false 
        });
    });
 $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT',
        });
    });
  $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'LT',
        });
    });

function sumar()
{

    var total = verificar("total");
    var division=verificar("division");

    document.getElementById("total").value=parseFloat(total);
    // .toFixed(2) Convierte un número en una cadena , manteniendo sólo dos decimales
    document.getElementById("combustible").value=(parseFloat(total)/parseFloat(division)).toFixed(2);
    //Funciones aritmeticas para Descripcion Presupuestaria
    var cantidadC = verificar("cantidadC");
    var carta1    = verificar("carta1")
    var precioC   = verificar("precioC");
    var result    =(parseFloat(cantidadC)+parseFloat(carta1)).toFixed(2);
    document.getElementById("totalC").value=(parseFloat(result)*parseFloat(precioC)).toFixed(2);

    var cantidadVC = verificar("cantidadVC");
    var precioVC   = verificar("precioVC");
    document.getElementById("totalVC").value=(parseFloat(cantidadVC)*parseFloat(precioVC)).toFixed(2);

    var cantidadVP = verificar("cantidadVP");
    var precioVP   = verificar("precioVP");
    document.getElementById("totalVP").value=(parseFloat(cantidadVP)*parseFloat(precioVP)).toFixed(2);

    var cantidadVF = verificar("cantidadVF");
    var precioVF   = verificar("precioVF");
    document.getElementById("totalVF").value=(parseFloat(cantidadVF)*parseFloat(precioVF)).toFixed(2);

    var cantidadP = verificar("cantidadP");
    var precioP   = verificar("precioP");
    document.getElementById("totalP").value=(parseFloat(cantidadP)*parseFloat(precioP)).toFixed(2);

    var cantidadM = verificar("cantidadM");
    var precioM   = verificar("precioM");
    document.getElementById("totalM").value=(parseFloat(cantidadM)*parseFloat(precioM)).toFixed(2);

    var cantidadG = verificar("cantidadG");
    var precioG   = verificar("precioG");
    document.getElementById("totalG").value=(parseFloat(cantidadG)*parseFloat(precioG)).toFixed(2);

    //Para el total en Bolivianos
    var totalT  = verificar("totalT");
    var totalC  = verificar("totalC");
    var totalVC = verificar("totalVC");
    var totalVP = verificar("totalVP");
    var totalVF = verificar("totalVF");
    var totalP  = verificar("totalP");
    var totalM  = verificar("totalM");
    var totalG  = verificar("totalG");
    //document.getElementById("totalT").value=parseFloat(totalT);
    document.getElementById("totalT").value=(parseFloat(totalC)+parseFloat(totalVC)+parseFloat(totalVP)+parseFloat(totalVF)+parseFloat(totalP)+parseFloat(totalM)+parseFloat(totalG)).toFixed(2);

    //Transporte publico
    var p1 = verificar("p1");
    var c1 = verificar("c1");
    document.getElementById("t1").value=(parseFloat(p1)*parseFloat(c1)).toFixed(2);

    var p2 = verificar("p2");
    var c2 = verificar("c2");
    document.getElementById("t2").value=(parseFloat(p2)*parseFloat(c2)).toFixed(2);

    var p3 = verificar("p3");
    var c3 = verificar("c3");
    document.getElementById("t3").value=(parseFloat(p3)*parseFloat(c3)).toFixed(2);

    var t1 = verificar("t1");
    var t2 = verificar("t2");
    var t3 = verificar("t3");
    document.getElementById("t4").value=(parseFloat(t1)+parseFloat(t2)+parseFloat(t3)).toFixed(2);

    //Diferencia
    var totalT = verificar("totalT");
    var t4     = verificar("t4");
    document.getElementById("diferencia").value=(parseFloat(totalT)-parseFloat(t4)).toFixed(2);

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
@stop