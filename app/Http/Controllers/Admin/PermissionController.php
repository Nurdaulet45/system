<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;

class PermissionController extends Controller
{
    public function index(){
        $perPage = 10;
        $permissions = Permission::paginate($perPage);
        $countPermissions = Permission::all()->count();
    

        return view('admin\permission\index', compact('permissions', 'countPermissions'));
    }

    public function edit($permissionId){

        $permission = Permission::findOrFail($permissionId);
        $roles = Role::all();

        $permissionRoles = $permission->roles->pluck('name');
        if(!empty($permission)){
            return view('admin\permission\edit', compact('permission', 'roles', 'permissionRoles'));
        } else{
            return redirect()
            ->route('system.admin.permissions')
            ->with(['msg' => 'Ошибка. Права доступа не найден']);
        }


    }

    public function create(){
        $roles = Role::all();

        return view('admin.permission.add', compact('roles'));
    }

    public function delete($permissionId){
        $permission = Permission::findOrFail($permissionId);
        $result = $permission->forceDelete();
        if($result){
            return redirect()
            ->route('system.admin.permissions')
            ->with(['success' => $permission->name .'успешно удалено']);
        } else {
            return redirect()
            ->route('system.admin.permissions')
            ->with(['msg' => 'Ошибка при удалении права доступа. Сообщите администратору']);
        }
    }

    public function update($permissionId, Request $request){

        $permission = Permission::findOrFail($permissionId);

        $validate = $request->validate([
            'name' => 'required|min:3|max:20|string',
            'description' => 'required|min:3|max:20|string'
        ]);
        $permission = $permission->update($validate);

        if($permission){
            $permission = Permission::find($permissionId);
            if(!empty($request->input('role_1'))){
                $permission->assignRole('user');
            } 
            if(!empty($request->input('role_2'))){
                $permission->assignRole('specialist');
            } 
            $permission->assignRole('admin');
            return redirect()
            ->route('system.admin.permissions')
            ->with(['success' => 'успешно изменено']);
  
        }else {
            return redirect()
            ->route('system.admin.permissions')
            ->with(['msg' => 'Ошибка изменении права доступа произошла ошибка. Сообщите администратору']);
        }
        // dd($validate);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:3|max:20|string',
            'description' => 'required|min:3|max:20|string'
        ]);
        $validate['guard_name'] = 'web';
        $permission = Permission::create($validate);
        // dd($permission);
        if($permission){
            // $permission = Permission::find($permissionId);
            if(!empty($request->input('role_1'))){
                $permission->assignRole('user');
            } 
            if(!empty($request->input('role_2'))){
                $permission->assignRole('specialist');
            } 
            $permission->assignRole('admin');
            return redirect()
            ->route('system.admin.permissions')
            ->with(['success' => 'успешно создано']);
  
        }else {
            return redirect()
            ->route('system.admin.permissions')
            ->with(['msg' => 'Ошибка при создании права доступа. Сообщите администратору']);
        }
    }

    public function search(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');

        $permissions = Permission::OrderBy('id', 'DESC')->where(function ($query) use ($name, $description){

            if($name)
                $query->where('name', 'like', "%$name%");

            if($description)
                $query->where('description', 'like', "%$description%");

        })->paginate($request->input('perPage', 10));
        $countPermissions = Permission::OrderBy('id', 'DESC')->where(function ($query) use ($name, $description){

            if($name)
                $query->where('name', 'like', "%$name%");

            if($description)
                $query->where('description', 'like', "%$description%");

        })->count();

        return view('admin\permission\index', compact('permissions', 'countPermissions'));
    }
}
