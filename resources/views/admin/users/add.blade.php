@extends('layouts.app_admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    @include('include\result_messages')

                    {{-- Для валидации data-toggle="validator--}}
                    <form action="{{ route('system.admin.users.store')}}" method="post">

                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логин</label>
                                <input type="text" class="form-control" name="login" placeholder="Введите Логин"  value="{{ old('login') }}">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Пароль</label>
                                <input type="text" class="form-control" name="password"
                                       placeholder="Введите пароль" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Подтверждение пароля</label>
                                <input type="text" class="form-control" name="password_confirmation"
                                       placeholder="Подтверждение пароля" value="{{ old('password_confirmation') }}">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="first_name">Имя</label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                       value="{{ old('first_name') }}" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="last_name">Фамилия</label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                       value="{{ old('last_name') }}" required>
                            </div>
                         
                            <div class="form-group has-feedback">
                                <label for="middle_name">Отчество</label>
                                <input type="text" class="form-control" name="middle_name" id="middle_name"
                                value="{{ old('middle_name') }}" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="phone">Телефон</label>
                                <input type="text" pattern="[0-9]{10}" class="form-control" name="phone" id="phone"
                            value="{{ old('phone') }}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control"  value="{{ old('email') }}" name="email" id="email"
                                       value="" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="role">Роль</label>
                                <select name="role" id="role" class="form-control">
                                        <option value="user" @if ( old('role')  == "user") selected @endif>Пользователь</option>
                                        <option value="specialist"  @if (old('role') == "specialist") selected @endif>Специалист </option> 
                                        <option value="admin"  @if ( old('role')== "admin") selected @endif>Администратор</option>
                                    </select>
                            </div>
                            {{-- <div class="form-group has-feedback">
                                <label for="permissions">Права доступа</label>
                                <select name="permissions" id="permissions" class="form-control">
                                    <option value="2" >Посмотреть</option>
                                    <option value="3">Удалить</option>
                                    <option value="1" >Добавить</option>
                                </select>
                            </div> --}}
                        </div>

                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button class="btn btn-primary" type="submit">Создать</button>
                        <a href="{{ route('system.admin.users')}}">
                            <button class="btn btn-danger" type="button">Отмена</button></a>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    {{-- /.content--}}
@endsection
