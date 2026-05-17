<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arte y Cultura Salvadoreña</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: #fdf8f0; color: #2d1810; }

        /* NAV */
        nav { background: linear-gradient(90deg, #1a0a00, #3d1a00); padding: 0 32px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(0,0,0,0.3); }
        .nav-brand { display: flex; align-items: center; gap: 10px; color: #f4a832; font-weight: 800; font-size: 1.1rem; padding: 14px 0; text-decoration: none; }
        .nav-links { display: flex; align-items: center; gap: 8px; }
        .nav-links a { color: #d4bfa0; text-decoration: none; padding: 8px 16px; border-radius: 8px; font-size: 0.9rem; transition: all 0.2s; }
        .nav-links a:hover { background: rgba(244,168,50,0.2); color: #f4a832; }
        .nav-links .btn-nav { background: #c8721a; color: white !important; }
        .nav-links .btn-nav:hover { background: #a85e14; }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1a0a00 0%, #3d1a00 40%, #6b2d00 100%);
            padding: 80px 32px; text-align: center; position: relative; overflow: hidden;
        }
        .hero::before {
            content: ''; position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23f4a832' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .hero-content { position: relative; max-width: 700px; margin: 0 auto; }
        .hero-emoji { font-size: 4rem; margin-bottom: 16px; display: block; }
        .hero h1 { font-size: 2.8rem; font-weight: 900; color: #f4a832; line-height: 1.2; margin-bottom: 16px; }
        .hero p { font-size: 1.1rem; color: #d4bfa0; line-height: 1.7; margin-bottom: 32px; }
        .hero-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
        .hero-btn { padding: 12px 28px; border-radius: 10px; font-size: 1rem; font-weight: 700; text-decoration: none; transition: all 0.2s; }
        .hero-btn-gold { background: #f4a832; color: #1a0a00; }
        .hero-btn-gold:hover { background: #e09520; transform: translateY(-2px); }
        .hero-btn-outline { border: 2px solid rgba(244,168,50,0.5); color: #f4a832; }
        .hero-btn-outline:hover { background: rgba(244,168,50,0.1); }

        /* STATS BAR */
        .stats-bar { background: #f4a832; padding: 20px 32px; display: flex; justify-content: center; gap: 60px; }
        .stat { text-align: center; }
        .stat-n { font-size: 1.8rem; font-weight: 900; color: #1a0a00; }
        .stat-l { font-size: 0.8rem; color: #5a3e00; font-weight: 600; text-transform: uppercase; }

        /* SECCIONES */
        section { max-width: 1100px; margin: 0 auto; padding: 60px 24px; }
        .section-title { font-size: 1.8rem; font-weight: 900; color: #2d1810; margin-bottom: 8px; }
        .section-sub { color: #888; margin-bottom: 40px; font-size: 1rem; }
        .section-title span { color: #c8721a; }

        /* CARDS DE ARTÍCULOS */
        .grid-3 { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; }
        .art-card { background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.08); transition: transform 0.2s, box-shadow 0.2s; }
        .art-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.14); }
        .art-card-img { height: 180px; background: linear-gradient(135deg, #3d1a00, #6b2d00); display: flex; align-items: center; justify-content: center; font-size: 4rem; position: relative; overflow: hidden; }
        .art-card-img img { width: 100%; height: 100%; object-fit: cover; }
        .art-card-body { padding: 20px; }
        .art-card-category { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #c8721a; margin-bottom: 6px; }
        .art-card-title { font-size: 1.05rem; font-weight: 700; color: #2d1810; margin-bottom: 8px; line-height: 1.3; }
        .art-card-desc { font-size: 0.875rem; color: #666; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .art-card-footer { padding: 0 20px 16px; display: flex; justify-content: space-between; align-items: center; font-size: 0.8rem; color: #aaa; }
        .region-tag { background: #fdf0e0; color: #c8721a; padding: 3px 10px; border-radius: 99px; font-size: 0.75rem; font-weight: 600; }

        /* CATEGORÍAS */
        .cat-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 16px; }
        .cat-card { background: white; border-radius: 12px; padding: 20px 16px; text-align: center; border: 2px solid #f0e8dc; transition: all 0.2s; cursor: default; }
        .cat-card:hover { border-color: #c8721a; transform: translateY(-2px); }
        .cat-icon { font-size: 2.2rem; margin-bottom: 8px; display: block; }
        .cat-name { font-size: 0.85rem; font-weight: 700; color: #2d1810; }

        /* FOOTER */
        footer { background: #1a0a00; color: #d4bfa0; text-align: center; padding: 32px; font-size: 0.85rem; }
        footer strong { color: #f4a832; }

        /* INFO BAND */
        .info-band { background: linear-gradient(135deg, #2d6a4f, #1b4332); padding: 60px 32px; text-align: center; }
        .info-band h2 { color: #f4a832; font-size: 1.8rem; margin-bottom: 12px; }
        .info-band p { color: #a8d5b5; max-width: 600px; margin: 0 auto 24px; line-height: 1.7; }
        .info-band a { background: #f4a832; color: #1a0a00; padding: 12px 28px; border-radius: 10px; text-decoration: none; font-weight: 700; }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('inicio') }}" class="nav-brand">🎭 Arte y Cultura Salvadoreña</a>
    <div class="nav-links">
        @auth
            @if(auth()->user()->isAdmin() || auth()->user()->isTrabajador())
                <a href="{{ route('dashboard') }}">📊 Panel</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" style="background:none;border:none;cursor:pointer;color:#d4bfa0;padding:8px 16px;font-size:0.9rem">Salir</button>
            </form>
        @else
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn-nav">Registrarse</a>
        @endauth
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div class="hero-content">
        <span class="hero-emoji">🇸🇻</span>
        <h1>Arte y Cultura de El Salvador</h1>
        <p>Descubre las tradiciones, festividades, gastronomía, artesanías y expresiones artísticas que forman la identidad del pueblo salvadoreño.</p>
        <div class="hero-btns">
            <a href="#articulos" class="hero-btn hero-btn-gold">Explorar contenido</a>
            @guest
                <a href="{{ route('register') }}" class="hero-btn hero-btn-outline">Crear cuenta</a>
            @endguest
        </div>
    </div>
</div>

<!-- STATS -->
<div class="stats-bar">
    <div class="stat">
        <div class="stat-n">14</div>
        <div class="stat-l">Departamentos</div>
    </div>
    <div class="stat">
        <div class="stat-n">{{ \App\Models\Articulo::count() }}</div>
        <div class="stat-l">Artículos culturales</div>
    </div>
    <div class="stat">
        <div class="stat-n">7</div>
        <div class="stat-l">Categorías</div>
    </div>
</div>

<!-- CATEGORÍAS -->
<section>
    <div class="section-title">Explora por <span>categoría</span></div>
    <div class="section-sub">Navega por las distintas expresiones de la cultura salvadoreña</div>
    <div class="cat-grid">
        <div class="cat-card"><span class="cat-icon">🎉</span><div class="cat-name">Festividades</div></div>
        <div class="cat-card"><span class="cat-icon">🧵</span><div class="cat-name">Tradiciones</div></div>
        <div class="cat-card"><span class="cat-icon">🍲</span><div class="cat-name">Gastronomía</div></div>
        <div class="cat-card"><span class="cat-icon">🏺</span><div class="cat-name">Artesanías</div></div>
        <div class="cat-card"><span class="cat-icon">🎶</span><div class="cat-name">Música</div></div>
        <div class="cat-card"><span class="cat-icon">💃</span><div class="cat-name">Danza</div></div>
        <div class="cat-card"><span class="cat-icon">📜</span><div class="cat-name">Historia</div></div>
    </div>
</section>

<!-- ARTÍCULOS -->
<section id="articulos" style="padding-top:0">
    <div class="section-title">Artículos <span>destacados</span></div>
    <div class="section-sub">Conoce nuestra cultura a través de sus expresiones más representativas</div>
    <div class="grid-3">
        @forelse($articulos as $art)
        <div class="art-card">
            <div class="art-card-img">
                @if($art->imagen)
                    <img src="{{ asset('storage/'.$art->imagen) }}" alt="{{ $art->titulo }}">
                @else
                    {{ ['🎭','🏺','🍲','💃','🎶','📜','🎉'][array_rand(['🎭','🏺','🍲','💃','🎶','📜','🎉'])] }}
                @endif
            </div>
            <div class="art-card-body">
                <div class="art-card-category">{{ ucfirst($art->categoria) }}</div>
                <div class="art-card-title">{{ $art->titulo }}</div>
                <div class="art-card-desc">{{ $art->descripcion }}</div>
            </div>
            <div class="art-card-footer">
                @if($art->region)
                    <span class="region-tag">📍 {{ $art->region }}</span>
                @else
                    <span></span>
                @endif
                <span>{{ $art->created_at->format('d/m/Y') }}</span>
            </div>
        </div>
        @empty
        <div style="grid-column:1/-1;text-align:center;color:#aaa;padding:60px">No hay artículos publicados aún.</div>
        @endforelse
    </div>
</section>

<!-- INFO BAND -->
<div class="info-band">
    <h2>¿Quieres contribuir?</h2>
    <p>Regístrate en nuestra plataforma y sé parte de la comunidad que preserva y difunde la cultura salvadoreña.</p>
    @guest
        <a href="{{ route('register') }}">Crear cuenta gratuita</a>
    @else
        @if(auth()->user()->isAdmin() || auth()->user()->isTrabajador())
            <a href="{{ route('dashboard') }}">Ir al panel de administración</a>
        @endif
    @endguest
</div>

<footer>
    <p><strong>Arte y Cultura Salvadoreña</strong> — Preservando la identidad del pueblo salvadoreño 🇸🇻</p>
    <p style="margin-top:8px;color:#666">{{ now()->year }} · Desarrollado con ❤️ en El Salvador</p>
</footer>

</body>
</html>
