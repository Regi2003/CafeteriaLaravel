@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Editar Producto</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $producto->descripcion }}</textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                    <img src="{{ Storage::url($producto->imagen) }}" alt="{{ $producto->nombre }}" width="100" class="mt-2">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
