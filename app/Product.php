<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['price', 'product_name', 'description'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
