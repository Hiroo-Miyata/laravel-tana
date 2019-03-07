<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
  public function department()
  {
      return $this->belongsTo('App\Models\Department');
  }

  public function shelve()
  {
      return $this->hasMany('App\Models\Shelf');
  }

  public function alignment()
  {
      return $this->hasOne('App\Models\FurnitureAlignment');
  }
}
