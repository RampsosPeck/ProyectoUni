@extends('automotores.admin')

@section('subtitulo','Rol de Viajes')
    
@section('content')
@include('alertas.success')
<br>
<div class="panel panel-default">
    
    <div class="panel-heading text-center"><h4><p class="www">Turnos</p></h4></div>
    <div class="panel-body">
        <form class="form-inline">
            <div class="form-group">
                <label>Opciones: </label> 
                {!!link_to_route('roles.create', $title = ' Agregar chofer', $parameters = "", $attributes = ['class'=>'btn btn-warning  glyphicon fa fa-user '])!!}

                {!!link_to_action('RolesController@getImprimir', $title = ' Imprimir', $parameters = '', $attributes = ['class'=>'btn btn-danger  glyphicon fa fa-print'])!!}
            </div>
        </form>
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed "><br>
            <tr class="info text-center">
                <th class="text-center">#</th>
                <th class="text-center">Chofer</th>
                <th class="text-center">Tipo A (Ciudad)</th>
                <th class="text-center">Tipo B (Provincia)</th>
                <th class="text-center">Tipo C (Frontera)</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Operación</th> 
            </tr> 
            @foreach($roles as $rol)
                <tbody>
                    <tr>
                        <td  class="info text-center"><center>{{ $rol->id }}</center></td>
                        <td>{{ $rol->enviarChofer->full_name }}</td>
                        <td>{{ $rol->tipoa }}</td>
                        <td>{{ $rol->tipob }}</td>
                        <td>{{ $rol->tipoc }}</td>
                        <td class="text-center">{{ $rol->cantidad }}</td>
                        <td class="text-center">{{ $rol->fecha }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <center>
                                    {!!link_to_route('roles.edit', $title = ' Insertar', $parameters = $rol->id, $attributes = ['class'=>'btn btn-primary btn-xs glyphicon fa fa-tachometer'])!!}
                                    <br />
                                    {!!link_to_route('roles.show', $title = ' Mostrar', $parameters = $rol->id, $attributes = ['class'=>'btn btn-info btn-xs glyphicon fa fa-bars'])!!}
                                    <br />
                                    {!!link_to_action('RolesController@getLimpiar', $title = ' Limpiar', $parameters = $rol->id, $attributes = ['class'=>'btn btn-warning btn-xs glyphicon fa fa-paint-brush'])!!}
                                </center>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
      </div>
    </div>
</div>
@stop