<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la Picture">
    </div>

    @if ($pictures->count())
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
                    @foreach ($pictures as $picture)
                        <tr>
                            <td>{{ $picture->id }}</td>
                            <td>{{ $picture->name }}</td>
                            <td>
                                @if ($picture->image)
                                    <img src="{{ Storage::url($picture->image->url) }}" style="width: 150px; height: 100px;"
                                        alt="...">
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.pictures.edit', $picture) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.pictures.destroy', $picture) }}" method="POST">
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
            {{ $pictures->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif

</div>
