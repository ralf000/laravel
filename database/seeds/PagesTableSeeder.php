<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * PagesTableSeeder constructor.
     */
    public function __construct()
    {
        $this->setFakerInstance();
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Page::create(
                [
                    'title' => $this->faker->name,
                    'text' => $this->faker->text(),
                ]
            );
        }
    }

    private function setFakerInstance()
    {
        $this->faker = \Faker\Factory::create();
    }
}
