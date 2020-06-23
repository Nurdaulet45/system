@extends('layouts.app_admin')

@section('content')
    <section class="content">
    
        <div class="row col-md-12">
            <div class="box">

                <div class="box-header with-border">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Фильтр</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive1">
        
                                        <table class="table table-bordered ">
                                            <form action="{{ route('system.admin.roles.search')}}" method="post">
                                                @method('post')
                                                @csrf
                                            <tbody>
                                                <tr class="odd even">
                                                    <td><b>Название:</b></td>
                                                    <td>
                                                        <input class="form-control" name="name" id="name"/>
                                                    </td>
                                                </tr>
                                                <tr class="odd even">
                                                    <td><b>Guard_name:</b></td>
                                                    <td>
                                                        <input class="form-control" name="guard_name" id="guard_name"/>
                                                    </td>
                                                </tr>
                                                <tr class="odd even">
                                                    <td>
                                                        <button type="reset" class="btn btn btn-danger clear" >Очистить</button>
                                                    </td>
                                                    <td>
                                                    {{-- <a href="{{ route('system.admin.permissions.search')}}"> --}}
                                                    {{-- <form>X --}}
                                                        <button type="submit" class="btn btn btn-primary">
                                                            Поиск
                                                        </button>
                                                    {{-- </a> --}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </form>
                                        </table>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    @include('include\result_messages')
        
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr class="odd even">
                                <th>ID</th>
                                <th>Название</th>
                                <th>Guard_name</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                                    <tr class="odd even" title="Нажмите дважды чтобы переходить">
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->guard_name}}</td>
                                        <td>
                                        <a href="{{route('system.admin.roles.edit', $role->id)}}"
                                               title="Изменить права доступа"><i class="btn btn-xs"></i>
                                                <button type="btn" class="btn btn-success btn-xs">Изменить</button>
                                            </a>
                                            {{-- <a href="#"
                                                title="Изменить пользователя"><i class="btn btn-xs"></i>
                                                 <button type="submit" class="btn btn-success btn-xs">Изменить</button>
                                             </a> --}}
                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                            <a class="btn btn-xs">
                                                {{-- <form method="post" style="float: none"
                                                      action="{{ route('system.admin.permissions.delete', $permission->id)}}">
                                                    @method('DELETE') --}}
                                                    <a href="{{route('system.admin.roles.delete', $role->id)}}"
                                                    title="Удалить права доступа"><i class="btn btn-xs"></i>
                                                     <button type="btn" class="btn btn-danger btn-xs">Удалить</button>
                                                 </a>
                                                    {{-- <button type="submit" class="btn btn-danger btn-xs delete">
                                                        Удалить
                                                    </button> --}}
                                                {{-- </form> --}}
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        
                                    <tr colspan="3" class="text-center">
                                        <h2>Нет Роли</h2>  
                                    </tr>
                                    @endforelse
                        </tbody>
                    </table>
                    </div>
                    <div class="text-center">
                        <p>{{ count($roles) }} из {{$countRoles}}</p>

                        @if ($roles->total() > $roles->count())
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            {{ $roles->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                 
        
                </div>
            </div>
        </div>
    </section>
@endsection
