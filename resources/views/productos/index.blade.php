
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Productos</h1>
            <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre ?? 'N/A' }}</td>
                        <td>{{ $producto->descripcion ?? 'N/A' }}</td>
                        <td>${{ $producto->precio ?? 'N/A' }}</td>
                        <td><img src="{{ $producto->imagen ? Storage::url($producto->imagen) : 'default.jpg' }}" alt="{{ $producto->nombre }}" width="100"></td>
                        <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('productos.show', $producto) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
