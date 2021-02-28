<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_product')->insert([
            'name' => 'Pizza Salgada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name'           => 'Mussarela',
            'desc'           => 'A incomparável mussarela , servida sobre molho de tomate especial.',
            'price'          => 48.50,
            'groupproductid' => 1,
            'pathImg'        => 'Image-product/imagepizza1.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name' => 'Calabresa',
            'desc' => 'Deliciosas fatias de calabresa, acompanhadas de cebola, azeitonas verdes e mussarela especial.',
            'price' => 44.50,
            'groupproductid' => 1,
            'pathImg'        => 'Image-product/imagepizza2.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name' => 'Corn & Bacon',
            'desc' => 'Surpreendente e apaixonante receita preparada com fatias crocantes de bacon e milho selecionado sobre a mussarela.',
            'price' => 40.50,
            'groupproductid' => 1,
            'pathImg'        => 'Image-product/imagepizza3.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name' => 'Pepperoni',
            'desc' => 'Deliciosas fatias de pepperoni (salame especial condimentado com páprica) e mussarela.',
            'price' => 50.50,
            'groupproductid' => 1,
            'pathImg'        => 'Image-product/imagepizza4.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('group_product')->insert([
            'name' => 'Pizza Doce',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name' => 'Brigadeiro',
            'desc' => 'Deliciosas fatias de chocolate.',
            'price' => 50.50,
            'groupproductid' => 2,
            'pathImg'        => 'Image-product/imagedoce1.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name' => 'Chocolate com morango',
            'desc' => 'Deliciosas fatias de chocolate com morango.',
            'price' => 59.50,
            'groupproductid' => 2,
            'pathImg'        => 'Image-product/pizzadocemorango.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('group_product')->insert([
            'name' => 'Bebidas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name' => 'Coca-cola',
            'desc' => 'Coca-cola Lata.',
            'price' => 5.50,
            'groupproductid' => 3,
            'pathImg'        => 'Image-product/imagebebida1.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product')->insert([
            'name' => 'Guaraná',
            'desc' => 'Guaraná Zero.',
            'price' => 5.50,
            'groupproductid' => 3,
            'pathImg'        => 'Image-product/imagebebida2.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);






    }
}
