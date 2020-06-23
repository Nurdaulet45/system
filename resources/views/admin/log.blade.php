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
                                    <td>ID пользователя</td>
                                    <td>Модель</td>
                                    <td>Действия</td>
                                    <td>Время</td>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                @forelse($logs as $log)
                                    <tr >
                                        <td>{{$log->subject_id}}</td>
                                        <td>{{$log->subject_type}}</td>
                                        <td>{{$log->description}}</td>
                                        <td>{{$log->updated_at}}</td>
                                    </tr>
                                    @empty
                                        
                                    <tr colspan="3" class="text-center">
                                        <h2>Логов нет</h2>  
                                    </tr>
                                    @endforelse
                                {{-- @forelse($paginator as $user)
                                    @php
                                        $class = '';
                                        $status = $user->role;
                                        if ($status == 'disabled') $class = 'danger';
                                    @endphp

                                    <tr class="{{ $class }}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ucfirst($user->name)}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <a href=""
                                               title="Просмотреть пользователя"><i class="btn btn-xs"></i>
                                                <button type="submit" class="btn btn-success btn-xs">Просмотреть</button>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                            <a class="btn btn-xs">
                                                <form method="post" style="float: none"
                                                      action="">
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
                                    <tr>
                                        <td colspan="3" class="text-center"><h2>Пользователей нет</h2></td>
                                    </tr>
                                    @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{ count($logs) }} пользователей из {{$countLogs}}</p>

                            @if ($logs->total() > $logs->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{ $logs->links() }}
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
