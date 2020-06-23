<?php

namespace App\Http\Controllers;

use App\Model\Specialist;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\Auth;
use App\Model\Incident;
use App\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    
    public function create(){
        return view('user.incident.add');
    }

    public function store($userId,Request $request){
        $request['user_id'] =  $userId;
        $defStatus = "выявлен";
        $request['status'] = $defStatus;
         $validate =  $request->validate([
                'user_id' => 'required|integer',
                'title' => 'required|min:3|max:50|string',
                'priority' => 'required|min:3',
                'description' => 'required|min:3|max:255|string',
                'status' => 'required'

            ]);

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'file|image|max:5000'
            ]);

            $file = $request->file('image');
            $extencion  = $file->getClientOriginalName();
            $fileName = time() . '.' .$extencion;
            $validate['image'] = $fileName;
            // dd($validate);
            $file->move('uploads/incidents/', $fileName);
        } else {
            $validate['image'] = 'no_image.jpg';
        }
            
        $result = Incident::create($validate);
        if(!empty($result)){
            return redirect()
                    ->route('system.user.incidents.index')
                    ->with(['success' => 'Успешно создано']);
        } else{
            return back()
                    ->withErrors(['msg' => 'Ошибка при создании инцидента. Сообщите администратору'])
                    ->withInput();
        }
    }

    public function byUserIndex(){
        $user_id = Auth::user()->id;
        $perPage = 10;
        
        $countUsers = Incident::where('user_id', $user_id)->count();
        $incidents = Incident::where('user_id', $user_id)->paginate($perPage);

        return view('user.incident.index', compact('incidents', 'countUsers'));
    }

    public function byUserView($id){
        $incident = Incident::findOrFail($id);
        return view('user.incident.view', compact('incident'));
    }
}
