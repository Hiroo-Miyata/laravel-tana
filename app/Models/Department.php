<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  public function furniture()
  {
      return $this->hasMany('App\Models\Furniture');
  }

  public function createDepartment($id)
  {
    // $array = [];
    // $furniture = Department::find($id)->furniture()->shelve();
    // foreach ($furniture as $furni){
    //   $shelve = $furni->shelve;
    //   $shelfarray = [];
    //   foreach ($shelve as $shelf ) {
    //     $goods = $shelf->goods;
    //     $goodarray = [];
    //     foreach ($goods as $good){
    //       array_push($goodarray, $good);
    //     }
    //     array_push($shelfarray, $goodarray);
    //   }
    //   array_push($array, $shelfarray);
    // }
    // return $array;
  }
}
