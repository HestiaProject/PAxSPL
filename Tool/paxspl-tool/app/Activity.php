<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 'project_id', 'phase' , 'order' , 'assemble_processes_id' , 'technique_id'
    ]; 
}
