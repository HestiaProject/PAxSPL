<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',   'phase' , 'order' , 'assemble_process_id' , 'technique_id', 'status', 'description'
    ]; 

    public function technique()
    {
        return $this->belongsTo('App\Technique');
    }
    
}
