<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'product_galeries';

    protected $fillable = ['products_id', 'photo'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

}
