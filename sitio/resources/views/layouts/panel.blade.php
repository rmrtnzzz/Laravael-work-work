<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel — Arte y Cultura Salvadoreña</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: #f5f0e8; color: #2d1810; display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar {
            width: 250px; min-height: 100vh; background: linear-gradient(180deg, #1a0a00 0%, #3d1a00 100%);
            color: #f5e6d3; display: flex; flex-direction: column; position: fixed; left: 0; top: 0; z-index: 100;
        }
        .sidebar-logo {
            padding: 24px 20px; border-bottom: 1px solid rgba(255,255,255,0.1);
            font-size: 1.1rem; font-weight: 700; color: #f4a832; display: flex; align-items: center; gap: 10px;
        }
        .sidebar-logo span { font-size: 1.8rem; }
        .sidebar-nav { flex: 1; padding: 16px 0; }
        .nav-section { padding: 8px 20px 4px; font-size: 0.7rem; text-transform: uppercase; color: rgba(255,255,255,0.4); letter-spacing: 1px; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 20px; color: #d4bfa0; text-decoration: none; transition: all 0.2s; font-size: 0.9rem; }
        .nav-item:hover, .nav-item.active { background: rgba(244,168,50,0.15); color: #f4a832; border-right: 3px solid #f4a832; }
        .nav-item svg { width: 18px; height: 18px; flex-shrink: 0; }
        .sidebar-user { padding: 16px 20px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.85rem; }
        .sidebar-user .user-name { color: #f5e6d3; font-weight: 600; }
        .sidebar-user .user-role { color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: capitalize; }
        .badge-role { display: inline-block; padding: 2px 8px; border-radius: 99px; font-size: 0.7rem; font-weight: 600; margin-top: 4px; }
        .badge-admin { background: #f4a832; color: #1a0a00; }
        .badge-trabajador { background: #2d6a4f; color: white; }
        .badge-visitante { background: #555; color: white; }
        .logout-btn { display: block; width: 100%; margin-top: 10px; padding: 8px; background: rgba(220,50,50,0.2); border: 1px solid rgba(220,50,50,0.3); color: #ff8080; border-radius: 6px; text-align: center; cursor: pointer; font-size: 0.85rem; }
        .logout-btn:hover { background: rgba(220,50,50,0.4); }

        /* MAIN */
        .main { margin-left: 250px; flex: 1; display: flex; flex-direction: column; }
        .topbar { background: white; padding: 16px 32px; border-bottom: 1px solid #e5ddd0; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 4px rgba(0,0,0,0.05); }
        .page-title { font-size: 1.2rem; font-weight: 700; color: #2d1810; }
        .content { padding: 32px; flex: 1; }

        /* ALERTAS */
        .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        /* CARDS */
        .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px; margin-bottom: 32px; }
        .stat-card { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); border-left: 4px solid #f4a832; }
        .stat-number { font-size: 2rem; font-weight: 800; color: #2d1810; }
        .stat-label { font-size: 0.8rem; color: #888; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 4px; }

        /* TABLA */
        .card { background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); overflow: hidden; }
        .card-header { padding: 20px 24px; border-bottom: 1px solid #f0e8dc; display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-weight: 700; font-size: 1rem; color: #2d1810; }
        table { width: 100%; border-collapse: collapse; }
        th { padding: 12px 16px; text-align: left; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px; color: #888; background: #faf7f2; border-bottom: 1px solid #f0e8dc; }
        td { padding: 14px 16px; border-bottom: 1px solid #f5f0e8; font-size: 0.9rem; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #faf7f2; }

        /* BOTONES */
        .btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 0.875rem; font-weight: 600; text-decoration: none; border: none; cursor: pointer; transition: all 0.2s; }
        .btn-primary { background: #c8721a; color: white; }
        .btn-primary:hover { background: #a85e14; }
        .btn-secondary { background: #f0e8dc; color: #2d1810; }
        .btn-secondary:hover { background: #e5d8c8; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #b02a37; }
        .btn-sm { padding: 5px 10px; font-size: 0.8rem; }
        .btn-success { background: #2d6a4f; color: white; }
        .btn-success:hover { background: #1b4332; }

        /* FORMULARIOS */
        .form-group { margin-bottom: 20px; }
        label { display: block; font-size: 0.85rem; font-weight: 600; color: #5a3e2b; margin-bottom: 6px; }
        input[type="text"], input[type="email"], input[type="password"], input[type="file"], select, textarea {
            width: 100%; padding: 10px 14px; border: 1.5px solid #e0d5c8; border-radius: 8px; font-size: 0.9rem;
            background: white; color: #2d1810; transition: border 0.2s; font-family: inherit;
        }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #c8721a; box-shadow: 0 0 0 3px rgba(200,114,26,0.15); }
        textarea { min-height: 120px; resize: vertical; }
        .form-error { color: #dc3545; font-size: 0.8rem; margin-top: 4px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

        /* BADGE CATEGORÍA */
        .badge { display: inline-block; padding: 3px 10px; border-radius: 99px; font-size: 0.75rem; font-weight: 600; }
        .badge-festividades { background: #ffd6e0; color: #c9184a; }
        .badge-tradiciones { background: #d4e6f1; color: #1a5276; }
        .badge-gastronomia { background: #d5f5e3; color: #1e8449; }
        .badge-artesanias { background: #fdebd0; color: #ca6f1e; }
        .badge-musica { background: #e8daef; color: #7d3c98; }
        .badge-danza { background: #d6eaf8; color: #1f618d; }
        .badge-historia { background: #f9ebea; color: #cb4335; }

        /* PAGINACIÓN */
        .pagination { display: flex; gap: 4px; padding: 16px; justify-content: center; }
        .pagination a, .pagination span { padding: 6px 12px; border-radius: 6px; font-size: 0.85rem; text-decoration: none; color: #2d1810; border: 1px solid #e0d5c8; }
        .pagination .active span { background: #c8721a; color: white; border-color: #c8721a; }
        .pagination a:hover { background: #faf7f2; }

        /* IMAGEN PREVIEW */
        .img-preview { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
        .img-placeholder { width: 60px; height: 60px; background: #f0e8dc; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #bbb; font-size: 1.5rem; }
    </style>
</head>
<body>
<aside class="sidebar">
    <div class="sidebar-logo">
        <span>🎭</span>
        <div>
            <div>Arte y Cultura</div>
            <div style="font-size:0.7rem;color:#d4bfa0;font-weight:400">El Salvador</div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">Panel</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            Inicio del Panel
        </a>

        <div class="nav-section">Contenido</div>
        <a href="{{ route('articulos.index') }}" class="nav-item {{ request()->routeIs('articulos.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/></svg>
            Artículos Culturales
        </a>

        @if(auth()->user()->isAdmin())
        <a href="{{ route('articulos.create') }}" class="nav-item {{ request()->routeIs('articulos.create') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
            Nuevo Artículo
        </a>

        <div class="nav-section">Administración</div>
        <a href="{{ route('estadisticas.index') }}" class="nav-item {{ request()->routeIs('estadisticas.*') ? 'active' : '' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
    Estadísticas
</a>
        @endif

        <div class="nav-section">Sitio</div>
        <a href="{{ route('inicio') }}" class="nav-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9,22 9,12 15,12 15,22"/></svg>
            Ver Sitio Público
        </a>
    </nav>

    <div class="sidebar-user">
        <div class="user-name">{{ auth()->user()->name }}</div>
        <div class="user-role">{{ auth()->user()->email }}</div>
        <span class="badge-role badge-{{ auth()->user()->role }}">{{ ucfirst(auth()->user()->role) }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">⏻ Cerrar sesión</button>
        </form>
    </div>
</aside>

<div class="main">
    <div class="topbar">
        <div class="page-title">@yield('page-title', 'Panel')</div>
        <div style="font-size:0.85rem;color:#888">{{ now()->locale('es')->isoFormat('dddd, D [de] MMMM YYYY') }}</div>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>
