<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssembleProcess extends Model
{
    protected $fillable = [
        'name', 'project_id', 'status'
    ];

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function activities_phase($phase)
    {
        return $this->hasMany('App\Activity')->where('phase', '=', $phase);
    }

    public function activities_phase2($phase)
    {
        return Activity::where('phase', '=', $phase);
    }

    public function activities_ext()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'extract');
    }

    public function activities_cat()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'categorize');
    }

    public function activities_group()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'group');
    }
}
