<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'activity_log';
    protected $fillable = [
        "log_name",
        "description",
        "subject_id",
        "subject_type",
        "causer_id",
        "causer_type",
        "properties",
        "created_at",
        "updated_at"
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'causer_id', 'id');
    }
}
