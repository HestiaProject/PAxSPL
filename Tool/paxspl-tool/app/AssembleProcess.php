<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssembleProcess extends Model
{
    protected $fillable = [
        'name', 'project_id', 'status','diagram'
    ];


    public function artifacts()
    {
        $artifacts = [];
        $activities = Activity::where('assemble_process_id', $this->id)->get();
        foreach ($activities as $activity){
            $artifactsA = $activity->output_artifacts;
            foreach ($artifactsA as $art) {
                $artifacts[] = $art;
            }
        }
        return $artifacts;
    }

    public function activities()
    {
        return $this->hasMany('App\Activity')->orderBy('phase_id', 'asc')->orderBy('order', 'asc');
    }

    public function activities_phase($phase)
    {
        return $this->hasMany('App\Activity')->where('phase', '=', $phase)->orderBy('order', 'asc');
    }

    public function activities_phase2($phase)
    {
        return Activity::where('phase', '=', $phase)->orderBy('order', 'asc');
    }

    public function activities_ext()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'extract')->orderBy('order', 'asc')->orderBy('order', 'asc');
    }

    public function activities_cat()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'categorize')->orderBy('order', 'asc');
    }

    public function activities_group()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'group')->orderBy('order', 'asc');
    }

    public function activities_fm()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'fm')->orderBy('order', 'asc');
    }

    public function activities_support()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'SupportS')->orderBy('order', 'asc');
    }
    public function activities_domain()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'domain')->orderBy('order', 'asc');
    }

    public function activities_asset()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'asset')->orderBy('order', 'asc');
    }

    public function activities_product()
    {
        return $this->hasMany('App\Activity')->where('phase', '=', 'product')->orderBy('order', 'asc');
    }

    public function activities_retrieval_doing()
    {
        return $this->hasMany('App\Activity')->where('status', '=', 'doing')->orderBy('phase_id', 'asc')->orderBy('order', 'asc');
    }

    public function activities_retrieval_todo()
    {
        return $this->hasMany('App\Activity')->where('status', '=', 'created')->orderBy('phase_id', 'asc')->orderBy('order', 'asc');
    }

    public function activities_retrieval_done()
    {
        return $this->hasMany('App\Activity')->where('status', '=', 'done')->orderBy('phase_id', 'asc')->orderBy('order', 'asc');
    }

    public function progress()
    {
        $progress = 0;
        $doing = $this->activities_retrieval_doing()->count();
        $todo = $this->activities_retrieval_todo()->count();
        $done = $this->activities_retrieval_done()->count();
        $progress = $done * 100;
        $defict = $doing + $todo + $done;
        if ($defict == 0 || $progress == 0) {
            return 0;
        } else {
            $progress = $progress / $defict;
            return round($progress, 0);
        }
    }

    public function progress_color()
    {
        $result = $this->progress();
        if ($result < 25)
            return "red";
        else 
        if ($result < 50  && $result >= 25)
            return "orange";
        else 
        if ($result < 75  && $result >= 50)
            return "dodgerblue";
        else 
            if ($result < 100  && $result >= 75)
            return "limegreen";
        else 
            if ($result >= 100)
            return "green";
    }

     
}
