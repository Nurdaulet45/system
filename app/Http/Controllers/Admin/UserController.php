<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Specialist;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $column = [
            "id", "login", "first_name",
            "last_name", "middle_name", 
            "email","phone" ];
        $perPage = 10;
        // dd(User::role('specialist')->get()); // Returns only users with the role 'writer'

        // $specialists = Specialist::select($column)->orderBy('last_name', 'asc')->paginate($perPage);
        
        $users = User::role('user')->select($column)->paginate($perPage);
        // dd(Role::OrderBy('id', 'DESC')->paginate(10));
        // $role = Auth::user()->roles;
        // dd($role[0]['name']);
        $countUsers = User::role('user')->count();

        return view('admin.users.index', compact('users', 'countUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id = $request->input('id');
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
                    ->route('system.admin.users')
                    ->with(['success' => 'Успешно создано']);
        } else{
            return back()
                    ->withErrors(['msg' => 'Ошибка сохранения. Сообщите администратору'])
                    ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $column = [
            "id", "login", "first_name",
            "last_name", "middle_name", 
            "email","phone"];

        // $specialist = Specialist::select($column)->findOrFail($id);
        $user = User::select($column)->findOrFail($id);
        // $role = $specialist ->removeRole('user');
        $role = $user->roles[0]["name"];
        // dd($role);
        return view('admin.users.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);  

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
        
        $oldRole = $user->roles[0]['name'];
        $role = $validate['role'];
        unset($validate['role']);

        if($role !== $oldRole){
            $user->removeRole($oldRole);
            $user->assignRole($role);
        } 

        if(empty($validate['password'])){
            $validate['password'] = $user->password;
            unset($validate['password_confirmation']);
        } else{
            $validate['password'] = crypt($validate['password']);
            unset($validate['password_confirmation']);
        } 

        // $oldSpecialistData->removeRole();
        foreach($validate as $key => $value){
            $user->$key = $value;
        }
        // dd($oldSpecialistData);

        $result = $user->save();
        if(!empty($result)){
            return redirect()
                    ->route('system.admin.users.edit', $id)
                      ->with(['success' => 'Успешно сохранено']);
        } else{
            return back()
                    ->withErrors(['msg' => 'Ошибка сохранения. Сообщите администратору'])
                    ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $name = $user->first_name;
        $result = $user->forceDelete();
        if ($result){
            return redirect()
                ->route('system.admin.users')
                ->with(['success' => 'Пользователь ' . ucfirst($name).' Удален']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
