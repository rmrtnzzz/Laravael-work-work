@extends('layouts.panel')

@section('page-title', 'Dashboard')

@section('content')
<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $totalArticulos }}</div>
        <div class="stat-label">Artículos registrados</div>
    </div>
    <div class="stat-card" style="border-left-color:#2d6a4f">
        <div class="stat-number">{{ $totalUsuarios }}</div>
        <div class="stat-label">Usuarios registrados</div>
    </div>
    <div class="stat-card" style="border-left-color:#7d3c98">
        <div class="stat-number">{{ ucfirst(auth()->user()->role) }}</div>
        <div class="stat-label">Tu rol actual</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">📋 Artículos recientes</span>
        <a href="{{ route('articulos.index') }}" class="btn btn-secondary btn-sm">Ver todos</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Categoría</th>
                <th>Región</th>
                <th>Autor</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recientes as $art)
            <tr>
                <td><strong>{{ $art->titulo }}</strong></td>
                <td><span class="badge badge-{{ $art->categoria }}">{{ ucfirst($art->categoria) }}</span></td>
                <td>{{ $art->region ?? '—' }}</td>
                <td>{{ $art->user->name ?? '—' }}</td>
                <td>{{ $art->created_at->format('d/m/Y') }}</td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#aaa;padding:32px">No hay artículos aún.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
