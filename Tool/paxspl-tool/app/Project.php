<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'owner_id'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function artifacts()
    {
        return $this->hasMany('App\Artifact');
    }
}
