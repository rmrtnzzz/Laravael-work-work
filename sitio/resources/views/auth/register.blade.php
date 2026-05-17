<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse — Arte y Cultura Salvadoreña</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', sans-serif; min-height: 100vh;
            background: linear-gradient(135deg, #1a0a00 0%, #3d1a00 50%, #6b2d00 100%);
            display: flex; align-items: center; justify-content: center; padding: 24px;
        }
        .auth-card { background: white; border-radius: 20px; padding: 40px; width: 100%; max-width: 420px; box-shadow: 0 20px 60px rgba(0,0,0,0.4); }
        .auth-logo { text-align: center; margin-bottom: 28px; }
        .auth-logo .icon { font-size: 3rem; display: block; margin-bottom: 8px; }
        .auth-logo h1 { font-size: 1.4rem; font-weight: 800; color: #2d1810; }
        .auth-logo p { font-size: 0.85rem; color: #888; margin-top: 4px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-size: 0.85rem; font-weight: 600; color: #5a3e2b; margin-bottom: 6px; }
        input[type="email"], input[type="password"], input[type="text"] {
            width: 100%; padding: 11px 14px; border: 1.5px solid #e0d5c8; border-radius: 10px;
            font-size: 0.95rem; color: #2d1810; transition: border 0.2s; font-family: inherit;
        }
        input:focus { outline: none; border-color: #c8721a; box-shadow: 0 0 0 3px rgba(200,114,26,0.15); }
        .form-error { color: #dc3545; font-size: 0.8rem; margin-top: 4px; }
        .btn-submit { width: 100%; padding: 12px; background: linear-gradient(135deg, #c8721a, #a85e14); color: white; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.2s; margin-top: 8px; }
        .btn-submit:hover { background: linear-gradient(135deg, #a85e14, #8a4e10); transform: translateY(-1px); }
        .auth-footer { text-align: center; margin-top: 20px; font-size: 0.85rem; color: #888; }
        .auth-footer a { color: #c8721a; text-decoration: none; font-weight: 600; }
        .info-box { background: #fdf8f0; border: 1px solid #f0e8dc; border-radius: 10px; padding: 12px 14px; margin-bottom: 20px; font-size: 0.82rem; color: #5a3e2b; }
        .back-home { display: block; text-align: center; margin-bottom: 20px; color: #d4bfa0; font-size: 0.85rem; text-decoration: none; }
        .back-home:hover { color: #f4a832; }
    </style>
</head>
<body>
    <div>
        <a href="{{ route('inicio') }}" class="back-home">← Volver al sitio principal</a>
        <div class="auth-card">
            <div class="auth-logo">
                <span class="icon">🇸🇻</span>
                <h1>Crear cuenta</h1>
                <p>Únete a la comunidad cultural salvadoreña</p>
            </div>

            <div class="info-box">
                ℹ️ Al registrarte tendrás acceso al sitio público. Los roles de administrador y trabajador son asignados por el administrador.
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre completo</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                    @error('password') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn-submit">Crear cuenta</button>
            </form>

            <div class="auth-footer">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar sesión</a>
            </div>
        </div>
    </div>
</body>
</html>
