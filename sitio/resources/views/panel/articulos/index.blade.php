@extends('layouts.panel')
@section('page-title', 'Artículos Culturales')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">🗂️ Todos los artículos</span>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('articulos.create') }}" class="btn btn-primary">+ Nuevo artículo</a>
        @endif
    </div>
    <table>
        <thead>
            <tr>
                <th>Imagen</th><th>Título</th><th>Categoría</th><th>Región</th><th>Autor</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articulos as $art)
            <tr>
                <td>
                    @if($art->imagen)
                        <img src="{{ asset('storage/'.$art->imagen) }}" class="img-preview" alt="">
                    @else
                        <div class="img-placeholder">🎭</div>
                    @endif
                </td>
                <td><strong>{{ $art->titulo }}</strong></td>
                <td><span class="badge badge-{{ $art->categoria }}">{{ ucfirst($art->categoria) }}</span></td>
                <td>{{ $art->region ?? '—' }}</td>
                <td>{{ $art->user->name ?? '—' }}</td>
                <td style="display:flex;gap:6px;flex-wrap:wrap">
                    <a href="{{ route('articulos.show', $art) }}" class="btn btn-secondary btn-sm">👁 Ver</a>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('articulos.edit', $art) }}" class="btn btn-primary btn-sm">✏️ Editar</a>
                        <form method="POST" action="{{ route('articulos.destroy', $art) }}" onsubmit="return confirm('¿Eliminar este artículo?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑 Borrar</button>
                        </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;color:#aaa;padding:32px">No hay artículos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination">{{ $articulos->links() }}</div>
</div>
@endsection
