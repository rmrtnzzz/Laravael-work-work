@extends('layouts.panel')
@section('page-title', 'Editar Usuario')
@section('content')
<div class="card" style="max-width:500px">
    <div class="card-header">
        <span class="card-title">✏️ Editar: {{ $user->name }}</span>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary btn-sm">← Volver</a>
    </div>
    <div style="padding:24px">
        <form method="POST" action="{{ route('usuarios.update', $user) }}">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Nombre *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Correo electrónico *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Rol *</label>
                <select name="role" required>
                    <option value="admin"      {{ old('role', $user->role) == 'admin'      ? 'selected' : '' }}>Admin</option>
                    <option value="trabajador" {{ old('role', $user->role) == 'trabajador' ? 'selected' : '' }}>Trabajador</option>
                    <option value="visitante"  {{ old('role', $user->role) == 'visitante'  ? 'selected' : '' }}>Visitante</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nueva contraseña <span style="color:#aaa;font-weight:400">(dejar vacío para no cambiar)</span></label>
                <input type="password" name="password" placeholder="Mínimo 8 caracteres">
                @error('password') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Confirmar contraseña</label>
                <input type="password" name="password_confirmation">
            </div>
            <div style="display:flex;gap:10px">
                <button type="submit" class="btn btn-primary">💾 Guardar cambios</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
