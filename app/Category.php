<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'photo', 'slug'];

    public function product()
    {
        return $this->hasMany('App\Product', 'categories_id');
    }
}
