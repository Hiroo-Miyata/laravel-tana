<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departments')->insert([
          [
              'department_name' => "医薬品"
          ],[
              'department_name' => "化粧品"
          ],[
              'department_name' => "風邪薬"
          ]
      ]);
    }
}
