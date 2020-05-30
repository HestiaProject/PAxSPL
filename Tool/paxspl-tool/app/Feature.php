<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name', 'type', 'height', 'description', 'abstract', 'fm_id', 'parent',
    ];

    public function parent_()
    {
        return $this->belongsTo('App\Feature', 'parent');
    }

    public function fm()
    {
        return $this->belongsTo('App\FeatureModel', 'fm_id');
    }

    public function artifacts()
    {
        return $this->hasMany('App\FeatureArtifact');
    }

}
