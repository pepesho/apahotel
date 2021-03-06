<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Member([
            'name' => 'みのもんた',
            'postal' => '0011111',
            'email' => 'minomonta.php2021@gmail.com', 
            'birthday' => '2000-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();
        
        $user = new \App\Member([
            'name' => 'タモリ',
            'email' => 'tamori.php2021@gmail.com', 
            'birthday' => '1990-01-01',
            'postal' => '2001000',
            'address' => '東京都',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '明石家さんま',
            'email' => 'sanma.php2021@gmail.com', 
            'birthday' => '1950-01-01',
            'postal' => '2001000',
            'address' => '大阪府',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '浜田雅功',
            'email' => 'hamada.php2021@gmail.com', 
            'birthday' => '1850-01-01',
            'postal' => '2001000',
            'address' => '東京都',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '和田アキ子',
            'postal' => '0011111',
            'email' => 'wada.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '松本人志',
            'postal' => '0011111',
            'email' => 'mattyan.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '兵庫県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '石川せいや',
            'postal' => '0011111',
            'email' => 'seiya.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '東京都',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '柳田',
            'postal' => '0011111',
            'email' => 'gi-ta.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '蜷川実花',
            'postal' => '0011111',
            'email' => 'mika.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '若林正恭',
            'postal' => '0011111',
            'email' => 'waka.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '堀江貴文',
            'postal' => '0011111',
            'email' => 'horiemon.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '福岡県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => 'サイタマ',
            'postal' => '0011111',
            'email' => 'onepan.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => 'マリオ',
            'postal' => '0011111',
            'email' => 'piech.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => 'USJ',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '下北沢好男',
            'postal' => '0011111',
            'email' => 'loveshimokita.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '青森県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '藤森慎吾',
            'postal' => '0011111',
            'email' => 'tyarao.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '静岡県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '池田翔',
            'postal' => '0011111',
            'email' => 'sikeda.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '神奈川県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '林拓実',
            'postal' => '0011111',
            'email' => 'mika.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '東紀隆',
            'postal' => '0011111',
            'email' => 'higashi.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '埼玉県',
            'tel' => '00000000000',
        ]);
        $user->save();

        $user = new \App\Member([
            'name' => '山本莉奈',
            'postal' => '0011111',
            'email' => 'yamamoto.php2021@gmail.com', 
            'birthday' => '1700-01-01',
            'address' => '千葉県',
            'tel' => '00000000000',
        ]);
        $user->save();
    }
}
