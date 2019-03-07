<?php

use Illuminate\Database\Seeder;

class GoodImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('good_image')->insert([
          [
              'good_id' => 1,
              'goods_image_url' => "5BE90553CC78041940A331EDA1C68847.png"
          ],[
              'good_id' => 2,
              'goods_image_url' => "00BAD9C5F43626BB120370055F276CB1.png"
          ],[
              'good_id' => 3,
              'goods_image_url' => "3D959BF5676E5E0BA0DD3E3294883D20.png"
          ]
      ]);
    }
}
