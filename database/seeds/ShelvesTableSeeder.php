<?php

use Illuminate\Database\Seeder;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('shelves')->insert([
          [
              'furniture_id' => 1
          ],[
              'furniture_id' => 1
          ],[
              'furniture_id' => 1
          ],[
              'furniture_id' => 1
          ],[
              'furniture_id' => 2
          ],[
              'furniture_id' => 2
          ]
      ]);
      DB::table('shelf_alignments')->insert([
          [
              'alignment_no' => 1,
              'shelf_id' => 1,
              'shelf_height' => 500
          ],[
              'alignment_no' => 2,
              'shelf_id' => 2,
              'shelf_height' => 500
          ],[
              'alignment_no' => 3,
              'shelf_id' => 3,
              'shelf_height' => 500
          ],[
              'alignment_no' => 4,
              'shelf_id' => 4,
              'shelf_height' => 500
          ],[
              'alignment_no' => 1,
              'shelf_id' => 5,
              'shelf_height' => 500
          ],[
              'alignment_no' => 2,
              'shelf_id' => 6,
              'shelf_height' => 500
          ],
      ]);
    }
}
