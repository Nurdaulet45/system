@extends('layouts.app_admin')

@section('content')
    <section class="content">

      <div class="box ">

        <div class="box-header with-border">
          <h3 class="box-title">Создание запроса</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
            @include('include\result_messages')

              <form action="{{ route('system.user.incidents.store', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                @method('post')
                @csrf
              <div class="form-group">
                <label>Тема</label>
                <input type="text" class="form-control" name="title" placeholder="Введите Тему"  value="{{ old('title') }}">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label for="priority">Приоритет</label>
              <select style="width: 100%;" name="priority" aria-selected="{{old('priority')}}" id="priority" aria-hidden="true" required>
                  <option value="" selected disabled>Выберите приоритет</option>
                  <option value="Urgent">Urgent</option>
                  <option value="High">High</option>
                  <option value="Medium">Medium</option>
                  <option value="Low">Low</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" value="{{old("description")}}" name="description"></textarea>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Фото</label>
                <input type="file" class="form-control" name="image" placeholder="Загрузите фото"  value="{{ old('login') }}">
              </div>

              <div class="box-footer">
                <input type="hidden" name="id" value="">
                <button class="btn btn-primary" type="submit">Создать</button>

                <a href="{{ route('system.user.incidents.index')}}">
                  <button class="btn btn-danger" type="button">Отмена</button>
              </a>

            </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
      </div>
  
      </section>
    {{-- /.content--}}
@endsection


