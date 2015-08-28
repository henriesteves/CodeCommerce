<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Category;
//use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 15)->create();

//        $faker = Faker::create();
//
//        foreach (range(1, 15) as $i) {
//            Category::create([
//                'name' => $faker->word(),
//                'description' => $faker->sentence()
//            ]);
//        }

//        Category::create([
//            'name' => 'Category 1',
//            'description' => 'Description of Category 1'
//        ]);
//
//        Category::create([
//            'name' => 'Category 2',
//            'description' => 'Description of Category 2'
//        ]);


    }
}
