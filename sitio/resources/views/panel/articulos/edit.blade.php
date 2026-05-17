@extends('layouts.panel')
@section('page-title', 'Editar Artículo')
@section('content')
<div class="card" style="max-width:800px">
    <div class="card-header">
        <span class="card-title">✏️ Editar: {{ $articulo->titulo }}</span>
        <a href="{{ route('articulos.index') }}" class="btn btn-secondary btn-sm">← Volver</a>
    </div>
    <div style="padding:24px">
        <form method="POST" action="{{ route('articulos.update', $articulo) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-group" style="grid-column:1/-1">
                    <label>Título *</label>
                    <input type="text" name="titulo" value="{{ old('titulo', $articulo->titulo) }}" required>
                    @error('titulo') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label>Categoría *</label>
                    <select name="categoria" required>
                        @foreach($categorias as $key => $label)
                            <option value="{{ $key }}" {{ old('categoria', $articulo->categoria) == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Región / Departamento</label>
                    <select name="region">
                        <option value="">-- Nacional / General --</option>
                        @foreach($regiones as $r)
                            <option value="{{ $r }}" {{ old('region', $articulo->region) == $r ? 'selected' : '' }}>{{ $r }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="grid-column:1/-1">
                    <label>Descripción *</label>
                    <textarea name="descripcion" required>{{ old('descripcion', $articulo->descripcion) }}</textarea>
                </div>
                <div class="form-group" style="grid-column:1/-1">
                    <label>Imagen</label>
                    @if($articulo->imagen)
                        <div style="margin-bottom:10px">
                            <img src="{{ asset('storage/'.$articulo->imagen) }}" style="height:100px;border-radius:8px">
                            <div style="font-size:0.8rem;color:#888;margin-top:4px">Imagen actual — sube otra para reemplazar</div>
                        </div>
                    @endif
                    <input type="file" name="imagen" accept="image/*">
                </div>
            </div>
            <div style="display:flex;gap:10px;margin-top:8px">
                <button type="submit" class="btn btn-primary">💾 Actualizar</button>
                <a href="{{ route('articulos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
