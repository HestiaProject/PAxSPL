<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssembleProcess extends Model
{
    protected $fillable = [
        'name', 'project_id', 
    ];
}
