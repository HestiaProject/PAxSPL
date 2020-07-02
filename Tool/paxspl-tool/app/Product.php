<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'feature_model_id' , 'xml'
    ];

    public function pro_features()
    {
        return $this->hasMany('App\ProductFeatures');
    }

    public  function fm()
    {
        return $this->belongsTo('App\FeatureModel', 'feature_model_id');
    }
}
