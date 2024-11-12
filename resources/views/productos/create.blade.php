@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Crear Producto</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
