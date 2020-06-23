<?php

namespace App\Model;
use App\Model\Incident;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $guarded = [];  

    public function incidents(){
        return $this->hasMany(Incident::class, "specialist_id", "id");
    }
}
