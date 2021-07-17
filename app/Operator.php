<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $guarded = [];

    public function works ()
    {

        return $this->belongsToMany('App\Work', 'work_operator');
    }
}
