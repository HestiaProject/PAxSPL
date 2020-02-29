<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedTechniques extends Model
{
    protected $fillable = [
        'related_to', 'related_from',
    ];


    public  function techniques_from()
    {
        return $this->belongsTo('App\Technique', 'related_from');
    }

    public  function techniques_to()
    {
        return $this->belongsTo('App\Technique', 'related_to');
    }
}
