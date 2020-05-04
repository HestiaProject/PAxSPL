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
        return $this->hasMany('App\Activity')->orderBy('phase_id', 'asc')->orderBy('order', 'asc');;
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
}
