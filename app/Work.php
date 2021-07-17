<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded = [];

    public function users ()
    {

        return $this->belongsToMany('App\User', 'user_work');
    }

    public function operators ()
    {

        return $this->belongsToMany('App\Operator', 'work_operator');
    }

    public function steps ()
    {

        return $this->hasMany('App\Step');
    }
}
