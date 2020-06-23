<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ActivityLog;

class LogController extends Controller
{
    public function logs(){
        $perPage = 10;
        $logs = ActivityLog::select('subject_id', 'subject_type', 'description','updated_at')->orderBy('updated_at', 'desc')->paginate($perPage);
       $countLogs = ActivityLog::all()->count();
        return view('admin.log', compact('logs', 'countLogs'));
    }
}
