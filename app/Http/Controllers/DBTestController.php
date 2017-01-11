<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DBTestController extends Controller
{
    /**
     * @var array
     */
    protected static $articles;

    public static function addArticles($array)
    {
        return self::$articles[] = $array;
    }


    public function index()
    {
//        $articles = \DB::select('SELECT * FROM articles WHERE name LIKE ?', ['%Blog post']);


//        \DB::insert('INSERT INTO articles (name, text, img) VALUES (?,?,?)', ['test1', 'texttext', 'img']);

//        \DB::update('UPDATE articles SET name = ? WHERE id = ?', ['test999', 15]);

//        \DB::delete('DELETE FROM articles WHERE id = ?', [15]);

//        dump($articles); //dd($data)

        /**
         * Получить id добавленной записи
         */
//        \DB::insert('INSERT INTO articles (name, text, img) VALUES (?,?,?)', ['test1', 'texttext', 'img']);
//        $id = \DB::connection()->getPdo()->lastInsertId();
//        dd($id); //17

//        \DB::statement('DROP table articles');


        $articles = \DB::select('SELECT * FROM articles');
        return (view()->exists('about'))
            ? view('db-test', ['articles' => $articles])
            : abort(404);
    }

    public function articles()
    {
        /**
         * get all
         */
//        $articles = \DB::table('articles')->get();

        /**
         * get first
         */
//        $articles = \DB::table('articles')->first();

        /**
         * get field value
         */
//        $articles = \DB::table('articles')->value('name');

        /**
         * get some recordings
         * Генератор
         * получает несколько записей за итерацию
         * добавляем их переменную self::$articles
         */
//        $articles = \DB::table('articles')->chunk(2, function ($articles) {
//
//            foreach ($articles as $article){
//                self::addArticles($article);
//            }
//
//        });

        /**
         * Выбирает все записи по определнному полю в бд
         * select `name` from `articles`
         */
//        $articles = \DB::table('articles')->pluck('name');

        /**
         * "select count(`name`) as aggregate from `articles`"
         */
//        $articles = \DB::table('articles')->count('name');

        /**
         * "select max(`id`) as aggregate from `articles`"
         */
//        $articles = \DB::table('articles')->max('id');

        /**
         * "select distinct `name`, `text` from `articles`"
         */
//        $articles = \DB::table('articles')->select('name', 'text')->distinct()->get();

        /**
         * "select `text` as `fulltext` from `articles` where `id` = ?"
         */
//        $articles = \DB::table('articles')->select('text AS fulltext')->where('id', '=', 5)->get();

        /**
         * "select `text` as `fulltext` from `articles` where `id` = ? or `name` like ?"
         */
//        $articles = \DB::table('articles')
//            ->select('text AS fulltext')
//            ->where('id', '=', 5)
//            ->orWhere('name', 'like', '%test%')
//            ->where('id', '!=', 7)
//            ->get();
//
        /**
         * или такой вариант
         */
//        $articles = \DB::table('articles')
//            ->select('text AS fulltext')
//            ->where([
//                ['id', '=', 5],
//                ['name', 'like', '%test%', 'or']
//            ])->get();

//        $articles = \DB::table('articles')
//            ->select('text AS fulltext')
//            ->where('id', '=', 5)
//            ->limit(4)
//            ->offset(2)
//            ->get();

        /**
         * Второй способ
         * "insert into `articles` (`img`, `name`, `text`) values (?, ?, ?), (?, ?, ?)"
         * array:6 [▼
         * 0 => "https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg"
         * 1 => "Blog post"
         * 2 => "Самое лучшее место для регистрации этой связки - новый сервис-провайдер который мы назовём PaymentServiceProvider и в котором мы создадим метод register, содержащий код выше. После этого вы можете настроить Laravel для загрузки этого провайдера в файле config/app.php."
         * 3 => "https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg"
         * 4 => "Blog post2"
         * 5 => "Прошу убрать с теста из раздела http://investmoscow.upt24.ru/investor-guide-new/business-conditions/business-support/non-financial-measures-on-support/information-and-consulting-support/  (Нефинансовые меры поддержки/ Информационная и консультационная поддержка) из третьего пункта следующий абзац:"
         * ]
         */
//        \DB::table('articles')->insert(
//            [
//                [
//                    'name' => 'Blog post',
//                    'text' => 'Самое лучшее место для регистрации этой связки - новый сервис-провайдер который мы назовём PaymentServiceProvider и в котором мы создадим метод register, содержащий код выше. После этого вы можете настроить Laravel для загрузки этого провайдера в файле config/app.php.',
//                    'img' => 'https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg'
//                ],
//                [
//                    'name' => 'Blog post2',
//                    'text' => 'Прошу убрать с теста из раздела http://investmoscow.upt24.ru/investor-guide-new/business-conditions/business-support/non-financial-measures-on-support/information-and-consulting-support/  (Нефинансовые меры поддержки/ Информационная и консультационная поддержка) из третьего пункта следующий абзац:',
//                    'img' => 'https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg'
//                ]
//            ]
//        );

        /**
         * Получить последний добавленный id
         */
//        $lastId = \DB::table('articles')->insertGetId([
//            'name' => 'Blog post',
//            'text' => 'Самое лучшее место для регистрации этой связки - новый сервис-провайдер который мы назовём PaymentServiceProvider и в котором мы создадим метод register, содержащий код выше. После этого вы можете настроить Laravel для загрузки этого провайдера в файле config/app.php.',
//            'img' => 'https://smt-fasad.ru/wp-content/uploads/2015/10/Oerlandet4-600x400.jpg'
//        ]);

        /**
         * "update `articles` set `name` = ? where `id` = ?"
         */
//        \DB::table('articles')->where('id', 22)->update([
//            'name' => 'Blog post999',
//        ]);

        /**
         * delete
         * $result - количество затронутых записей
         */
//        $result = \DB::table('articles')->where('id', 22)->delete();

        /**
         * join
         */
//        $result = \DB::table('articles')->leftJoin('posts', 'posts.article_id', '=', 'articles.id')->get();

//        dd($lastId);

        return (view()->exists('about'))
            ? view('db-test2', ['articles' => $articles])
            : abort(404);
    }
}
