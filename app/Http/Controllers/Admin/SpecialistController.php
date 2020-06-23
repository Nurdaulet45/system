<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Specialist;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class SpecialistController extends Controller
{
    public function createSpecialists(Request $request)
    {

        // MetaTag::setTags(['title' => 'Добавление пользователя']);
        return view('admin.specialist.add');
    }

    public function specialists(){
        
        $column = [
            "id", "login", "first_name",
            "last_name", "middle_name", 
            "email","phone" ];
        $perPage = 10;
        // dd(User::role('specialist')->get()); // Returns only users with the role 'writer'

        // $specialists = Specialist::select($column)->orderBy('last_name', 'asc')->paginate($perPage);
      
        $specialists = User::role('specialist')->select($column)->paginate($perPage);
        // dd(Role::OrderBy('id', 'DESC')->paginate(10));
        // $role = Auth::user()->roles;
        // dd($role[0]['name']);
        $countSpecialists = User::role('specialist')->count();
        return view('admin.specialist.index', compact('specialists', 'countSpecialists'));
    }

    public function editSpecialists($id){

        $column = [
            "id", "login", "first_name",
            "last_name", "middle_name", 
            "email","phone"];

        // $specialist = Specialist::select($column)->findOrFail($id);
        $specialist = User::select($column)->findOrFail($id);
        // $role = $specialist ->removeRole('user');
        $role = $specialist->roles[0]["name"];
        // dd($role);
        return view('admin.specialist.edit', compact('specialist', 'role'));

    }
    public function updateSpecialists($id, Request $request, Specialist $specialist){

        $oldSpecialistData = User::findOrFail($id);  

        $validate =  $request->validate([
            'id'=>'required',
            'login' => 'required|min:3|max:40|string',
            'first_name' => 'required|min:3|max:20|string',
            'last_name' => 'required|min:3|max:20|string',
            'middle_name' => 'required|min:3|max:20|string',
            'email' => 'required|string|email|max:50|unique:users,email,'.$id,
            'phone' => 'required|min:6|max:20|string',
            'role' => 'required',
            'password' => 'nullable|string|min:8|max:20|confirmed',
            'password_confirmation' => 'nullable|required_with:password|same:password|min:8'
        ]);
        // dd(Auth::user()->roles);
        
        $oldRole = $oldSpecialistData->roles[0]['name'];
        $role = $validate['role'];
        unset($validate['role']);

        if($role !== $oldRole){
            $oldSpecialistData->removeRole($oldRole);
            $oldSpecialistData->assignRole($role);
        } 

        if(empty($validate['password'])){
            $validate['password'] = $oldSpecialistData->password;
            unset($validate['password_confirmation']);
        } else{
            $validate['password'] = crypt($validate['password']);
            unset($validate['password_confirmation']);
        } 

        // $oldSpecialistData->removeRole();
        foreach($validate as $key => $value){
            $oldSpecialistData->$key = $value;
        }
        // dd($oldSpecialistData);

        $result = $oldSpecialistData->save();
        if(!empty($result)){
            return redirect()
                    ->route('system.admin.specialists.edit', $id)
                      ->with(['success' => 'Успешно сохранено']);
        } else{
            return back()
                    ->withErrors(['msg' => 'Ошибка сохранения. Сообщите администратору'])
                    ->withInput();
        }
    }

    public function storeSpecialists(Request $request){

        $id = $_POST['id'];
        $validate =  $request->validate([
            'login' => ['required','string','min:3','max:40',\Illuminate\Validation\Rule::unique('specialists')->ignore($id)],
            'first_name' => 'required|min:3|max:20|string',
            'last_name' => 'required|min:3|max:20|string',
            'middle_name' => 'required|min:3|max:20|string',
            'email' => ['required','string','email','max:50',\Illuminate\Validation\Rule::unique('specialists')->ignore($id)],
            'phone' => 'required|min:6|max:20|string',
            'role' => 'required',
            'password' => 'required|string|min:8|max:20|confirmed',
            'password_confirmation' => 'required|required_with:password|same:password|min:8'
        ]);

        $role = $validate['role'];
        unset($validate['role']);

        // if(empty($validate['password'])){
        //     $validate['password'] = $oldSpecialistData->password;
        //     unset($validate['password_confirmation']);
        // } else{
        //     $validate['password'] = crypt($validate['password']);
        //     unset($validate['password_confirmation']);
        // } 

        unset($validate['password_confirmation']);

        $validate['password'] = bcrypt($validate['password']);
        $result = User::create($validate);
        $result->assignRole($role);

        if(!empty($result)){
            return redirect()
                    ->route('system.admin.specialists')
                    ->with(['success' => 'Успешно создано']);
        } else{
            return back()
                    ->withErrors(['msg' => 'Ошибка сохранения. Сообщите администратору'])
                    ->withInput();
        }
    }

    public function deleteSpecialists($id){

        $specialist = User::findOrFail($id);
        $name = $specialist->first_name;
        $result = $specialist->forceDelete();
        if ($result){
            return redirect()
                ->route('system.admin.specialists')
                ->with(['success' => 'Специалист ' . ucfirst($name).' Удален']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
