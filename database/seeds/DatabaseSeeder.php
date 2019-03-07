<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\AdminTablesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(DepartmentsTableSeeder::class);
      $this->call(FurnitureTableSeeder::class);
      $this->call(ShelvesTableSeeder::class);
      $this->call(GoodsTableSeeder::class);
      $this->call(AdminTablesSeeder::class);
      $this->call(GoodImageTableSeeder::class);
    }
}
