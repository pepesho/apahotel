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
        $scheduled_date = new DateTime();
        for ($i = 1; $i <= 1000; $i++) {
            $user = new \App\Catalog([
                'ISBN_id' => rand(1000000000000,2000000000000),
                'title' => 'サンプル本' . $i,
                'genre_id' => rand(1,10), 
                'author' => 'サンプル著者' .$i,
                'publisher' => '出版社' .$i,
                'publisher_date' => '2020-01-01',
            ]);
            $user->save();
        }
    }
}
