<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Первый способ добавление контента в БД
         */
        DB::insert('INSERT INTO articles (name, text, img) VALUES (?,?,?)',
            [
                'Blog post',
                'Самое лучшее место для регистрации этой связки',
                'https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg'
            ]
        );

        /**
         * Второй способ
         */
        DB::table('articles')->insert(
            [
                [
                    'name' => 'Blog post',
                    'text' => 'Самое лучшее место для регистрации этой связки - новый сервис-провайдер который мы назовём PaymentServiceProvider и в котором мы создадим метод register, содержащий код выше. После этого вы можете настроить Laravel для загрузки этого провайдера в файле config/app.php.',
                    'img' => 'https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg'
                ],
                [
                    'name' => 'Blog post2',
                    'text' => 'Прошу убрать с теста из раздела http://investmoscow.upt24.ru/investor-guide-new/business-conditions/business-support/non-financial-measures-on-support/information-and-consulting-support/  (Нефинансовые меры поддержки/ Информационная и консультационная поддержка) из третьего пункта следующий абзац:',
                    'img' => 'https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg'
                ]
            ]
        );

        /**
         * третий способ
         */
        Article::create(
            [
                'name' => 'Blog post',
                'text' => 'Самое лучшее место для регистрации этой связки - новый сервис-провайдер который мы назовём PaymentServiceProvider и в котором мы создадим метод register, содержащий код выше. После этого вы можете настроить Laravel для загрузки этого провайдера в файле config/app.php.',
                'img' => 'https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg'
            ]
        );
    }
}
