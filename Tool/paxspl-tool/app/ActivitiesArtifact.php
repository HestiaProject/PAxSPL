<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivitiesArtifact extends Model
{
    protected $fillable = [
        'activity_id', 'artifact_id','io'
    ];


    public  function artifact()
    {
        return $this->belongsTo('App\Artifact');
    }

    public  function activity()
    {
        return $this->belongsTo('App\Activity');
    }
}
