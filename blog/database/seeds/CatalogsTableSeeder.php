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
        // for ($i = 1; $i <= 100; $i++) {
        //     $user = new \App\Catalog([
        //         'ISBN_id' => rand(1000000000000,2000000000000),
        //         'title' => 'サンプル本' . $i,
        //         'genre_id' => rand(1,10), 
        //         'author' => 'サンプル著者' .$i,
        //         'publisher' => '出版社' .$i,
        //         'publisher_date' => '2020-01-01',
        //         'book_img' => '/images/noimage.png'
        //     ]);
        //     $user->save();
        // }
        $isbn_data =[
            "9784577600085",
            "9784049135978",
            "9784061996618",
            "9784063951165",
            "9784864912518",
            "9784480687654",
            "9784091284600",
            "9784065205747",
            "9784102100042",
            "9784101069210",
            "9784344418073",
            "9784101036168",
            "9784041099124",
            "9784063959383",
            "9784478108499",
            "9784478025819",
            "9784866512419",
            "9784478066119",
            "9784041090602",
            "9784864107587",
            "9784865549232",
            "9784063765786",
            "9784797398892",
            "9784798136226",
            "9784297107789",
            "9784815601577",
            "9784295005247",
            "9784798060996"
        ];
        foreach ($isbn_data as $isbn){
            $url = 'https://api.openbd.jp/v1/get?isbn=' . $isbn;
            $json = file_get_contents($url);
            $data = json_decode($json);
            $openbd = $data[0];
            //著者をカンマ区切りで並べる
            $book = new \App\Catalog;
            $book->ISBN_id =  $isbn;
            $book->title = $openbd->summary->title;
            $book->author = $openbd->summary->author;
            $book->genre_id = rand(1,10);
            $book->publisher = $openbd->summary->publisher;
            $book->publisher_date = date("Y-m-d", strtotime($openbd->summary->pubdate));
            $book->genre_id = rand(1,10);
            if(!empty($openbd->summary->cover)){
                $book->book_img = $openbd->summary->cover;
            }else{
                $book->book_img = "/images/noimage.png";
            }
            $book->save();
        }
    }
}