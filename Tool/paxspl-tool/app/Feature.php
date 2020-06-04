<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name', 'type', 'height', 'description', 'abstract', 'feature_model_id', 'parent',
    ];

    public function parent_()
    {
        return $this->belongsTo('App\Feature', 'parent');
    }

    public function children()
    {
        $features = Feature::where('parent',$this->id)->get();
        return $features;
    }

    

    public function fm()
    {
        return $this->belongsTo('App\FeatureModel', 'feature_model_id');
    }

    public function artifacts()
    {
        return $this->hasMany('App\FeatureArtifact');
    }


    public function style()
    {
        $style = '';
        if($this->abstract){
            $style ='color: blue;
            font-style: italic;';
    }
    return $style;
    }

}
