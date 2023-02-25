@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nuevo Fact</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.facts.store']) !!}
            <div class="row">
                <div class="form-group col">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el nombre del Fact',
                        'required' => 'true',
                    ]) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col">
                    {!! Form::label('logo', 'Descripción') !!}
                    {!! Form::text('logo', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el logo del Fact',
                        'required' => 'true',
                    ]) !!}

                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-span-4">
                    {!! Form::label('number', 'Capacidad') !!}
                    {!! Form::number('number', null, [
                        'class' => 'form-control',
                        'min' => '1',
                        'required' => 'true',
                    ]) !!}

                    @error('number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {!! Form::submit('Crear Fact', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
