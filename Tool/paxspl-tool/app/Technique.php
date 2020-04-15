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

    public function reason(Project $project)
    {
        $tech_projs = TechniqueProject::where('project_id', $project->id)->where('technique_id', $this->id)->get();

        $reason = "";
        foreach ($tech_projs as $tech_proj) {
            $reason = $tech_proj->reason;
        }
        return $reason;
    }

    public function recommend_level(Project $project)
    {
        $score = 0;

        $teams = Team::where("project_id", $project->id)->get();

        $point = 50 / count($teams);
        foreach ($teams as $team) {
            if ($team->cluster && $this->id == 1) {
                $score += $point;
            }
            if ($team->dependency && $this->id == 2) {
                $score += $point;
            }
            if ($team->data_flow && $this->id == 3) {
                $score += $point;
            }
            if ($team->fca && $this->id == 4) {
                $score += $point;
            }
            if ($team->lsi && $this->id == 5) {
                $score += $point;
            }
            if ($team->vsm && $this->id == 6) {
                $score += $point;
            }
        }
        $artifacts = Artifact::where("project_id", $project->id)->get();

        $point = 50 / count($artifacts);
        foreach ($artifacts as $artifact) {

            if (strpos(strtolower($this->inputs), strtolower($artifact->type)) !== false)
                $score += $point;
        }

        if ($this->type == "Support") {
            $score += 100;
        }

        if ($score == 0)
            return 1;
        else if ($score > 100)
            return 100;
        else
            return round($score);
    }


    public function recommend_members(Project $project)
    {
        $result = 0;
        $teams = Team::where("project_id", $project->id)->get();
        foreach ($teams as $team) {
            if ($team->cluster && $this->id == 1) {
                $result += 1;
            }
            if ($team->dependency && $this->id == 2) {
                $result += 1;
            }
            if ($team->data_flow && $this->id == 3) {
                $result += 1;
            }
            if ($team->fca && $this->id == 4) {
                $result += 1;
            }
            if ($team->lsi && $this->id == 5) {
                $result += 1;
            }
            if ($team->vsm && $this->id == 6) {
                $result += 1;
            }
        }
        return $result;
    }

    public function recommend_artifacts(Project $project)
    {
        $result = 0;
        $artifacts = Artifact::where("project_id", $project->id)->get();
        foreach ($artifacts as $artifact) {

            if (strpos(strtolower($this->inputs), strtolower($artifact->type)) !== false)
                $result += 1;
        }
        return $result;
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
