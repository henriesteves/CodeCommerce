<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 30)->create();

//        Product::create([
//            'name' => 'Product 1',
//            'description' => 'Description of Product 1',
//            'price' => '19.99',
//            'featured' => '1',
//            'recommend' => '0'
//        ]);


    }
}
