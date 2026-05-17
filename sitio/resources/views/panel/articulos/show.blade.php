@extends('layouts.panel')
@section('page-title', $articulo->titulo)
@section('content')
<div class="card" style="max-width:800px">
    <div class="card-header">
        <span class="card-title">👁 Ver artículo</span>
        <div style="display:flex;gap:8px">
            @if(auth()->user()->isAdmin())
                <a href="{{ route('articulos.edit', $articulo) }}" class="btn btn-primary btn-sm">✏️ Editar</a>
            @endif
            <a href="{{ route('articulos.index') }}" class="btn btn-secondary btn-sm">← Volver</a>
        </div>
    </div>
    <div style="padding:24px">
        @if($articulo->imagen)
            <img src="{{ asset('storage/'.$articulo->imagen) }}" style="width:100%;max-height:300px;object-fit:cover;border-radius:10px;margin-bottom:20px">
        @endif
        <div style="display:flex;gap:10px;margin-bottom:16px;flex-wrap:wrap">
            <span class="badge badge-{{ $articulo->categoria }}" style="font-size:0.9rem;padding:5px 14px">{{ ucfirst($articulo->categoria) }}</span>
            @if($articulo->region)
                <span style="background:#f0e8dc;padding:5px 14px;border-radius:99px;font-size:0.85rem">📍 {{ $articulo->region }}</span>
            @endif
        </div>
        <h2 style="font-size:1.5rem;margin-bottom:12px;color:#2d1810">{{ $articulo->titulo }}</h2>
        <p style="color:#555;line-height:1.8;font-size:0.95rem">{{ $articulo->descripcion }}</p>
        <div style="margin-top:24px;padding-top:16px;border-top:1px solid #f0e8dc;font-size:0.8rem;color:#aaa">
            Publicado por <strong>{{ $articulo->user->name }}</strong> el {{ $articulo->created_at->format('d/m/Y H:i') }}
        </div>
    </div>
</div>
@endsection
