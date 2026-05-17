<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\User;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    private function getDatos(): array
    {
        return [
            'porCategoria'   => Articulo::selectRaw('categoria, COUNT(*) as total')->groupBy('categoria')->orderByDesc('total')->get(),
            'porRegion'      => Articulo::selectRaw('region, COUNT(*) as total')->whereNotNull('region')->groupBy('region')->orderByDesc('total')->get(),
            'porRol'         => User::selectRaw('role, COUNT(*) as total')->groupBy('role')->get(),
            'totalArticulos' => Articulo::count(),
            'totalUsuarios'  => User::count(),
        ];
    }

    public function index()
    {
        return view('panel.estadisticas', $this->getDatos());
    }

    public function reportePdf()
    {
        return view('panel.reporte_pdf', $this->getDatos());
    }

    public function exportar()
    {
        $porCategoria   = Articulo::selectRaw('categoria, COUNT(*) as total')->groupBy('categoria')->orderByDesc('total')->get();
        $porRegion      = Articulo::selectRaw('region, COUNT(*) as total')->whereNotNull('region')->groupBy('region')->orderByDesc('total')->get();
        $porRol         = User::selectRaw('role, COUNT(*) as total')->groupBy('role')->get();
        $totalArticulos = Articulo::count();

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<?mso-application progid="Excel.Sheet"?>' . "\n";
        $xml .= '<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">' . "\n";
        $xml .= '<Styles><Style ss:ID="h"><Font ss:Bold="1" ss:Color="#FFFFFF"/><Interior ss:Color="#1A56DB" ss:Pattern="Solid"/></Style><Style ss:ID="b"><Font ss:Bold="1"/></Style></Styles>' . "\n";

        // Hoja 1: Por Categoría
        $xml .= '<Worksheet ss:Name="Por Categoría"><Table>';
        $xml .= '<Row><Cell ss:StyleID="h"><Data ss:Type="String">Categoría</Data></Cell><Cell ss:StyleID="h"><Data ss:Type="String">Total</Data></Cell><Cell ss:StyleID="h"><Data ss:Type="String">Porcentaje</Data></Cell></Row>';
        foreach ($porCategoria as $row) {
            $pct = $totalArticulos > 0 ? round(($row->total / $totalArticulos) * 100, 1) : 0;
            $xml .= '<Row><Cell><Data ss:Type="String">' . ucfirst(htmlspecialchars($row->categoria)) . '</Data></Cell><Cell><Data ss:Type="Number">' . $row->total . '</Data></Cell><Cell><Data ss:Type="String">' . $pct . '%</Data></Cell></Row>';
        }
        $xml .= '<Row><Cell ss:StyleID="b"><Data ss:Type="String">TOTAL</Data></Cell><Cell ss:StyleID="b"><Data ss:Type="Number">' . $totalArticulos . '</Data></Cell></Row>';
        $xml .= '</Table></Worksheet>';

        // Hoja 2: Por Departamento
        $xml .= '<Worksheet ss:Name="Por Departamento"><Table>';
        $xml .= '<Row><Cell ss:StyleID="h"><Data ss:Type="String">Departamento</Data></Cell><Cell ss:StyleID="h"><Data ss:Type="String">Total</Data></Cell></Row>';
        foreach ($porRegion as $row) {
            $xml .= '<Row><Cell><Data ss:Type="String">' . htmlspecialchars($row->region) . '</Data></Cell><Cell><Data ss:Type="Number">' . $row->total . '</Data></Cell></Row>';
        }
        $xml .= '</Table></Worksheet>';

        // Hoja 3: Por Rol
        $xml .= '<Worksheet ss:Name="Usuarios por Rol"><Table>';
        $xml .= '<Row><Cell ss:StyleID="h"><Data ss:Type="String">Rol</Data></Cell><Cell ss:StyleID="h"><Data ss:Type="String">Total</Data></Cell></Row>';
        foreach ($porRol as $row) {
            $xml .= '<Row><Cell><Data ss:Type="String">' . ucfirst($row->role) . '</Data></Cell><Cell><Data ss:Type="Number">' . $row->total . '</Data></Cell></Row>';
        }
        $xml .= '</Table></Worksheet>';

        $xml .= '</Workbook>';

        return response($xml, 200, [
            'Content-Type'        => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="estadisticas_cultura_sv_' . date('Y-m-d') . '.xls"',
        ]);
    }
}
