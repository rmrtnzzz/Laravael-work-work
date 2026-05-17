<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Articulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::create([
            'name'     => 'Administrador',
            'email'    => 'admin@cultura.sv',
            'password' => Hash::make('admin1234'),
            'role'     => 'admin',
        ]);

        // Trabajador
        User::create([
            'name'     => 'Trabajador Demo',
            'email'    => 'trabajador@cultura.sv',
            'password' => Hash::make('trabajador1234'),
            'role'     => 'trabajador',
        ]);

        // Artículos de ejemplo
        $articulos = [
            [
                'titulo'      => 'La Semana Santa en Sonsonate',
                'categoria'   => 'festividades',
                'region'      => 'Sonsonate',
                'descripcion' => 'La Semana Santa en Sonsonate es una de las celebraciones religiosas más importantes de El Salvador. Las procesiones recorren las calles empedradas del centro histórico con imágenes centenarias y alfombras de aserrín de colores que los devotos elaboran con gran esmero. Esta tradición se remonta a la época colonial y reúne a miles de fieles cada año.',
                'user_id'     => $admin->id,
            ],
            [
                'titulo'      => 'Los Izalcos y el Volcán de Izalco',
                'categoria'   => 'historia',
                'region'      => 'Sonsonate',
                'descripcion' => 'El Volcán de Izalco, conocido como el "Faro del Pacífico", fue un volcán activo durante más de 200 años. Los marinos lo usaban como referencia para navegar. La leyenda cuenta que los Izalcos, pueblo originario de la región, consideraban al volcán como una deidad sagrada y realizaban rituales en su honor.',
                'user_id'     => $admin->id,
            ],
            [
                'titulo'      => 'El Pavo en Pinol — Gastronomía Tradicional',
                'categoria'   => 'gastronomia',
                'region'      => 'San Salvador',
                'descripcion' => 'El pavo en pinol es un platillo de origen indígena que se prepara especialmente en las festividades patronales. Se elabora con maíz tostado y molido mezclado con hierbas aromáticas y especias locales. Es considerado un patrimonio gastronómico de El Salvador y su preparación es un ritual que pasa de generación en generación.',
                'user_id'     => $admin->id,
            ],
            [
                'titulo'      => 'Artesanías de Ilobasco',
                'categoria'   => 'artesanias',
                'region'      => 'Cabañas',
                'descripcion' => 'Ilobasco es reconocido mundialmente por sus miniaturas de barro, también conocidas como "sorpresas". Estas pequeñas figuras representan escenas de la vida cotidiana salvadoreña y son elaboradas a mano por artesanos locales. La tradición cerámica de Ilobasco data de la época precolombina y es Patrimonio Cultural de El Salvador.',
                'user_id'     => $admin->id,
            ],
            [
                'titulo'      => 'La Danza de los Historiantes',
                'categoria'   => 'danza',
                'region'      => 'Santa Ana',
                'descripcion' => 'La Danza de los Historiantes es una representación teatral y dancística que mezcla elementos indígenas y españoles. Se realiza en honor a los santos patronos de distintos pueblos. Los danzantes usan trajes coloridos y máscaras talladas en madera, y la danza narra la conquista española de forma alegórica.',
                'user_id'     => $admin->id,
            ],
            [
                'titulo'      => 'La Marimba — Música del Alma Salvadoreña',
                'categoria'   => 'musica',
                'region'      => 'La Libertad',
                'descripcion' => 'La marimba es uno de los instrumentos más representativos de la música tradicional salvadoreña. Sus melodías acompañan ferias, fiestas patronales y celebraciones familiares. Los marimberos transmiten su arte de padres a hijos, manteniendo viva una tradición musical que conecta al pueblo salvadoreño con sus raíces indígenas.',
                'user_id'     => $admin->id,
            ],
        ];

        foreach ($articulos as $art) {
            Articulo::create($art);
        }
    }
}
