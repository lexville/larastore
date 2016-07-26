<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_price', 'product_name', 'product_description'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
