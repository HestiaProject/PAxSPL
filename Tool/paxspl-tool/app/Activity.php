<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',   'phase', 'phase_id', 'order', 'assemble_process_id', 'technique_id', 'status', 'description'
    ];

    public function technique()
    {
        return $this->belongsTo('App\Technique');
    }
    public function input_artifacts()
    {
        return $this->hasMany('App\ActivitiesArtifact')->where('io', 'i');
    }

    public function output_artifacts()
    {
        return $this->hasMany('App\ActivitiesArtifact')->where('io', 'o');
    }
}
