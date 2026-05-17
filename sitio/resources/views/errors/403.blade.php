<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso denegado</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #1a0a00; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .box { background: white; border-radius: 20px; padding: 48px; text-align: center; max-width: 420px; }
        .icon { font-size: 4rem; margin-bottom: 16px; }
        h1 { color: #2d1810; font-size: 1.5rem; margin-bottom: 8px; }
        p { color: #888; margin-bottom: 24px; }
        a { background: #c8721a; color: white; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; }
    </style>
</head>
<body>
    <div class="box">
        <div class="icon">🚫</div>
        <h1>Acceso denegado</h1>
        <p>No tienes permisos para ver esta sección. Contacta al administrador si crees que es un error.</p>
        <a href="{{ route('inicio') }}">Volver al inicio</a>
    </div>
</body>
</html>
