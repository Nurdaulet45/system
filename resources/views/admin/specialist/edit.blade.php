@extends('layouts.app_admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                @include('include\result_messages')

                    {{-- Для валидации data-toggle="validator--}}
                <form action="{{ route('system.admin.specialists.update', $specialist->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логин</label>
                                <input type="text" class="form-control" name="login" placeholder="Введите Логин" value="{{$specialist->login}}">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Пароль</label>
                                <input type="text" class="form-control" name="password"
                                       placeholder="Введите пароль, если хотите его изменить">
                            </div>
                            <div class="form-group">
                                <label for="">Подтверждение пароля</label>
                                <input type="text" class="form-control" name="password_confirmation"
                                       placeholder="Подтверждение пароля">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="first_name">Имя</label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                       value="@if(old('first_name')) {{old('first_name')}}@else{{$specialist->first_name ?? ""}}@endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="last_name">Фамилия</label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                       value="@if(old('last_name')) {{old('last_name')}}@else{{$specialist->last_name ?? ""}}@endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="middle_name">Отчества</label>
                                <input type="text" class="form-control" name="middle_name" id="middle_name"
                                       value="@if(old('middle_name')) {{old('middle_name')}}@else{{$specialist->middle_name ?? ""}}@endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="phone">Телефон</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       value="@if(old('phone')) {{old('phone')}}@else{{$specialist->phone ?? ""}}@endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       value="@if(old('email')) {{old('email')}}@else{{$specialist->email ?? ""}}@endif" required> 
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="role">Роль</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="user"  @if($role == 'user') selected @endif>Пользователь</option>
                                    <option value="specialist"@if($role == 'specialist') selected @endif>Специалист </option> 
                                    <option value="admin" @if($role == 'admin') selected @endif>Администратор</option>
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="permissions">Права доступа</label>
                                <select name="permissions" id="permissions" class="form-control">
                                    <option value="2" >Посмотреть</option>
                                    <option value="3">Удалить</option>
                                    <option value="1" >Добавить</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{$specialist->id}}">
                            <button class="btn btn-primary" type="submit">Изменить</button>
                            <a href="{{route('system.admin.specialists')}}">
                            <button class="btn btn-danger" type="button">Отмена</button></a>

                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
    {{-- /.content--}}
@endsection
