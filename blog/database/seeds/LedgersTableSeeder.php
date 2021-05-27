<?php

use Illuminate\Database\Seeder;
use \App\Catalog;
class LedgersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 27; $i++) {
            $user = new \App\Ledger([
                    'catalog_id' => rand(1,27),
                    'arrival_day' => '2020-05-22',
                ]);
                $user->save();
        }
            // $user = new \App\Ledger([
            //     'catalog_id' => '1',
            //     'arrival_day' => '1948-01-01',
            // ]);
            // $user->save();

            // $user = new \App\Ledger([
            //     'catalog_id' => '2',
            //     'arrival_day' => '1999-01-01',
            // ]);
            // $user->save();

            // $user = new \App\Ledger([
            //     'catalog_id' => '3',
            //     'arrival_day' => '1910-01-01',
            // ]);
            // $user->save();

            // $user = new \App\Ledger([
            //     'catalog_id' => '1',
            //     'arrival_day' => '2000-01-01',
            // ]);
            // $user->save();

            // $user = new \App\Ledger([
            //     'catalog_id' => '4',
            //     'arrival_day' => '1999-01-01',
            // ]);
            // $user->save();
    }
}
