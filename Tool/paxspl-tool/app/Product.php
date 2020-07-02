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

    public function check_feature(Feature $a)
    {
        $feature = ProductFeatures::where('product_id', $this->id)->where('feature_id', $a->id)->first();
        if ($feature != null) {
            return '<i class="fas fa-check-circle fa-2x" style="color:green"></i>';
        } else {
            return '';
        }
    }
}
