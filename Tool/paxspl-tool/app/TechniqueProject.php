<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechniqueProject extends Model
{
    protected $fillable = [
        'project_id', 'technique_id', 'reason'
    ];
}
