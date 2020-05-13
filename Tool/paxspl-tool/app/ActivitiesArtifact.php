<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivitiesArtifact extends Model
{
    protected $fillable = [
        'activity_id', 'artifact_id', 'io', 'obs', 'status'
    ];


    public  function artifact()
    {
        return $this->belongsTo('App\Artifact');
    }

    public  function activity()
    {
        return $this->belongsTo('App\Activity');
    }

    public function status()
    {
        return ucfirst($this->status);
    }

    public function status_color()
    {
        if ($this->status == 'problem')
            return 'red';
        else
        if ($this->status == 'checked')
            return 'green';
        else
            return 'blue';
    }
}
