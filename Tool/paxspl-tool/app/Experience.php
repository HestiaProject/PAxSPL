<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'time',   'difficulty', 'obs', 'activity_id', 'assemble_process_id', 
    ];

    public function processes()
    {
        return $this->belongsTo('App\AssembleProcess', 'assemble_process_id');
    }

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'activity_id');
    }
}
