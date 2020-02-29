<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    protected $fillable = [
        'name', 'definition', 'variations', 'priority_order', 'recommended_situation', 'not_recommended_situation', 'type', 'inputs'
    ];

    // user.php
    public function related_techniques_from()
    {
        return $this->hasMany('App\RelatedTechniques', 'related_from');
    }

    // user.php
    public function related_techniques_to()
    {
        return $this->hasMany('App\RelatedTechniques', "related_to");
    }


    
}
