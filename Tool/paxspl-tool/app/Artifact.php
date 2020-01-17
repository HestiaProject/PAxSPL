<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    protected $fillable = [
        'name', 'project_id', 'owner_id', 'type', 'description', 'external_link', 'last_update_date', 'last_update_user'
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
}
