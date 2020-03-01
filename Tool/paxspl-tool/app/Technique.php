<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    protected $fillable = [
        'name', 'definition', 'variations', 'priority_order', 'recommended_situation', 'not_recommended_situation', 'type', 'inputs'
    ];


    public function related_techniques_from()
    {
        return $this->hasMany('App\RelatedTechniques', 'related_from');
    }


    public function related_techniques_to()
    {
        return $this->hasMany('App\RelatedTechniques', "related_to");
    }


    public function status(Project $project)
    {
        $techniques = TechniqueProject::where('project_id', $project->id)->get();

        foreach ($techniques as $technique) {
            if ($technique->technique_id == $this->id) {
                return true;
                break;
            }
        }
        return false;
    }

    public function recommend_level(Project $project)
    {
        
        return 78 ;
    }

    public function recommend_level_color(Project $project)
    {
        $result = $this->recommend_level($project);
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
