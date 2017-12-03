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
        // Borramos lo que teníamos para comenzar desde cero la inicialización
        Producto::truncate();

        // Creamos una instancia de faker
        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 20; $i++){
            Producto::create([
                'id' => null ,
                'nombre' => $faker->name,
                'descripcion' => $faker->paragraph,
                'precio' => $faker->numberBetween(200, 3000) . ' €' ,
                'imagen' => $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
}
