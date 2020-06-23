@extends('layouts.app_admin')

@section('content')
    {{-- Main content--}}
    <section class="content">
        {{-- Small boxes (Stat box) --}}
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                {{-- Small box --}}
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3>{{ $countIncidens}}</h3>
                        <p>Выявлено</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    @can('roles')
                    <a href="{{ route('system.admin.incidents') }}" class="small-box-footer">Больше информации
                    <i class="fa fa-arrow-circle-o-right"></i></a>
                    @else
                    <a href="#" class="small-box-footer">Больше информации
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                    @endif
                </div>
            </div>
            {{-- ./col --}}
            <div class="col-lg-3 col-xs-6">
                {{-- Small box --}}
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $countConfirmedIncidents }}</h3>
                        <p>Подтверждено</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-square-o"></i>
                    </div>
                    @can('roles')
                    <a href="{{ route('system.admin.incidents.chart') }}" class="small-box-footer">Больше информации
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                    @else
                    <a href="#" class="small-box-footer">Больше информации
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                    @endcan
                </div>
            </div>

            {{-- ./col --}}
            <div class="col-lg-3 col-xs-6">
                {{-- Small box --}}
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $countUsers}}</h3>
                        <p>Кол-во Пользовательей</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    @can('roles')
                    <a href="{{ route('system.admin.users') }}" class="small-box-footer">Больше информации
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                    @else
                    <a href="#" class="small-box-footer">Больше информации
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                        @endcan
                </div>
            </div>

            {{-- ./col--}}
            <div class="col-lg-3 col-xs-6">
                {{-- Small box --}}
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $countSpecialist }}</h3>
                        <p>Кол-во Специалистов</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    @can('roles')
                        <a href="{{ route('system.admin.specialists') }}" class="small-box-footer">Больше информации
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                    @else 
                        <a href="#" class="small-box-footer">Больше информации
                            <i class="fa fa-arrow-circle-o-right"></i></a>
                    @endcan
                </div>
            </div>
            {{-- ./col--}}

        </div>
        <div class="flex-fill" style="display: -webkit-flex;
-webkit-align-items: flex-start;">
        </div>

    </section>


@endsection
