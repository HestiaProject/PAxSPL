<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    protected $fillable = [
        'name', 'project_id', 'owner_id', 'type', 'description', 'external_link', 'last_update_date', 'last_update_user', 'extension'
    ];

    /**
     * Get the owner .
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

     /**
     * Get the last_update_user .
     */
    public function update_user()
    {
        return $this->belongsTo('App\User', 'last_update_user');
    }

    public function input_artifacts()
    {
        return $this->hasMany('App\ActivitiesArtifact')->where('io', 'i');
    }

    public function output_artifacts()
    {
        return $this->hasMany('App\ActivitiesArtifact')->where('io', 'o');
    }

    public function features()
    {
        return $this->hasMany('App\FeatureArtifact');
    }
}
