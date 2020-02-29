<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'role', 'project_id', 'user_id', 'company_role', 'spl_exp', 'retrieval_exp',
        'obs', 'fca', 'lsi', 'vsm', 'cluster', 'data_flow', 'dependency', 'status', 'retrieval_role'
    ];

    /**
     * Get the user .
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the project .
     */
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

     
}
