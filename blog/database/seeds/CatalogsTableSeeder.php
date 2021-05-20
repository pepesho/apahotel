<?php

use Illuminate\Database\Seeder;

class CatalogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Catalog([
            'ISBN_id' => '11111',
            'title' => '人間失格',
            'genre_id' => '2', 
            'author' => '太宰府',
            'publisher' => '青空文庫',
            'publisher_date' => '1948-01-01',
        ]);
        $user->save();
        $user = new \App\Catalog([
            'ISBN_id' => '11112',
            'title' => '自分の中に毒を持て',
            'genre_id' => '1', 
            'author' => '岡本太郎',
            'publisher' => '青春出版社',
            'publisher_date' => '2017-12-30',
        ]);
        $user->save();
        $user = new \App\Catalog([
            'ISBN_id' => '11113',
            'title' => 'チェゲバラ伝',
            'genre_id' => '3', 
            'author' => '三好徹',
            'publisher' => '文春文庫',
            'publisher_date' => '2014-04-20',
        ]);
        $user->save();
        $user = new \App\Catalog([
            'ISBN_id' => '11114',
            'title' => '嫌われる勇気',
            'genre_id' => '5', 
            'author' => '岸見一郎',
            'publisher' => '青空文庫',
            'publisher_date' => '1948-01-01',
        ]);
        $user->save();

    }
}
