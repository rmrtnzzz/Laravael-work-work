<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'categoria',
        'region',
        'descripcion',
        'imagen',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function categorias(): array
    {
        return [
            'tradiciones'  => 'Tradiciones',
            'festividades' => 'Festividades',
            'gastronomia'  => 'Gastronomía',
            'artesanias'   => 'Artesanías',
            'musica'       => 'Música',
            'danza'        => 'Danza',
            'historia'     => 'Historia',
        ];
    }

    public static function regiones(): array
    {
        return [
            'Ahuachapán','Santa Ana','Sonsonate','Chalatenango','La Libertad',
            'San Salvador','Cuscatlán','La Paz','Cabañas','San Vicente',
            'Usulután','San Miguel','Morazán','La Unión'
        ];
    }
}
