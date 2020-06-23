<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $fillable =['name', 'description'];
    protected $guard_name = 'web';

}
