<?php

namespace App;

use App\Model\Incident;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity;

    protected $logAttributes = ['last_name', 'email'];
    protected $recordEvents = ['created', 'updated','deleted'];
    protected $logName = 'user';
    

    protected $logOnlyDirty = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function incidents(){
        return $this->hasMany(Incident::class,"user_id", "id");
    }
}
