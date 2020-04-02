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

    public function techniques_project()
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


            if ($team->status == "Incomplete") {
                return true;
                break;
            }
        }
        return false;
    }

    public function techniques()
    {
        return Technique::all();
    }

    public function assemble_process()
    {
        return $this->hasMany('App\AssembleProcess');
    }

    public function activities(String $phase, AssembleProcess $ap)
    {

        return Activity::where("assemble_processes_id", $ap->id)::where("phase", $phase);
    }
}