<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //Country::truncate();
          $products = [
            ['title'=>'Remera #1', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #2', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #3', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #4', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #5', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #6', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #7', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #8', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #9', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #10', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #11', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>7000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #12', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #13', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>8000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #14', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #15', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>1000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #16', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #17', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #18', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #19', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #20', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>7000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #21', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>6000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #22', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #23', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #24', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #25', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #26', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>1000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #27', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #28', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #29', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>1000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'M'],
            ['title'=>'Remera #30', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
            ['title'=>'Remera #31', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>8000, 'image'=>'', 'published'=>1,'category'=>'remera','size_mix'=>'','gender'=>'F'],
           
        ];

       foreach ($products as $key => $value) {
        Product::create($value);
    } 
    }
}
