<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'categories_id' => 1,
            'name' => 'Indomie Mie Goreng Hot & Spicy',
            'detail' => 'Mie dengan sensasi pedas yang akan membuat lidah anda terbakar ketika memakannya',
            'price'=>1,
            'image' => 'mie.png'
        ]);

        DB::table('products')->insert([
            'categories_id' => 2,
            'name' => 'Lays Honey Barbecue',
            'detail' => 'Ciki kentang dengan rasa madu barbeque yang dapat anda rasakan sensasi madu pada setiap gigitannya.',
            'price'=>2,
            'image' => 'lays.png'
        ]);

        DB::table('products')->insert([
            'categories_id' => 3,
            'name' => 'Headset S.O.G',
            'detail' => 'Headset ini sangat cocok untuk anda yang sering bermain game karena suaranya yang jelas dan juga bass yang enak untuk didengar.',
            'price'=>20,
            'image' => 'headphones.png'
        ]);
        DB::table('products')->insert([
            'categories_id' => 4,
            'name' => 'JETE KBX1 Series Keyboard',
            'detail' => 'Keyboard ini sangat cocok ketika anda igin bermain game karena saura dari ketikan keyboard yang nyaman untuk didengar dan juga kenyamanan dalam menggunkan keyboard ini.',
            'price'=>30,
            'image' => 'keyboard.png'
        ]);

        DB::table('products')->insert([
            'categories_id' => 5,
            'name' => 'Ponds BB Magic Powder',
            'detail' => 'Bedak yang dapat membuat wajah anda terlihat lebih cerah dan juga membuat anda terlihat 5 tahun lebih muda.',
            'price'=>22,
            'image' => 'bedak.png'
        ]);

        DB::table('products')->insert([
            'categories_id' => 6,
            'name' => 'Wardah Lipstik',
            'detail' => 'Lipstik yang pastinmya akan nyaman di bibir anda dan juga membuat anda terlihat lebih percaya diri di depan banyak orang.',
            'price'=>10,
            'image' => 'lipstik.png'
        ]);
    }
}
