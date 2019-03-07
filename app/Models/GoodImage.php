<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodImage extends Model
{
    protected $table = 'good_image';

    protected $fillable = [
        'goods_image_url'
    ];
}
