@extends('automotores.admin')

@section('subtitulo','Usuarios')
@section('content')
@include('alertas.success')
<br>
<div class="panel panel-default">
    <div class="panel-heading text-center"><h4><p class="www">Lista de Usuarios</p></h4></div>
    <div class="panel-body">
    <form class="form-inline">
        <div class="form-group">
            <label>Busqueda</label> 
            @include('automotores.usuarios.forms.busqueda')
        </div>
    </form><br>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                 <tr class="info">
                    <th class="text-center">#</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Cedula</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Institución</th>
                    <th class="text-center">Operación</th>
                </tr><?php $num=1; ?>
                @foreach($users as $user)
                    <tbody>
                        <tr>
                            <td  class="info text-center">{{ $num}}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->cedula }}</td>
                            <td>{{ $user->celular }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->tipo }}</td>
                            <td><?php $id = $user->id; ?>
                                @foreach ($entidad as $key => $enti)
                                    <?php $i = $enti->user_id; 
                                    if ($i==$id) 
                                    {
                                        echo "$enti->facultad "."$enti->carrera "."$enti->materia "." $enti->sigla";
                                    }
                                    ?>
                                @endforeach
                            </td>
                            <td class="btns" style="vertical-align:middle;">
                                <center>
                                {!!link_to_route('users.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-info btn-sm glyphicon glyphicon-edit'])!!}
                                </center>
                            </td>
                        </tr>
                    </tbody><?php $num++; ?>
                @endforeach
            </table>
            <p class="text-center">Hay {{ $users->total() }} registros</p>
        </div>
    </div>
</div>
{!! $users->appends(Request::only(['name','tipo']))->render() !!}

@stop