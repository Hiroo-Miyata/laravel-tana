<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'goods';

    protected $fillable = [
        'height', 'width', 'price'
    ];

    public function images()
    {
        return $this->hasOne('App\Models\GoodImage');
    }
}
