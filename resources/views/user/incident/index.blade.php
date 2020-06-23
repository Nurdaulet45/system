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
                                    <td>Тема</td>
                                    <td>Описание</td>
                                    <td>Комментария специалиста</td>
                                    <td>Статус</td>
                                    <td>Дата создание</td>
                                    <td>Дата обновление</td>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($incidents as $incident)
                                    <tr >
                                        <td>{{ $incident->id }}</td>

                                        <td>
                                        <a href="{{ route('system.user.incidents.view',$incident->id )}}">
                                            {{ $incident->title }}</a></td>
                                        <td>{{ $incident->description }}</td>
                                        <td>{{ $incident->comment }}</td>
                                        <td>{{ $incident->status }}</td>
                                        <td>{{ $incident->created_at }}</td>
                                        <td>{{ $incident->updated_at }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <h2>Инциденты не найден</h2>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p> {{count($incidents)}} инцидентов из {{$countUsers}}</p>

                         @if ($incidents->total() > $incidents->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{ $incidents->links() }}
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
