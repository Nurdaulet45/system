@extends('layouts.app_admin')

@section('content')
    <section class="content">
    
        <div class="box">
            <div class="box-body">
    
                @include('include\result_messages')
    
                <div class="row">
                    <div class="col-md-6">
                    <form method="post" action="{{ route('system.admin.roles.update', $role->id)}}">
                        @method("post")
                        @csrf

                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="odd even">
                                        <td><b>Название <i class="red">*</i></b></td>
                                        <td>
                                        <input class="form-control" name="name" id="name" value="{{ $role->name}}"/>
                                        </td>
                                    </tr>
                                    <tr class="odd even">
                                        <td><b>Guar_name <i class="red">*</i></b></td>
                                        <td>
                                            <textarea class="form-control" name="guard_name" id="guard_name">{{ $role->guard_name}}</textarea>
                                        </td>
                                    </tr>
                                    
    
                                    <tr class="odd even">
                                        <td>
                                        <a href="{{ route('system.admin.roles') }}">
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
