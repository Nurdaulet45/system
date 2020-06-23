<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;

class RoleController extends Controller
{
    public function index(){
        $perPage = 10;
        $roles = Role::paginate($perPage);
        $countRoles = Role::all()->count();

        return view('admin\role\index', compact('roles', 'countRoles'));
    }

    public function edit($roleId){

        $role = Role::findOrFail($roleId);

        if(!empty($role)){
            return view('admin\role\edit', compact('role'));
        } else{
            return redirect()
            ->route('system.admin.roles')
            ->with(['msg' => 'Ошибка. Права доступа не найден']);
        }


    }

    public function create(){

        return view('admin.role.add');
    }

    public function delete($roleId){
        $role = Role::findOrFail($roleId);
        $result = $role->forceDelete();
        if($result){
            return redirect()
            ->route('system.admin.roles')
            ->with(['success' => $role->name .'успешно удалено']);
        } else {
            return redirect()
            ->route('system.admin.roles')
            ->with(['msg' => 'Ошибка при удалении права доступа. Сообщите администратору']);
        }
    }

    public function update($roleId, Request $request){

        $role = Role::findOrFail($roleId);

        $validate = $request->validate([
            'name' => 'required|min:3|max:20|string',
        ]);
        $role = $role->update($validate);

        if($role){
           
            return redirect()
            ->route('system.admin.roles')
            ->with(['success' => 'успешно изменено']);
  
        }else {
            return redirect()
            ->route('system.admin.roles')
            ->with(['msg' => 'Ошибка изменении Роли. Сообщите администратору']);
        }
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:3|max:20|string',
        ]);
        $validate['guard_name'] = 'web';
        $role = Role::create($validate);
        // dd($permission);
        if($role){

            return redirect()
            ->route('system.admin.roles')
            ->with(['success' => 'успешно создано']);
  
        }else {
            return redirect()
            ->route('system.admin.roles')
            ->with(['msg' => 'Ошибка при создании права доступа. Сообщите администратору']);
        }
    }

    public function search(Request $request){
        $name = $request->input('name');
        $guard_name = $request->input('guard_name');

        $roles = Role::OrderBy('id', 'DESC')->where(function ($query) use ($name, $guard_name){

            if($name)
                $query->where('name', 'like', "%$name%");

            if($guard_name)
                $query->where('guard_name', 'like', "%$guard_name%");

        })->paginate($request->input('perPage', 10));
        $countRoles = Role::OrderBy('id', 'DESC')->where(function ($query) use ($name, $guard_name){

            if($name)
                $query->where('name', 'like', "%$name%");

            if($guard_name)
                $query->where('guard_name', 'like', "%$guard_name%");

        })->count();

        return view('admin\role\index', compact('roles', 'countRoles'));
    }
}
