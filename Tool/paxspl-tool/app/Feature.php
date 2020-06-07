<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name', 'type', 'height', 'description', 'abstract', 'feature_model_id', 'parent',
    ];

    public function parent()
    {
        return $this->belongsTo('App\Feature', 'parent');
    }

    public function children()
    {
        $features = Feature::where('parent', $this->id)->get();
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
        if ($this->abstract) {
            $style = 'color: blue;
            font-style: italic;';
        }else{
            $style = 'color: black;
            font-style: bold;';
        }

        return $style;
    }

    public function icon()
    {
        $icon = '';
        switch ($this->type) {
            case "Mandatory":
                $icon = 'fas fa-circle';
                break;
            case "Optional":
                $icon = 'far fa-circle';
                break;
            case "OR Alternative":
                $icon = 'fas fa-play icon-white';
                break;
            case "XOR Alternative":
                $icon = 'fas fa-play';
                break;
        }

         
        return $icon;
    }
}
