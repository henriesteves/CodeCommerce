<?php

use Illuminate\Database\Seeder;
use CodeCommerce\User;
//use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Henrique',
            'email' => 'henrique@admin.com',
            'password' => Hash::make(123456),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@cliente1.com',
            'password' => Hash::make(123456),
            'is_admin' => 0
        ]);

        User::create([
            'name' => 'Cliente 2',
            'email' => 'cliente2@cliente2.com',
            'password' => Hash::make(123456),
            'is_admin' => 0
        ]);

        factory('CodeCommerce\User', 10)->create();


//        $faker = Faker::create();
//
//        foreach (range(1, 10) as $i) {
//            User::create([
//                'name' => $faker->name(),
//                'email' => $faker->email(),
//                'password' => Hash::make($faker->word)
//            ]);
//        }


    }
}
