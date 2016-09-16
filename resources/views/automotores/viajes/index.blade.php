@extends('automotores.admin')

@section('subtitulo','Reservas')
    
@section('content')
@include('alertas.success')
<br>
<div class="panel panel-default">
    
    <div class="panel-heading text-center"><h4><p class="www">Viajes</p></h4></div>
    <div class="panel-body"> 
        <form class="form-inline">
            <div class="form-group">
                <label>Busqueda</label> 
                @include('automotores.viajes.forms.busqueda')
            </div>
        </form>
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed"><br>
            <tr class="info">
                <th class="text-center">#</th>
                <th class="text-center">Entidad</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Objetivo</th>
                <th class="text-center">Dias</th>
                <th class="text-center">Pasajeros</th>
                <th class="text-center">Inicio</th>
                <th class="text-center">Final</th>
                <th class="text-center">Operacion</th>
            </tr>
        
            @foreach($viaje as $via)
                <tbody>
                    <td class="info text-center">{{ $via->id }}</td>
                    <td>{{ $via->entidad }}</td>
                    <td>{{ $via->tipo }}</td>
                    <td>{{ $via->objetivo }}</td>
                    <td class="text-center">{{ $via->dias }}</td>
                    <td class="text-center">{{ $via->pasajeros }}</td>
                    <td class="text-center">{{ $via->fecha_inicial }}</td>
                    <td class="text-center">{{ $via->fecha_final }}</td>
                    <td class="btns" style="vertical-align:middle;">
                    <center>
                        {!!link_to_route('viajes.edit', $title = 'Editar', $parameters = $via->id, $attributes = ['class'=>'btn btn-info btn-sm glyphicon glyphicon-edit'])!!}
                        <a class="btn btn-primary btn-sm " href="{{ route('rutas.show',['id' => $via->id] )}}" >Detalle</a>
                    </center>
                    </td>
                </tbody>
            @endforeach   
        </table>
        <center><p>Existen {{ $viaje->total() }} registros en total</p></center>
        </div>
    </div>
</div>
<!--con appends adjunto los parametros adicionales de busqueda -->
{!! $viaje->appends(Request::only(['entidad','tipo']))->render() !!}</div>
       
@stop