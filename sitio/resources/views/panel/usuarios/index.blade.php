@extends('layouts.panel')
@section('page-title', 'Gestión de Usuarios')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">👥 Todos los usuarios</span>
    </div>
    <table>
        <thead>
            <tr><th>Nombre</th><th>Correo</th><th>Rol</th><th>Registrado</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td><strong>{{ $user->name }}</strong> {{ $user->id === auth()->id() ? '<span style="font-size:0.75rem;color:#aaa">(tú)</span>' : '' }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="badge-role badge-{{ $user->role }}" style="padding:3px 10px;border-radius:99px;font-size:0.75rem;font-weight:600">{{ ucfirst($user->role) }}</span></td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                <td style="display:flex;gap:6px">
                    <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-primary btn-sm">✏️ Editar</a>
                    @if($user->id !== auth()->id())
                    <form method="POST" action="{{ route('usuarios.destroy', $user) }}" onsubmit="return confirm('¿Eliminar a {{ $user->name }}?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">🗑</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:32px;color:#aaa">Sin usuarios.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination">{{ $users->links() }}</div>
</div>
@endsection
