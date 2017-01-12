<?php

use App\Page;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = \Faker\Factory::create();
//        for ($i = 0; $i < 10; $i++){
//            \App\User::create([
//                'name' => $faker->name,
//                'email' => $faker->email,
//                'password' => $faker->password(),
//                'remember_token' => $faker->text(50)
//            ]);
//        }
        $pages = Page::all();
        foreach ($pages as $page) {
            $page->user_id = rand(1, 3);
            $page->save();
        }
    }
}
