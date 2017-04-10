
<div class="jumbotron text-center ">
<div class="row">
    <div class="col-md-4">
        <li class="list-group-item list-group-item-success">
            <div class="form-group">
                <center>{!! Form::label('Chofer') !!}</center>
                {!! Form::text('chofer', $rol->enviarChofer->full_name, ['class' => 'form-control','data-error'=>'Seleccione un Chofer','readonly']) !!}
                <center><div class="help-block with-errors"></div></center>
            </div>
        </li>
    </div><input type="hidden" name="chofer_id" value="{{ $rol->chofer_id }}" />
    <input type="hidden" name="roles_id" value="{{ $i }}" />
    <div class="col-md-4">
        <li class="list-group-item list-group-item-success">
            <div class="form-group">
               <center>{!! Form::label('Tipo de viaje') !!}</center>
               {!! Form::select('tipo', 
               [
                    'Viaje de tipo A' => ['ciudad'   => 'Ciudad (A)'],
                    'Viaje de tipo B' => ['provincia'=> 'Provincia (B)'],
                    'Viaje de tipo C' => ['frontera' => 'Frontera (C)'],
               ],null,['class' => 'js-example-responsive','style'=>'width: 100%','placeholder'=>'Seleccione un tipo de Viaje','data-error'=>'Seleccione un Chofer']) !!}
               <center><div class="help-block with-errors"></div></center>
            </div>
        </li>
        <li class="list-group-item list-group-item-success">
            <div class="form-group">
                <center>{!! Form::label('Lugar') !!}</center>
                {!! Form::text('lugar', null, ['class' => 'form-control','placeholder'=>'Inserte el lugar del viaje','data-error'=>'Seleccione un Chofer','required']) !!}
                <center><div class="help-block with-errors"></div></center>
            </div>
        </li>
    </div>
    <div class="col-md-4">
        <li class="list-group-item list-group-item-success">
            <div class="form-group"><?php $fecha = date('Y-m-d h:m:s'); ?>
                {!! Form::label('Fecha:') !!}
                <div class='input-group date ' id='datetimepicker6'>
                    {!! Form::text('fecha',$fecha,['class'=>'form-control', 'placeholder'=>'Ingrese la fecha','data-error'=>'Inserte la fecha Inicial']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </li>
    </div>
</div>
</div>


