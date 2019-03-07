<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('goods')->insert([
          [
              'height' => 100,
              'width' => 50,
              'price' => 1000,
              'name' => "パブロン鼻炎",
              'jancode' => "12783687263"
          ],[
              'height' => 40,
              'width' => 60,
              'price' => 1000,
              'name' => "モンダミン",
              'jancode' => "18374194123"
          ],[
              'height' => 60,
              'width' => 40,
              'price' => 1000,
              'name' => "コンタック風総合",
              'jancode' => "93756283857"
          ]
      ]);

      DB::table('good_shelf')->insert([
          [
              'good_id' => 1,
              'shelf_id' => 1,
          ],[
              'good_id' => 1,
              'shelf_id' => 2,
          ],[
              'good_id' => 1,
              'shelf_id' => 3,
          ],[
              'good_id' => 2,
              'shelf_id' => 4,
          ],[
              'good_id' => 2,
              'shelf_id' => 5,
          ],[
              'good_id' => 3,
              'shelf_id' => 6,
          ],
      ]);
    }
}
