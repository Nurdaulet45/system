@extends('layouts.app_admin')

@section('content')
    <section class="content">
    
        <div class="box">
            <div class="box-body">
    
                @include('include\result_messages')
    
                <div class="row">
                    <div class="col-md-6">
                    <form method="post" action="{{ route('system.admin.permissions.update', $permission->id)}}">
                        @method("post")
                        @csrf

                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="odd even">
                                        <td><b>Название <i class="red">*</i></b></td>
                                        <td>
                                        <input class="form-control" name="name" id="name" value="{{ $permission->name}}"/>
                                        </td>
                                    </tr>
                                    <tr class="odd even">
                                        <td><b>Описание <i class="red">*</i></b></td>
                                        <td>
                                            <textarea class="form-control" name="description" id="description">{{ $permission->description}}</textarea>
                                        </td>
                                    </tr>
                                    <tr class="odd even" >
                                        <td><b>Назначить разрешение ролям</b></td>
                                        <td>
                                            <ul class="ul-li-no-style">
                                                @foreach($roles as $role)
                                                <li>
                                                   
                                                            
                                                    <input  type="checkbox" value="{{ $role->id}}"
                                                @foreach ($permissionRoles as $permissionRole)
                                                    @if($permissionRole ==$role->name) checked @endif 
                                                    @endforeach
                                                    name="role_{{$role->id}}" >
                                                        <label>{{ $role->name }}</label>

                                                    </li>

                                                @endforeach
                                              
                                            </ul>
                                        </td>
                                    </tr>
    
                                    <tr class="odd even">
                                        <td>
                                        <a href="{{ route('system.admin.permissions') }}">
                                                <button type="button" class="btn btn btn-danger" >Назад</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button
                                                type="submit"
                                                class="btn btn-success float-right">Сохранить</button>
                                        </td>
                                    </tr>
    
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
    
        </div>
    </section>
@endsection
