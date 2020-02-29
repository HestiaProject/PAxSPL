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

    public function techniques()
    {
        return $this->hasMany('App\TechniqueProject');
    }

    public function artifacts()
    {
        return $this->hasMany('App\Artifact')->orderBy('type', 'asc');
    }

    public function authUser()
    {
        $user = User::find(auth()->id());


        foreach ($this->teams as $team) {


            if ($team->user_id == $user->id) {
                return false;
                break;
            }
        }
        return true;
    }

    public function status_user()
    {
        


        foreach ($this->teams as $team) {

            print($team->status);
            if ($team->status == "Incomplete") {
                return true;
                break;
            }
        }
        return true;
    }
}
