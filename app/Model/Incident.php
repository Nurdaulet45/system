<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable =  ["user_id", "title", "priority", "description", "status", "image"]; 
    // protected $guard_name = '';     
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function specialist(){
        return $this->belongsTo(Specialist::class, "specialist_id", "id");
    }
    
}
