@extends('layouts.app_admin')

@section('content')
    <section class="content">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Инцидент</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @include('include\result_messages')
          <div class="row">

            <div class="col-md-8" style="border-right: 2px solid #ecf0f5;">
              <form action="{{ route('system.specialist.incidents.specStore')}}" method="post">
                @method('post')
                @csrf
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Тема:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->title}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Приоритет:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->priority}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Статус:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->status}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Описание:</p>

                </div>
                <div class="col-md-9">
                  <label style="font-size: 16px">{{ $incident->description}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <p style="font-size: 16px">Комментария:</p>

                </div>
                <div class="col-md-9">
                  <textarea style="width: 100%" name="comment" placeholder="Введите текст" ></textarea>
                </div>
              </div>
              
              <div class="row form-group">
                @if($incident->image)
                <div class="col-md-3">
                  <p style="font-size: 16px">Фото:</p>
                  <div class="col-md-9" >
                  <img style="padding-left:30px" src="{{ asset('./uploads/incidents/'.$incident->image) }}" alt="" width="450px" height="200px">
                  </div>
                </div>
              @endif
              </div>
              <div class="box-footer">
                    <input type="hidden" name="id" value="{{$incident->id}}">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
              <a href="{{route('system.specialist.incidents.inWork')}}">
                    <button class="btn btn-danger" type="button">Отмена</button></a>

                </div>
              </form>
                  <!-- /.form-group -->
            </div>
            <div class="col-md-4" style="width: 32%;" >
              <div class="row">
                <p style="font-size: 32px; padding:0px 15px">Дата</p>
              </div>
                <div class="row col-md-12">
                  <div class="col-md-6" style="padding-left:0px">
                    <p style="font-size: 16px" >Дата создание:</p>
                  </div>
                  <div class="col-dm-6">
                    <label style="font-size: 16px">{{ $incident->created_at}}</label>
                  </div>
                </div>
                <div class="row col-md-12" >
                  <div class="col-md-6" style="padding-left:0px">
                    <p style="font-size: 16px">Дата обнавление:</p>
                  </div>
                  <div class="col-dm-6">
                    <label style="font-size: 16px">{{ $incident->updated_at}}</label>
                  </div>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
      </div>
  
      </section>
    {{-- /.content--}}
@endsection
