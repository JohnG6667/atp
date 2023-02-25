@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar About</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($about, ['route' => ['admin.abouts.update', $about], 'method' => 'PUT']) !!}

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

            {!! Form::submit('Actualizar About', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
