<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(['genre' => '総記']);
        DB::table('genres')->insert(['genre' => '哲学']);
        DB::table('genres')->insert(['genre' => '歴史']);
        DB::table('genres')->insert(['genre' => '社会科学']);
        DB::table('genres')->insert(['genre' => '自然科学']);
        DB::table('genres')->insert(['genre' => '技術']);
        DB::table('genres')->insert(['genre' => '産業']);
        DB::table('genres')->insert(['genre' => '芸術']);
        DB::table('genres')->insert(['genre' => '言語']);
        DB::table('genres')->insert(['genre' => '文学']);

    }
}
