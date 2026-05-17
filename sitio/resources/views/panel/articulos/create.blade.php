@extends('layouts.panel')
@section('page-title', 'Nuevo Artículo')
@section('content')
<div class="card" style="max-width:800px">
    <div class="card-header">
        <span class="card-title">✍️ Crear nuevo artículo cultural</span>
        <a href="{{ route('articulos.index') }}" class="btn btn-secondary btn-sm">← Volver</a>
    </div>
    <div style="padding:24px">
        <form method="POST" action="{{ route('articulos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-group" style="grid-column:1/-1">
                    <label>Título *</label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}" placeholder="Ej: La Semana Santa en Sonsonate" required>
                    @error('titulo') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label>Categoría *</label>
                    <select name="categoria" required>
                        <option value="">-- Seleccionar --</option>
                        @foreach($categorias as $key => $label)
                            <option value="{{ $key }}" {{ old('categoria') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('categoria') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label>Región / Departamento</label>
                    <select name="region">
                        <option value="">-- Nacional / General --</option>
                        @foreach($regiones as $r)
                            <option value="{{ $r }}" {{ old('region') == $r ? 'selected' : '' }}>{{ $r }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="grid-column:1/-1">
                    <label>Descripción *</label>
                    <textarea name="descripcion" placeholder="Descripción detallada del elemento cultural..." required>{{ old('descripcion') }}</textarea>
                    @error('descripcion') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div class="form-group" style="grid-column:1/-1">
                    <label>Imagen (opcional)</label>
                    <input type="file" name="imagen" accept="image/*">
                    @error('imagen') <div class="form-error">{{ $message }}</div> @enderror
                </div>
            </div>
            <div style="display:flex;gap:10px;margin-top:8px">
                <button type="submit" class="btn btn-primary">💾 Guardar artículo</button>
                <a href="{{ route('articulos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
