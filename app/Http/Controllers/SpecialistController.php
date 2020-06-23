<?php

namespace App\Http\Controllers;

use App\Model\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialistController extends Controller
{
    public function indexIncidents($incidentId)
    {
        $incident = Incident::find($incidentId);
        if(!empty($incident)){
            
            return view('specialist.incident.view', compact('incident'));

        } else{
            return back()
            ->withErrors(['msg' => 'Ошибка. Данные по этому 
                            инциденту id = ' . $incidentId.' не найден'])
            ->withInput();
        }

    }
    public function editIncidents($incidentId){

        $incident = Incident::find($incidentId);
        if(!empty($incident)){
            return view("specialist.incident.edit", compact("incident"));
        } else{
            return back()
                    ->withErrors(['msg' => 'Ошибка. Страница данного инцидента не найден'])
                    ->withInput();
        }
    }

    public function inWorkIncidents()
    {
        $spec_id = Auth::user()->id;
        $perPage = 10;

        $incidents = Incident::where('user_id', $spec_id)
                                ->where('status', 'в работе')
                                ->paginate($perPage);
       
        return view("specialist.incident.inWork", compact('incidents'));
    }

    public function doneIncidents(){
        $spec_id = Auth::user()->id;
        $status = "сделано";
        $perPage = 10;
        
        $incidents = Incident::where('user_id', $spec_id)
                                ->where('status', $status)
                                ->paginate($perPage);

        $countIncidents = Incident::where('user_id', $spec_id)
                                ->where('status', $status)
                                ->count();
        return view('specialist.incident.done', compact('incidents', 'countIncidents'));
    }
  
    public function storeIncidents(Request $request){

        $incidentId = $request->input('id');

        $validate = $request->validate([
            "comment"=> 'required|min:5|max:200|string'
        ]);

        $incident = Incident::findOrFail($incidentId);
       
        $incident->status = "сделано";
        $incident->comment = $validate['comment'];
        $result = $incident->save();

        if(!empty($result)){
            return redirect()
                    ->route('system.specialist.incidents.done')
                    ->with(['success' => 'Данные успешно сохранены']);
        } else{
            return back()
                    ->withErrors(['msg' => 'Ошибка сохранения. 
                                    Сообщите администратору'])
                    ->withInput();
        }

    }
}
