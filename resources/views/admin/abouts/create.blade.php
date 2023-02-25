@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nuevo About</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.abouts.store']) !!}

            <div class="row">
                <div class="form-group col">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese una descripción',
                        'required' => 'true',
                        'max' => '255',
                    ]) !!}

                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {!! Form::submit('Crear About', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
