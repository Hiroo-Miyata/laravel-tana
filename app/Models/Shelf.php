<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
  public function furniture()
  {
      return $this->belongsTo('App\Models\Furniture');
  }

  public function alignment()
  {
      return $this->hasOne('App\Models\ShelfAlignment');
  }

  public function goods()
  {
      return $this->belongsToMany('App\Models\Good');
  }
}
