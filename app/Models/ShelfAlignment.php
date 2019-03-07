<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShelfAlignment extends Model
{
  public function shelf()
  {
      return $this->hasOne('App\Models\Shelf');
  }
}
