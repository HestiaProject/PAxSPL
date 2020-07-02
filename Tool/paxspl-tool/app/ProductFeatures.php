<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    protected $fillable = [
        'feature_id', 'product_id',
    ];

    public  function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public  function feature()
    {
        return $this->belongsTo('App\Feature', 'feature_id');
    }

    
}
