<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del Testimonial">
    </div>

    @if ($testimonials->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>FOTO</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->id }}</td>
                            <td>{{ $testimonial->name }}</td>
                            <td>
                                @if ($testimonial->image)
                                    <img src="{{ Storage::url($testimonial->image->url) }}" style="width: 150px; height: 100px;"
                                        alt="...">
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.testimonials.edit', $testimonial) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $testimonials->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif

</div>
