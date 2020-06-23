<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    protected $fillable = ['*'];

    public function getUser(){
       return $this->hasOne('App\User','id','causer_id');
    }

    
    public function getSubject(){

       return $this->hasOne('App\User','id','causer_id');

    }

}
