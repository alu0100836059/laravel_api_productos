<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++){
            Producto::create([
                'id' => null ,
                'nombre' => 'Nombre producto: ' . $i ,
                'descripcion' => 'Aqui iría la descripcion producto: ' . $i ,
                'precio' => '30' . $i . ' €' ,
                'imagen' => 'Enlace a la imagen' . $i
            ]);
        }
    }
}
