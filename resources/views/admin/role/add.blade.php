@extends('layouts.app_admin')

@section('content')
    <section class="content">
    
        <div class="box">
            <div class="box-body">
    
                @include('include\result_messages')
    
                <div class="row">
                    <div class="col-md-6">
                    <form method="post" action="{{ route('system.admin.roles.store')}}">
                        @method("post")
                        @csrf

                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="odd even">
                                        <td><b>Название <i class="red">*</i></b></td>
                                        <td>
                                        <input class="form-control" name="name" id="name" value="@if(old('name')) {{ old('name')}}@endif"/>
                                        </td>
                                    </tr>
                                    <tr class="odd even">
                                        <td><b>Guard_name <i class="red">*</i></b></td>
                                        <td>
                                            <textarea class="form-control" name="guard_name" id="guard_name"> @if(old('guard_name')){{ old('guard_name')}}@endif</textarea>
                                        </td>
                                    </tr>
    
                                    <tr class="odd even">
                                        <td>
                                                {{-- <button type="reset" class="btn btn btn-danger" >Роил</button>
                                            </form> --}}
                                        </td>
                                        <td>
                                            <button
                                                type="submit"
                                                class="btn btn-success float-right">Создать</button>
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
