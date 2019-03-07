<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FurnitureAlignment extends Model
{
  public function furniture()
  {
      return $this->hasOne('App\Models\Furniture');
  }
}
