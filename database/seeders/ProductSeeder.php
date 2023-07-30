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
            ['title'=>'Remera #1', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'https://i.postimg.cc/Jzd2Rwtw/1-width-550-height-550-appearance-Id-2-background-Color-F2-F2-F2-model-Id-2564-crop-detail.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'A1','gender'=>'F'],
            ['title'=>'Remera #2', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/L8sWd49B/41b03r-Qn-Zn-L-SY445.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'A5','gender'=>'M'],
            ['title'=>'Remera #3', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/Vk5KG7gK/58eea75c-be3a-4a5e-872f-123ae55d8ff11-7a6426293afa05c2e416238170207717-640-0.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'B1','gender'=>'F'],
            ['title'=>'Remera #4', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/Twn7jp0G/613w-P5dff-SL-AC-UY350.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'F'],
            ['title'=>'Remera #5', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'https://i.postimg.cc/dtsHdQyP/616a-Gmi0ob-L-AC-SY500.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'B1','gender'=>'M'],
            ['title'=>'Remera #6', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'https://i.postimg.cc/q73j0z9n/61l-FE9r-EHL-SL1440.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'A1','gender'=>'M'],
            ['title'=>'Remera #7', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'https://i.postimg.cc/Wz2nMSt6/61qk-H-7w-YBL-SL1500.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'E1','gender'=>'M'],
            ['title'=>'Remera #8', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/tCBrz031/64d7910b19d537bea56a2773aded5f8c2400aaf67546cf755304dc5453bde17078203.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'F1','gender'=>'F'],
            ['title'=>'Remera #9', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/rwbQvSYM/a-super-cool-nana-but-here-i-am-killing-it-t-shirt-womens-t-shirt.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'F3','gender'=>'F'],
            ['title'=>'Remera #10', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/XJKLGtNY/bv6175-632-t-shirt-nike-sportswear-essential-rose-pour-femme-bv6175-632-01-2.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'F'],
            ['title'=>'Remera #11', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>7000, 'image'=>'https://i.postimg.cc/pVqQwfp4/CJ0409-215-A.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'I1','gender'=>'M'],
            ['title'=>'Remera #12', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/7hmNX72v/custom-t-shirt-men-base-26-4-2022-400x533.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'G2','gender'=>'M'],
            ['title'=>'Remera #13', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>8000, 'image'=>'https://i.postimg.cc/GhgQyFRG/famous-stars-and-straps-camiseta-negro-420859.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'A1','gender'=>'M'],
            ['title'=>'Remera #14', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/htJ0bX4w/fremde-namen-und-orte.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'J1','gender'=>'M'],
            ['title'=>'Remera #15', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>1000, 'image'=>'https://i.postimg.cc/j2gzybpt/il-fullxfull-2106681501-162q.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'A5','gender'=>'F'],
            ['title'=>'Remera #16', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'https://i.postimg.cc/fLMXFyZM/il-fullxfull-4686645514-2zvz.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'F'],
            ['title'=>'Remera #17', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'https://i.postimg.cc/0j2Y6QHV/images.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #18', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'https://i.postimg.cc/gJpqW4yF/images-1.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #19', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/V6F9LM4S/images-2.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #20', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>7000, 'image'=>'https://i.postimg.cc/W4GgXrB9/img-6567-r1-7ce487f37ed43605e916599912701980-640-0.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #21', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>6000, 'image'=>'https://i.postimg.cc/T3Wr5BCv/MP000000017170111-437-Wx649-H-202304121446431.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #22', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'https://i.postimg.cc/QxzQtjgq/onanie-selbstbefriedigung-shirt.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'F'],
            ['title'=>'Remera #23', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'https://i.postimg.cc/FzBL7xSK/Red-Communist-Star-Cuba-Men-T-Shirt-Che-Guevara-Marx-Communism-Cool-Casual-Pride-T-Shirt.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #24', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>4000, 'image'=>'https://i.postimg.cc/Y2ngntPw/s-l1200.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'F'],
            ['title'=>'Remera #25', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/x1Hz1M10/s-l1600.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #26', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>1000, 'image'=>'https://i.postimg.cc/hPXmNHFQ/soul-musik-vinylskiva-telefonograf-spelare-t-shirt-herr.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'F'],
            ['title'=>'Remera #27', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>3000, 'image'=>'https://i.postimg.cc/wvxy2rcv/ssrco-active-tshirt-mens-101010-01c5ca27c6-front-square-product-600x600.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'A5','gender'=>'M'],
            ['title'=>'Remera #28', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>2000, 'image'=>'https://i.postimg.cc/SNH94DqT/ssrco-active-tshirt-mens-101010-01c5ca27c6-front-square-product-600x600-1.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'F'],
            ['title'=>'Remera #29', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>1000, 'image'=>'https://i.postimg.cc/PfRpb2LX/ssrco-slim-fit-t-shirt-mens-101010-01c5ca27c6-front-square-product-600x600.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'All','gender'=>'M'],
            ['title'=>'Remera #30', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>5000, 'image'=>'https://i.postimg.cc/GtV4cm08/ssrco-slim-fit-t-shirt-mens-101010-01c5ca27c6-front-square-product-600x600-1.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'G1','gender'=>'F'],
            ['title'=>'Remera #31', 'description'=>'Producto de prueba solo para mostrar en el catalogo y vista del sitio web.', 'price'=>8000, 'image'=>'https://i.postimg.cc/yY3JLc9F/ssrco-slim-fit-t-shirt-mens-462445-542506a2a5-front-square-product-600x600.jpg', 'published'=>1,'category'=>'remera','size_mix'=>'F2','gender'=>'F'],
           
        ];

       foreach ($products as $key => $value) {
        Product::create($value);
    } 
    }
}
