<div class="list-group-item">
<div class="jumbotron ">
<div class="row">    
    <div class="col-md-4">
        <li class="list-group-item">
            <div class="form-group">
                <center>{!! Form::label('Origen:') !!}</center>
                {!! Form::text('origen',null,['class'=>'form-control', 'placeholder'=>'Desde donde partira el vehiculo','data-error'=>'Inserte un lugar exacto','required']) !!}
                <center><div class="help-block with-errors"></div></center>
            </div>
            <div class="form-group">
                {!! Form::label('Departamento:') !!}
                {!! Form::select('dep_inicio', config('dep.deps'), null, ['class' => 'form-control','data-error'=>'Seleccione un departamento','required']) !!}
                <center><div class="help-block with-errors"></div></center>
            </div>
        </li>
    </div>
    <div class="col-md-4">
        <li class="list-group-item">
            <div class="form-group">
                <center>{!! Form::label('Descripción de la Ruta:') !!}</center> 
                {!! Form::textarea('ruta',null,['class'=>'form-control', 'rows'=>'3','placeholder'=>'Agregue una breve descripción de la ruta de viaje','data-error'=>'Inserte una breve descripción de la ruta','required']) !!}
                <center><div class="help-block with-errors"></div></center>
            </div>
        </li>
    </div>
    <div class="col-md-4">
        <li class="list-group-item">
            <div class="form-group">
                <center>{!! Form::label('Destino:') !!}</center>
                {!! Form::text('destino',null,['class'=>'form-control', 'placeholder'=>'Hasta el lugar exacto de llegada','data-error'=>'Inserte un lugar exacto','required']) !!}
                <center><div class="help-block with-errors"></div></center>
            </div>
            <div class="form-group">
                {!! Form::label('Departamento:') !!}
                {!! Form::select('dep_final', config('dep.deps'), null, ['class' => 'form-control','data-error'=>'Seleccione un departamento','required']) !!}
                <center><div class="help-block with-errors"></div></center>
            </div>
        </li>
    </div>
</div><br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <li class="list-group-item">
        <div class="form-group">
            {!! Form::label('Distancia (km):') !!}
            {!! Form::number('kilometraje',null,['step'=>'any','class'=>'form-control','placeholder'=>'Ejm. 12,5','data-error'=>'Inserte una distancia valida','required']) !!}
            <center><div class="help-block with-errors"></div></center>
        </div>
        <div class="form-group">
                {!! Form::label('Tiempo:') !!}
            <div class='input-group date ' id='datetimepicker3'>   
                {!! Form::text('tiempo',null,['class'=>'form-control', 'placeholder'=>'Tiempo aproximado','data-error'=>'Inserte el tiempo de rrecorrido','required']) !!}
                <center><div class="help-block with-errors"></div></center>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
    </li>
    </div>
</div>  
<!--Faltan cerrar dos DIV-->