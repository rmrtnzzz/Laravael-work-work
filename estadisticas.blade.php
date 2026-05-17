@extends('layouts.panel')
@section('page-title', 'Estadísticas')
@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
    <div>
        <h2 style="font-size:1.3rem;color:#1e293b;font-weight:800">📊 Estadísticas del sistema</h2>
        <p style="color:#888;font-size:0.85rem;margin-top:4px">Resumen general de artículos y usuarios registrados</p>
    </div>
    <a href="{{ route('estadisticas.exportar') }}" class="btn btn-success" style="display:flex;align-items:center;gap:8px">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Descargar Excel (.xls)</a>
    <a href="{{ route('estadisticas.pdf') }}" target="_blank" class="btn btn-primary" style="display:flex;align-items:center;gap:8px">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/></svg>
        Ver Reporte PDF
    </a>
</div>

{{-- STATS GENERALES --}}
<div class="stat-grid" style="margin-bottom:32px">
    <div class="stat-card">
        <div class="stat-number">{{ $totalArticulos }}</div>
        <div class="stat-label">Total artículos</div>
    </div>
    <div class="stat-card" style="border-left-color:#0369a1">
        <div class="stat-number">{{ $totalUsuarios }}</div>
        <div class="stat-label">Total usuarios</div>
    </div>
    <div class="stat-card" style="border-left-color:#7d3c98">
        <div class="stat-number">{{ $porCategoria->count() }}</div>
        <div class="stat-label">Categorías usadas</div>
    </div>
    <div class="stat-card" style="border-left-color:#1a5276">
        <div class="stat-number">{{ $porRegion->count() }}</div>
        <div class="stat-label">Departamentos con artículos</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:24px">

    {{-- POR CATEGORÍA --}}
    <div class="card">
        <div class="card-header">
            <span class="card-title">🎭 Artículos por categoría</span>
        </div>
        <div style="padding:20px">
            @php $totalCat = $porCategoria->sum('total'); @endphp
            @foreach($porCategoria as $row)
            @php $pct = $totalCat > 0 ? round(($row->total / $totalCat) * 100) : 0; @endphp
            <div style="margin-bottom:14px">
                <div style="display:flex;justify-content:space-between;margin-bottom:4px">
                    <span style="font-size:0.85rem;font-weight:600;color:#1e293b">{{ ucfirst($row->categoria) }}</span>
                    <span style="font-size:0.85rem;color:#888">{{ $row->total }} ({{ $pct }}%)</span>
                </div>
                <div style="background:#e2e8f0;border-radius:99px;height:10px;overflow:hidden">
                    <div style="background:linear-gradient(90deg,#1a56db,#38bdf8);height:100%;width:{{ $pct }}%;border-radius:99px;transition:width 0.5s"></div>
                </div>
            </div>
            @endforeach
            @if($porCategoria->isEmpty())
                <p style="color:#aaa;text-align:center;padding:20px">Sin datos aún.</p>
            @endif
        </div>
    </div>

    {{-- POR REGIÓN --}}
    <div class="card">
        <div class="card-header">
            <span class="card-title">📍 Artículos por departamento</span>
        </div>
        <div style="padding:20px">
            @php $totalReg = $porRegion->sum('total'); @endphp
            @foreach($porRegion as $row)
            @php $pct = $totalReg > 0 ? round(($row->total / $totalReg) * 100) : 0; @endphp
            <div style="margin-bottom:14px">
                <div style="display:flex;justify-content:space-between;margin-bottom:4px">
                    <span style="font-size:0.85rem;font-weight:600;color:#1e293b">{{ $row->region }}</span>
                    <span style="font-size:0.85rem;color:#888">{{ $row->total }} ({{ $pct }}%)</span>
                </div>
                <div style="background:#e2e8f0;border-radius:99px;height:10px;overflow:hidden">
                    <div style="background:linear-gradient(90deg,#0369a1,#0ea5e9);height:100%;width:{{ $pct }}%;border-radius:99px"></div>
                </div>
            </div>
            @endforeach
            @if($porRegion->isEmpty())
                <p style="color:#aaa;text-align:center;padding:20px">Sin datos aún.</p>
            @endif
        </div>
    </div>
</div>

{{-- USUARIOS POR ROL --}}
<div class="card" style="max-width:500px">
    <div class="card-header">
        <span class="card-title">👥 Usuarios por rol</span>
    </div>
    <table>
        <thead>
            <tr><th>Rol</th><th>Total</th></tr>
        </thead>
        <tbody>
            @foreach($porRol as $row)
            <tr>
                <td><span class="badge-role badge-{{ $row->role }}" style="padding:3px 12px;border-radius:99px;font-size:0.8rem;font-weight:700">{{ ucfirst($row->role) }}</span></td>
                <td><strong>{{ $row->total }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
