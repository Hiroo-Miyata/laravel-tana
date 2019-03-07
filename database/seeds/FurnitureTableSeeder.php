<?php

use Illuminate\Database\Seeder;

class FurnitureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('furniture')->insert([
          [
              'department_id' => 1
          ],[
              'department_id' => 1
          ],[
              'department_id' => 1
          ]
      ]);
      DB::table('furniture_alignments')->insert([
          [
              'alignment_no' => 1,
              'furniture_id' => 1
          ],[
              'alignment_no' => 2,
              'furniture_id' => 2
          ],[
              'alignment_no' => 3,
              'furniture_id' => 3
          ]
      ]);
    }
}
