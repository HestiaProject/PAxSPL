<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureModel extends Model
{
    protected $fillable = [
        'name', 'project_id', 'xml'
    ];

    public function features()
    {
        return $this->hasMany('App\Feature')->orderBy('height', 'asc');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function features_order()
    {
        $features = [];
        $core = Feature::where('feature_model_id', $this->id)->where('height', '0')->first();
        
        $features[] = $core;
        $features = $this->addChildren($core, $features);

        return $features;
    }

    function addChildren(Feature $parent, $features)
    {
        $children = $parent->children();
        foreach ($children as $c) {
            $newF = Feature::find($c->id);
            $features[] = $newF;
            if ($newF->children()->count() > 0) {
                $features =  $this->addChildren($newF, $features);
            }
        }
        return $features;
    }
}
