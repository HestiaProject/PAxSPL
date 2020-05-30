<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureArtifact extends Model
{
    protected $fillable = [
        'feature_id', 'artifact_id',
    ];


    public  function artifact()
    {
        return $this->belongsTo('App\Artifact', 'artifact_id');
    }

    public  function feature()
    {
        return $this->belongsTo('App\Feature', 'feature_id');
    }
}
