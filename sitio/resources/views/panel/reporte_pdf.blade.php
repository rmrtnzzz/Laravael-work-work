<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Estadístico — Arte y Cultura Salvadoreña</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; color: #1e293b; background: white; font-size: 13px; }

        /* PORTADA */
        .portada {
            width: 100%; min-height: 100vh; background: linear-gradient(160deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; padding: 60px 40px; page-break-after: always;
        }
        .portada-flag { font-size: 5rem; margin-bottom: 24px; }
        .portada-titulo { font-size: 2.2rem; font-weight: 900; color: #38bdf8; margin-bottom: 12px; line-height: 1.2; }
        .portada-sub { font-size: 1.1rem; color: #bfdbfe; margin-bottom: 40px; }
        .portada-linea { width: 80px; height: 4px; background: #38bdf8; margin: 0 auto 40px; border-radius: 2px; }
        .portada-info { background: rgba(255,255,255,0.08); border: 1px solid rgba(56,189,248,0.3); border-radius: 12px; padding: 24px 40px; color: #bfdbfe; }
        .portada-info .label { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; color: #7dd3fc; margin-bottom: 4px; }
        .portada-info .valor { font-size: 1rem; font-weight: 700; color: white; margin-bottom: 16px; }
        .portada-info .valor:last-child { margin-bottom: 0; }

        /* CONTENIDO */
        .pagina { padding: 40px 50px; }
        .encabezado-pagina {
            display: flex; justify-content: space-between; align-items: center;
            border-bottom: 3px solid #1a56db; padding-bottom: 12px; margin-bottom: 30px;
        }
        .encabezado-pagina .titulo-seccion { font-size: 1.4rem; font-weight: 900; color: #0f172a; }
        .encabezado-pagina .fecha { font-size: 0.8rem; color: #64748b; }
        .marca-agua { font-size: 0.75rem; color: #94a3b8; }

        /* RESUMEN GENERAL */
        .resumen-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 36px; }
        .resumen-card {
            background: linear-gradient(135deg, #1e3a5f, #1a56db);
            border-radius: 12px; padding: 20px; text-align: center; color: white;
        }
        .resumen-card .numero { font-size: 2.2rem; font-weight: 900; color: #38bdf8; }
        .resumen-card .etiqueta { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: #bfdbfe; margin-top: 4px; }

        /* SECCIÓN */
        .seccion { margin-bottom: 36px; }
        .seccion-titulo {
            font-size: 1rem; font-weight: 800; color: #1e293b;
            background: #eff6ff; border-left: 4px solid #1a56db;
            padding: 10px 16px; border-radius: 0 8px 8px 0; margin-bottom: 16px;
        }

        /* TABLA */
        table { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        thead th {
            background: #1a56db; color: white; padding: 10px 14px;
            text-align: left; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;
        }
        thead th:last-child { text-align: center; }
        tbody td { padding: 10px 14px; border-bottom: 1px solid #e2e8f0; font-size: 0.88rem; }
        tbody tr:nth-child(even) td { background: #f8fafc; }
        tbody tr:last-child td { border-bottom: none; font-weight: 700; background: #eff6ff; }
        .td-center { text-align: center; }
        .td-right { text-align: right; }

        /* BARRA */
        .barra-container { margin-bottom: 10px; }
        .barra-label { display: flex; justify-content: space-between; margin-bottom: 4px; font-size: 0.82rem; }
        .barra-label .nombre { font-weight: 600; color: #1e293b; }
        .barra-label .cantidad { color: #64748b; }
        .barra-fondo { background: #e2e8f0; border-radius: 99px; height: 14px; overflow: hidden; }
        .barra-fill { background: linear-gradient(90deg, #1a56db, #38bdf8); height: 100%; border-radius: 99px; }
        .barra-fill-verde { background: linear-gradient(90deg, #0369a1, #0ea5e9); }

        /* BADGE */
        .badge { display: inline-block; padding: 3px 10px; border-radius: 99px; font-size: 0.75rem; font-weight: 700; }
        .badge-admin { background: #dbeafe; color: #1d4ed8; }
        .badge-trabajador { background: #dcfce7; color: #166534; }
        .badge-visitante { background: #f1f5f9; color: #475569; }

        /* PIE DE PÁGINA */
        .pie {
            margin-top: 40px; padding-top: 16px; border-top: 1px solid #e2e8f0;
            display: flex; justify-content: space-between; font-size: 0.75rem; color: #94a3b8;
        }

        /* PRINT */
        @media print {
            .portada { min-height: 100vh; }
            .no-print { display: none; }
        }
        @page { margin: 0; }
    </style>
</head>
<body>

<!-- BOTÓN IMPRIMIR (no aparece al imprimir) -->
<div class="no-print" style="position:fixed;top:20px;right:20px;z-index:999;display:flex;gap:10px">
    <button onclick="window.print()" style="background:#1a56db;color:white;border:none;padding:12px 24px;border-radius:8px;font-size:0.95rem;font-weight:700;cursor:pointer;box-shadow:0 4px 12px rgba(26,86,219,0.4)">
        🖨️ Descargar / Imprimir PDF
    </button>
    <a href="{{ route('estadisticas.index') }}" style="background:#e2e8f0;color:#1e293b;border:none;padding:12px 24px;border-radius:8px;font-size:0.95rem;font-weight:700;cursor:pointer;text-decoration:none">
        ← Volver
    </a>
</div>

<!-- ====== PORTADA ====== -->
<div class="portada">
    <div class="portada-flag">🇸🇻</div>
    <div class="portada-titulo">Reporte Estadístico<br>Arte y Cultura Salvadoreña</div>
    <div class="portada-sub">Análisis de contenido cultural registrado en el sistema</div>
    <div class="portada-linea"></div>
    <div class="portada-info">
        <div class="label">Fecha de generación</div>
        <div class="valor">{{ now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}</div>
        <div class="label">Generado por</div>
        <div class="valor">{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</div>
        <div class="label">Total de artículos</div>
        <div class="valor">{{ $totalArticulos }} artículos registrados</div>
    </div>
</div>

<!-- ====== PÁGINA 1: RESUMEN ====== -->
<div class="pagina">
    <div class="encabezado-pagina">
        <div>
            <div class="titulo-seccion">📊 Resumen General del Sistema</div>
            <div class="marca-agua">Arte y Cultura Salvadoreña — Sistema de Gestión Cultural</div>
        </div>
        <div class="fecha">{{ now()->format('d/m/Y H:i') }}</div>
    </div>

    <!-- CARDS RESUMEN -->
    <div class="resumen-grid">
        <div class="resumen-card">
            <div class="numero">{{ $totalArticulos }}</div>
            <div class="etiqueta">Total Artículos</div>
        </div>
        <div class="resumen-card">
            <div class="numero">{{ $totalUsuarios }}</div>
            <div class="etiqueta">Total Usuarios</div>
        </div>
        <div class="resumen-card">
            <div class="numero">{{ $porCategoria->count() }}</div>
            <div class="etiqueta">Categorías</div>
        </div>
        <div class="resumen-card">
            <div class="numero">{{ $porRegion->count() }}</div>
            <div class="etiqueta">Departamentos</div>
        </div>
    </div>

    <!-- CATEGORÍAS: BARRAS -->
    <div class="seccion">
        <div class="seccion-titulo">🎭 Distribución por Categoría Cultural</div>
        @php $maxCat = $porCategoria->max('total') ?: 1; @endphp
        @foreach($porCategoria as $row)
        @php $pct = round(($row->total / $maxCat) * 100); $pctReal = $totalArticulos > 0 ? round(($row->total / $totalArticulos) * 100, 1) : 0; @endphp
        <div class="barra-container">
            <div class="barra-label">
                <span class="nombre">{{ ucfirst($row->categoria) }}</span>
                <span class="cantidad">{{ $row->total }} artículos ({{ $pctReal }}%)</span>
            </div>
            <div class="barra-fondo">
                <div class="barra-fill" style="width:{{ $pct }}%"></div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- TABLA CATEGORÍAS -->
    <div class="seccion">
        <div class="seccion-titulo">📋 Tabla detallada por categoría</div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Categoría</th>
                    <th>Artículos</th>
                    <th>% del total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($porCategoria as $i => $row)
                @php $pctReal = $totalArticulos > 0 ? round(($row->total / $totalArticulos) * 100, 1) : 0; @endphp
                <tr>
                    <td class="td-center">{{ $i + 1 }}</td>
                    <td>{{ ucfirst($row->categoria) }}</td>
                    <td class="td-center">{{ $row->total }}</td>
                    <td class="td-center">{{ $pctReal }}%</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2">TOTAL</td>
                    <td class="td-center">{{ $totalArticulos }}</td>
                    <td class="td-center">100%</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- DEPARTAMENTOS: BARRAS -->
    <div class="seccion">
        <div class="seccion-titulo">📍 Distribución por Departamento</div>
        @php $maxReg = $porRegion->max('total') ?: 1; @endphp
        @foreach($porRegion as $row)
        @php $pct = round(($row->total / $maxReg) * 100); @endphp
        <div class="barra-container">
            <div class="barra-label">
                <span class="nombre">{{ $row->region }}</span>
                <span class="cantidad">{{ $row->total }} artículos</span>
            </div>
            <div class="barra-fondo">
                <div class="barra-fill barra-fill-verde" style="width:{{ $pct }}%"></div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- TABLA DEPARTAMENTOS -->
    <div class="seccion">
        <div class="seccion-titulo">📋 Tabla detallada por departamento</div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Departamento</th>
                    <th>Artículos registrados</th>
                </tr>
            </thead>
            <tbody>
                @foreach($porRegion as $i => $row)
                <tr>
                    <td class="td-center">{{ $i + 1 }}</td>
                    <td>{{ $row->region }}</td>
                    <td class="td-center">{{ $row->total }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2">TOTAL</td>
                    <td class="td-center">{{ $porRegion->sum('total') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- USUARIOS POR ROL -->
    <div class="seccion">
        <div class="seccion-titulo">👥 Usuarios registrados por rol</div>
        <table>
            <thead>
                <tr>
                    <th>Rol</th>
                    <th>Total usuarios</th>
                    <th>% del total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($porRol as $row)
                @php $pctRol = $totalUsuarios > 0 ? round(($row->total / $totalUsuarios) * 100, 1) : 0; @endphp
                <tr>
                    <td><span class="badge badge-{{ $row->role }}">{{ ucfirst($row->role) }}</span></td>
                    <td class="td-center">{{ $row->total }}</td>
                    <td class="td-center">{{ $pctRol }}%</td>
                </tr>
                @endforeach
                <tr>
                    <td>TOTAL</td>
                    <td class="td-center">{{ $totalUsuarios }}</td>
                    <td class="td-center">100%</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- PIE -->
    <div class="pie">
        <span>🇸🇻 Arte y Cultura Salvadoreña — Sistema de Gestión Cultural</span>
        <span>Generado el {{ now()->format('d/m/Y \a \l\a\s H:i') }} por {{ auth()->user()->name }}</span>
    </div>
</div>

<script>
    // Auto-abrir diálogo de impresión al cargar
    window.onload = function() {
        // Pequeño delay para que cargue bien
        setTimeout(function() {
            // No auto-imprimir, esperar que el usuario presione el botón
        }, 500);
    }
</script>
</body>
</html>
