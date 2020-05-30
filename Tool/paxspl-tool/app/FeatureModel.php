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
}
