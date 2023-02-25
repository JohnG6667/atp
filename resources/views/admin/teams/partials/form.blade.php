<div class="row">
    <div class="form-group col">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del miembro']) !!}

        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col">
        {!! Form::label('position', 'Cargo') !!}
        {!! Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el cargo del miembro']) !!}

        @error('position')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($team->image)
                <img id="picture" src="{{ Storage::url($team->image->url) }}" alt="">
            @else
                <img id="picture"
                    src="https://envato-shoebox-0.imgix.net/9d94/c39a-4069-4437-84de-ad546154897b/IMG_8933.jpg?auto=compress%2Cformat&fit=max&mark=https%3A%2F%2Felements-assets.envato.com%2Fstatic%2Fwatermark2.png&markalign=center%2Cmiddle&markalpha=18&w=1000&s=7dd39174c3f899328eae307bc4747358"
                    alt="">
            @endisset

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará del miembro') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('file')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <p>Se deben subir imágenes de buena calidad en formato de <strong>960x1280 PX</strong></p>
    </div>
</div>
<div class="form-group col">
    {!! Form::label('facebook', 'Facebook') !!}
    {!! Form::text('facebook', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el link de facebook del miembro',
    ]) !!}

    @error('facebook')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group col">
    {!! Form::label('instagram', 'Instagram') !!}
    {!! Form::text('instagram', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el link de instagram del miembro',
    ]) !!}

    @error('instagram')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group col">
    {!! Form::label('google', 'Google') !!}
    {!! Form::text('google', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el link de google del miembro',
    ]) !!}

    @error('instagram')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
