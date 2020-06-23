@extends('layouts.app_admin')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    @include('include\result_messages')

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Логин</td>
                                    <td>Имя</td>
                                    <td>Фамилия</td>
                                    <td>Отчество</td>
                                    <td>Email</td>
                                    <td>Имя</td>
                                    <td>Роль</td>
                                    <td>Действия</td>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                @forelse($specialists as $specialist)
                                    <tr >
                                        <td>{{$specialist->id}}</td>
                                        <td>{{$specialist->login}}</td>
                                        <td>{{$specialist->first_name}}</td>
                                        <td>{{$specialist->last_name}}</td>
                                        <td>{{$specialist->middle_name}}</td>
                                        <td>{{$specialist->email}}</td>
                                        <td>{{$specialist->phone}}</td>
                                        <td>{{$specialist->role}}</td>
                                        <td>
                                        <a href="{{route('system.admin.specialists.edit', $specialist->id)}}"
                                               title="Изменить пользователя"><i class="btn btn-xs"></i>
                                                <button type="submit" class="btn btn-success btn-xs">Изменить</button>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                            <a class="btn btn-xs">
                                                <form method="post" style="float: none"
                                                      action="{{ route('system.admin.specialists.delete', $specialist->id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs delete">
                                                        Удалить
                                                    </button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        
                                    <tr colspan="3" class="text-center">
                                        <h2>Пользователей нет</h2>  
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{ count($specialists) }} специалистов из {{$countSpecialists}}</p>

                            @if ($specialists->total() > $specialists->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{ $specialists->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
