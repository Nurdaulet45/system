<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Incident;
use App\User;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Str;

use Illuminate\Support\Carbon;

class IncidentsController extends Controller
{
    public function index(){
        $incidents = Incident::all();
        $onlyDiscovered= Incident::where("status", "выявлен")->get();
        $onlyInWork = Incident::where("status", "в работе")->get();
        $onlyDone = Incident::where("status", "сделано")->get();
        $onlyConfirmed = Incident::where("status", "Подтверждено")->get();

        return view('admin.incident.index', compact('onlyDiscovered', 'onlyInWork', 'onlyDone', 'onlyConfirmed'));
    }

    public function edit($incidentId){


        $specialists = User::role('specialist')->select("id", DB::raw("CONCAT(first_name,' ',last_name,' ',middle_name) AS full_name") )->get();
        $incident = Incident::find($incidentId);
        if(!empty($incident)){
            return view('admin.incident.edit', compact('incident', 'specialists'));
        } else{
            return back()
            ->withErrors(['msg' => 'Ошибка. Данные по этому инциденту id = ' . $incidentId.' не найден']);
        }
    }

    public function store(Request $request){
        $incidentId = $request->input('incident_id');
        $incident = Incident::findOrFail($incidentId);
        $specialistId =  $request->input('redirect');
        if(empty($specialistId)){

            return back()
            ->withErrors(['msg' => 'Ошибка при изменении инцидента Специалист не выбран'])
            ->withInput();
        }      

        $incident->user_id = $specialistId;
        $incident->status = 'в работе';

        if($incident->save()){
            return redirect()
            ->route('system.admin.incidents')
            ->with(['success' => 'Успешно изменено']);
        } else {
            return back()
            ->withErrors(['msg' => 'Ошибка при изменении инцидента. Сообщите администратору']);
        }
    }

    public function confirm($incidentId){
        $incident =Incident::findOrFail($incidentId);
        $incident->status = 'подтверждено';
        $incident->save();
        return redirect()->route('system.admin.incidents');

    }

    public function revision($incidentId){
        $incident =Incident::findOrFail($incidentId);
        $incident->status = 'в работе';
        $incident->save();
        return redirect()->route('system.admin.incidents');

    }

    public function chart(Content $content){
        return view('admin.chart');

    }

    public function chartData(Request $request){
  
        $subWeek = Carbon::now()->subDays(7)->format('yy-m-d');

        $data = DB::select("SELECT
                max(updated_at) as days, count(1)
                FROM incidents 
                where updated_at >= '$subWeek'
                group by EXTRACT(MONTH FROM updated_at), EXTRACT(DAY FROM updated_at)
                order by EXTRACT(MONTH FROM updated_at), EXTRACT(DAY FROM updated_at) asc");
        $counts = collect($data)->pluck('count(1)');
        $dates = collect($data)->pluck('days');
        $currDate = [];
        foreach($dates as $date){
            $currDate[]= Str::substr($date, 0, 10);
        }

        return response()->json(compact('counts', 'currDate'));
    }

}
